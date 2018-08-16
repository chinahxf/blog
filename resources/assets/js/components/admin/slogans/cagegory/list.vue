<template>
    <div>
        <el-button type="primary" icon="el-icon-search" @click="addCategory">添加公告类型</el-button>
        <template>
            <el-table
                    :data="items"
                    border
                    v-loading="loading"
            >
                <el-table-column
                        prop="category_id"
                        label="标语类型ID">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="标语类型名称">
                </el-table-column>

                <el-table-column
                        prop="created_at"
                        label="创建时间">
                </el-table-column>
                <el-table-column
                        prop="updated_at"
                        label="修改时间">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                @click="handleDetail(scope.row.category_id)">查看
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>

        </template>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form_data: {

                },
                items: [],
                loading:true,
            }
        },
        mounted() {
            this.getSloganCategoryList();
        },
        methods: {
            handleDetail(id){
                window.location.href = '/boss/slogans/get_slogan_list/'+id
            },
            getSloganCategoryList() {
                var _this = this;
                axios.get('/common/get_category',{
                    params:{
                        type:'slogan'
                    }
                })
                    .then(function (response) {
                        console.log(response);
                        _this.items = response.data.data;
                        _this.loading=false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            addCategory() {
                var _this = this;
                _this.$prompt('请输入分类名称', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                }).then(({value}) => {
                    _this.loading = true;
                    axios.post('/common/add_category', {
                        name: value,
                        category_type: 'slogan',
                    })
                        .then(function (response) {
                            if (response.data.ret == 0) {
                                _this.$message({
                                    showClose: true,
                                    message: response.data.msg,
                                    type: 'success'
                                });
                                _this.getSloganCategoryList();
                                _this.loading = false;
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }).catch(() => {

                });
            }
        }
    }
</script>
