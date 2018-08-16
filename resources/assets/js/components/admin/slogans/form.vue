<template>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-1 control-label">标语内容</label>
            <div class="col-sm-4">
                <el-input v-model="form_data.body_text" type="textarea"
                          :rows="2"
                          placeholder="请输入内容"></el-input>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" @click="save()">Sign in</button>
            </div>
        </div>
        <pre>{{form_data}}</pre>
    </form>
</template>

<script>
    export default {
        props: ["item_id", "category_id"],
        data() {
            return {
                form_data: {
                    body_text: '',
                },
                items: [],
                loading: true,
            }
        },
        mounted() {
            if (this.item_id) {
                this.getSloganDetail();
            }
        },
        methods: {
            getSloganDetail() {
                var _this = this;
                axios.get("/boss/slogans/" + _this.item_id)
                    .then(function (response) {
                        var result = response.data;
                        if (result.ret == 0) {
                            _this.form_data = response.data.data;
                        } else {
                            _this.$message.error(result.msg);
                        }
                        _this.loading = false;
                        console.log(_this.items);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            save() {
                var _this = this;
                if (_this.category_id) {
                    _this.form_data.category_id = _this.category_id;
                }
                if (_this.item_id) {
                    axios.put('/boss/slogans/' + _this.item_id, {
                        form_data: _this.form_data,

                    })
                        .then(function (response) {
                            _this.$message({
                                showClose: true,
                                message: '修改标语成功！',
                                type: 'success'
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    axios.post('/boss/slogans', {
                        form_data: _this.form_data,

                    })
                        .then(function (response) {
                            _this.$message({
                                showClose: true,
                                message: '添加标语成功！',
                                type: 'success'
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            }
        }
    }
</script>
