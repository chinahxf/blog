<template>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-1 control-label">标题</label>
            <div class="col-sm-4">
                <el-input v-model="form_data.name"></el-input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">地址</label>
            <div class="col-sm-4">
                <el-input v-model="form_data.url"></el-input>
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
        props:["item_id"],
        data() {
            return {
                form_data: {
                    name: '',
                    url:'',
                    status:1,
                },
                paginate:{},
                items: [],
                loading:true,
            }
        },
        mounted() {
            if(this.item_id){
                var isEdit=true;
                this.getFriendDetail();
            }else{
                var isEdit=false;
            }
        },
        methods: {
            getFriendDetail() {
                var _this = this;
                axios.get("/boss/friends/"+_this.item_id)
                    .then(function (response) {
                        var result=response.data;
                        if(result.ret==0){
                            _this.form_data=response.data.data;
                            _this.init_html=response.data.data.body_html;
                        }else{
                            _this.$message.error(result.msg);
                        }
                        _this.loading=false;
                        console.log(_this.items);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            save(){
                var _this = this;
                if(_this.item_id){
                    axios.put('/boss/friends/'+_this.item_id,{
                        form_data:_this.form_data,

                    })
                        .then(function (response) {
                            _this.$message({
                                showClose: true,
                                message: '修改文章成功！',
                                type: 'success'
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }else{
                    axios.post('/boss/friends',{
                        form_data:_this.form_data,

                    })
                        .then(function (response) {
                            _this.$message({
                                showClose: true,
                                message: '添加文章成功！',
                                type: 'success'
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                }
            },
        }
    }
</script>
