<template>
    <div>
        <template>
            <el-table
                    :data="items"
                    border
                    v-loading="loading"
            >
                <el-table-column
                        prop="friend_id"
                        label="友链ID">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="友链名">
                </el-table-column>
                <el-table-column
                        prop="url"
                        label="地址">
                </el-table-column>
                <el-table-column
                        prop="summary"
                        label="简介">
                </el-table-column>
                <el-table-column
                        :formatter="stateFormat"
                        prop="status"
                        label="状态">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="创建时间">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                @click="handleCheck(scope.row.friend_id,1)">通过
                        </el-button>
                        <el-button
                                size="mini"
                                @click="handleCheck(scope.row.friend_id,2)">拒绝
                        </el-button>
                        <el-button
                                size="mini"
                                @click="handleEdit(scope.row.friend_id)">编辑
                        </el-button>
                        <el-button
                                size="mini"
                                type="danger"
                                @click="handleDelete(scope.row.friend_id)">删除
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                paginate: {},
                items: [],
                categories: [],
                loading: true,
            }
        },
        mounted() {
            this.getFriendList();
        },
        methods: {
            stateFormat(row, column) {
                if (row.status === 0) {
                    return '未审核'
                } else if (row.status === 1) {
                    return '通过'
                } else if (row.status === 2) {
                    return '拒绝'
                }
            },
            handleEdit(id) {
                window.location.href = '/boss/friends/edit_friend/' + id
            },
            handleCheck(id, status) {
                var _this = this;
                axios.put('/boss/friends/' + id, {
                    status: status,
                })
                    .then(function (response) {
                        _this.getFriendList();
                        _this.$message({
                            showClose: true,
                            message: '审核成功！',
                            type: 'success'
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            handleDelete(id) {
                var _this = this;
                _this.$confirm('此操作将删除该友链申请, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    axios.delete('/boss/friends/' + id, {})
                        .then(function (response) {
                            _this.getFriendList();
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
            handleCurrentChange(val) {
                var _this = this;
                _this.getFriendList(val)
            },
            getFriendList(page = 1) {
                var _this = this;
                axios.get('/boss/friends', {
                    params: {
                        page: page,
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
