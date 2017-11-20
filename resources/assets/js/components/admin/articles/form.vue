<template>
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-1 control-label">标题</label>
            <div class="col-sm-4">
                <el-input v-model="form_data.name"></el-input>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">类型</label>
            <div class="col-sm-4">
                <el-select v-model="form_data.category_id" placeholder="请选择">
                    <el-option
                            v-for="category in categories"
                            :key="category.category_id"
                            :label="category.name"
                            :value="category.category_id">
                    </el-option>
                </el-select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-1 control-label">缩略图</label>
            <div class="col-sm-4">
                <a id="upLoadImg">点击上传缩略图</a>
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
            <label class="col-sm-1 control-label">内容</label>
            <div class="col-sm-10">
                <div id="editorElem" v-model="form_data.body_html" style="text-align:left"></div>
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
        data() {
            return {
                form_data: {
                    name: '',
                    body_html:'',
                    body_text:'',
                    thumb_img:'',
                    category_id:''
                },
                categories:[],
                paginate:{},
                items: [],
                loading:true,
            }
        },
        mounted() {
            this.getCategoryList();
            this.editor();
            this.upImg();
        },
        methods: {
            getCategoryList() {
                var _this = this;
                axios.get('/common/getCategory',{
                    params:{
                        type:'article'
                    }
                })
                    .then(function (response) {
                        console.log(response);

                        _this.categories = response.data;
                        _this.loading=false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            save(){
                console.log('aaa');
                var _this = this;
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
</script>
