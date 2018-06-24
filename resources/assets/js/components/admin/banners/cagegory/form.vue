<template>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-1 control-label">banner名称</label>
            <div class="col-sm-4">
                <el-input v-model="form_data.name"></el-input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">缩略图</label>
            <div class="col-sm-4">
                <img :src="form_data.url"class="img-rounded"/>
                <a id="upLoadImg">点击上传banner图</a>
                <!--<input type="file" id="aaa">-->
                <!--<el-upload
                        class="avatar-uploader"
                        :show-file-list="false">
                    <img v-if="imageUrl" :src="imageUrl" class="avatar">
                    <i class="el-icon-plus avatar-uploader-icon"  v-else ></i>
                </el-upload>-->
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">banner跳转地址</label>
            <div class="col-sm-4">
                <el-input v-model="form_data.to_url"></el-input>
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
        props:["item_id","category_id"],
        data() {
            return {
                form_data: {
                    name: '',
                },
                items: [],
                loading:true,
            }
        },
        mounted() {
            this.upImg();
            if(this.item_id){
                var isEdit=true;
                this.getBannerDetail();
            }else{
                var isEdit=false;
            }
        },
        methods: {
            getBannerDetail() {
                var _this = this;
                axios.get("/admin/banners/"+_this.item_id)
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
                    axios.put('/admin/articles/'+_this.item_id,{
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
                    axios.post('/admin/articles',{
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
            }
        }
    }
</script>
