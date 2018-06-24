<template>
    <div>
        <template>
            <el-table
                    :data="items"
                    border
                    v-loading="loading"
            >
                <el-table-column
                        prop="category_id"
                        label="banner类型ID">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="banner类型名称">
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
                        <el-button
                                size="mini"
                                type="danger"
                                @click="handleDelete(scope.row.message_id)">删除
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
            this.getBannerCategoryList();
        },
        methods: {
            handleDetail(id){
                window.location.href = '/admin/banners/get_banner_list/'+id
            },
            handleEdit(id){
                window.location.href = '/admin/articles/edit_article/'+id
            },
            handleDelete(id){
                var _this = this;
                _this.$confirm('此操作将删除该banner分类, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    axios.delete('/admin/articles/'+id,{})
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
            getBannerCategoryList() {
                var _this = this;
                axios.get('/common/get_category',{
                    params:{
                        type:'banner'
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
        }
    }
</script>
