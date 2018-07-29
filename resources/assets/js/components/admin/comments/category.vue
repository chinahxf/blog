<template v-loading="loading">
    <div>
        <div class="panel-group col-md-5" v-loading="loading">
            <el-button type="primary" class="text-right" @click="addCategory">增加分类</el-button>
            <div class="panel panel-default" v-for="info in categories">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">{{info.name}}</a>
                    </h4>
                </div>
                <!--<div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">二级分类</div>
                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
                loading: true,
            }
        },
        mounted() {
            this.getCategoryList();
        },
        methods: {
            getCategoryList() {
                var _this = this;
                axios.get('/common/get_category', {
                    params: {
                        type: 'comment'
                    }
                })
                    .then(function (response) {
                        _this.categories = response.data.data;
                        _this.loading = false;
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
                        category_type: 'message',
                    })
                        .then(function (response) {
                            if (response.data.ret == 0) {
                                _this.$message({
                                    showClose: true,
                                    message: response.data.msg,
                                    type: 'success'
                                });
                                _this.getCategoryList();
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
