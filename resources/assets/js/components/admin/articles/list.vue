<template>
    <div>
        <div class="text-right">
            <el-form :inline="true" :model="form_data" class="demo-form-inline">
                <el-form-item label="类型:">
                <el-select v-model="form_data.category_id" clearable placeholder="请选择类型">
                    <el-option
                            v-for="category in categories"
                            :key="category.category_id"
                            :label="category.name"
                            :value="category.category_id">
                    </el-option>
                </el-select>
                </el-form-item>
                <el-form-item label="标题:">
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
                    <el-button type="primary" icon="el-icon-search" @click="getArticleList()">搜索</el-button>
                </el-form-item>
            </el-form>
        </div>
        <template>
            <el-table
                    :data="items"
                    border
                    v-loading="loading"
            >
                <el-table-column
                        prop="article_id"
                        label="文章ID">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="文章名">
                </el-table-column>
                <el-table-column
                        prop="browse_num"
                        label="浏览数量">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="创建时间">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                @click="handleDetail(scope.row.article_id)">查看</el-button>
                        <el-button
                                size="mini"
                                @click="handleEdit(scope.row.article_id)">编辑</el-button>
                        <el-button
                                size="mini"
                                type="danger"
                                @click="handleDelete(scope.row.article_id)">删除</el-button>
                    </template>
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
                    name: '',
                    category_id:''
                },
                paginate:{},
                items: [],
                categories:[],
                loading:true,
            }
        },
        mounted() {
            this.getArticleList();
            this.getCategoryList();
        },
        methods: {
            handleDetail(id){
                window.location.href = '/boss/articles/detail_article/'+id
            },
            handleEdit(id){
                window.location.href = '/boss/articles/edit_article/'+id
            },
            handleDelete(id){
                var _this = this;
                _this.$confirm('此操作将删除该文章, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    axios.delete('/boss/articles/'+id,{})
                        .then(function (response) {
                            _this.getArticleList();
                            _this.$message({
                                type: 'success',
                                message: response.data.msg
                            });

                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }).catch(() => {

                });
            },
            getCategoryList() {
                var _this = this;
                axios.get('/common/get_category',{
                    params:{
                        type:'article'
                    }
                })
                    .then(function (response) {
                        console.log(response);

                        _this.categories = response.data.data;
                        _this.loading=false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            handleCurrentChange(val){
                var _this = this;
                _this.getArticleList(val)
            },
            getArticleList(page=1) {
                var _this = this;
                axios.get('/boss/articles',{
                    params:{
                        page:page,
                        name:_this.form_data.name,
                        dates:_this.form_data.dates,
                        category_id:_this.form_data.category_id,
                    }
                })
                    .then(function (response) {
                        console.log(response);
                        _this.items = response.data.data.data;
                        _this.paginate = response.data.data;
                        _this.loading=false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
        }
    }
</script>
