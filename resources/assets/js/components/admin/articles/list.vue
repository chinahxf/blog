<template>
    <div>
        <div class="text-right">
            <el-form :inline="true" :model="form_data" class="demo-form-inline">
                <el-form-item label="活动标题">
                    <el-input v-model="form_data.name"></el-input>
                </el-form-item>
                <el-form-item label="创建时间">
                <el-date-picker
                v-model="form_data.dates"
                type="daterange"
                placeholder="选择日期范围">
                </el-date-picker>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" icon="el-icon-search" @click="getArticleList">搜索</el-button>
                </el-form-item>
            </el-form>
        </div>
        <template>
            <el-table
                    :data="items"
                    border
                    v-loading="loading"
                    style="width: 100%"
            >
                <el-table-column
                        prop="article_id"
                        label="文章ID"
                        width="180">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="文章名"
                        width="180">
                </el-table-column>
                <el-table-column
                        prop="browse_num"
                        label="浏览数量">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="创建时间">
                </el-table-column>
                <el-table-column
                        prop="updated_at"
                        label="修改时间">
                </el-table-column>
            </el-table>

        </template>

        <div class="block">
            <el-pagination
                    :current-page="1"
                    @current-change="handleCurrentChange"
                    :page-size="paginate.per_page"
                    layout="prev, pager, next"
                    :total="paginate.total">
            </el-pagination>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form_data: {
                    dates: [],
                    name: ''
                },
                paginate:{},
                items: [],
                loading:true,
            }
        },
        mounted() {
            this.getArticleList();
        },
        methods: {
            handleCurrentChange(val){
                var _this = this;
                _this.getArticleList(val)
            },
            getArticleList(page) {
                console.log(page);
                var _this = this;
                console.log(_this.form_data);
                axios.get('/admin/articles',{
                    params:{
                        page:page,
                        name:_this.form_data.name,
                        dates:_this.form_data.dates,
                    }
                })
                    .then(function (response) {
                        _this.items = response.data.data;
                        _this.paginate = response.data;
                        _this.loading=false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
        }
    }
</script>
