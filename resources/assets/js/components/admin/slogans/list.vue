<template>
    <div>
        <template>
            <el-table
                    :data="items"
                    border
                    v-loading="loading"
            >
                <el-table-column
                        prop="slogan_id"
                        label="标语id">
                </el-table-column>
                <el-table-column
                        prop="body_text"
                        label="内容">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="创建时间">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <!--<el-button-->
                                <!--size="mini"-->
                                <!--@click="handleDetail(scope.row.banner_id)">查看</el-button>-->
                        <el-button
                                size="mini"
                                @click="handleEdit(scope.row.slogan_id)">编辑</el-button>
                        <!--<el-button-->
                                <!--size="mini"-->
                                <!--type="danger"-->
                                <!--@click="handleDelete(scope.row.article_id)">删除</el-button>-->
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
        props:["item_id"],
        data() {
            return {
                form_data: {
                    dates: [],
                    name: '',
                    url:''
                },
//                dialogFormVisible: false,
                paginate:{},
                items: [],
//                categories:[],
                loading:true,
            }
        },
        mounted() {
            this.getSloganList();
//            this.upImg();
            //            this.getCategoryList();
        },
        methods: {
           /* openImg(){
//                this.hidden_id = false;
                console.log("open image")

            },*/
            handleDetail(id){
//                this.dialogFormVisible = true;
//                window.location.href = '/boss/articles/detail_article/'+id
            },
            handleEdit(id){
//                this.dialogFormVisible = true;
                window.location.href = '/boss/slogans/edit_slogan/'+id
            },
            handleCurrentChange(val){
                var _this = this;
                _this.getSloganList(val)
            },
            getSloganList(page=1) {
                var _this = this;
                axios.get("/boss/slogans/list/"+_this.item_id,{
                    params:{
                        page:page
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
