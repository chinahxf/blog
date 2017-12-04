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
                <el-form-item label="内容:">
                    <el-input v-model="form_data.body_text"></el-input>
                </el-form-item>
                <el-form-item label="创建时间">
                    <el-date-picker
                            v-model="form_data.dates"
                            type="daterange"
                            placeholder="选择日期范围">
                    </el-date-picker>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" icon="el-icon-search" @click="getMessageList">搜索</el-button>
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
                        prop="message_id"
                        label="留言ID">
                </el-table-column>
                <el-table-column
                        prop="category_id"
                        label="留言类型">
                </el-table-column>
                <el-table-column
                        prop="body_text"
                        label="留言内容">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="留言时间">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                @click="handleDetail(scope.row.message_id)">查看
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

        <div class="block">
            <el-pagination
                    :current-page="1"
                    @current-change="handleCurrentChange"
                    :page-size="paginate.per_page"
                    layout="prev, pager, next"
                    :total="paginate.total">
            </el-pagination>
        </div>
        <el-dialog
                title="留言详情"
                :visible.sync="messageDetail"
                width="30%"
                >
                <span>{{messageDetailText}}</span>
                <span slot="footer" class="dialog-footer">
                <el-button type="primary" @click="messageDetail = false">确 定</el-button>
                </span>
        </el-dialog>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form_data: {
                    dates: [],
                    name: '',
                    category_id: ''
                },
                paginate: {},
                items: [],
                categories: [],
                messageDetail:false,
                messageDetailText:'',
                loading: true,
            }
        },
        mounted() {
            this.getMessageList();
            this.getCategoryList();
        },
        methods: {
            handleDetail(id) {
                var _this=this;
                var _this = this;
                axios.get('/admin/messages/'+id, {
                })
                    .then(function (response) {
                        console.log(response);
                        _this.messageDetail=true;
                        _this.messageDetailText=response.data.data.body_text;
                        _this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            handleDelete(id) {
                var _this = this;
                _this.$confirm('此操作将删除该留言, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    axios.delete('/admin/messages/'+id,{})
                        .then(function (response) {
                            _this.getMessageList();
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
                axios.get('/common/get_category', {
                    params: {
                        type: 'message'
                    }
                })
                    .then(function (response) {
                        console.log(response);

                        _this.categories = response.data.data;
                        _this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            handleCurrentChange(val) {
                var _this = this;
                _this.getMessageList(val)
            },
            getMessageList(page=1) {
                var _this = this;
                axios.get('/admin/messages', {
                    params: {
                        page: page,
                        name: _this.form_data.name,
                        dates: _this.form_data.dates,
                        category_id: _this.form_data.category_id,
                    }
                })
                    .then(function (response) {
                        console.log(response);
                        _this.items = response.data.data.data;
                        _this.paginate = response.data.data;
                        _this.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
        }
    }
</script>
