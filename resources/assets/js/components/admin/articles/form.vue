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
                <img :src="form_data.thumb_img"class="img-rounded"/>
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
            <label class="col-sm-1 control-label">标签</label>
            <div class="col-sm-8">
                <el-tag
                        :key="tag"
                        v-for="tag in form_data.tags"
                        closable
                        :disable-transitions="false"
                        @close="handleClose(tag)">
                    {{tag}}
                </el-tag>
                <el-input
                        class="input-new-tag"
                        v-if="inputVisible"
                        v-model="inputValue"
                        ref="saveTagInput"
                        size="small"
                        @keyup.enter.native="handleInputConfirm"
                        @blur="handleInputConfirm"
                >
                </el-input>
                <el-button v-else class="zl-button-tag" size="small" @click="showInput">添加标签</el-button>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 control-label">内容</label>
            <div class="col-sm-10">
                <div id="editorElem" v-model="form_data.body_html" style="text-align:left">
                    <span v-html="init_html"></span>
                    <!--{{form_data.body_html}}-->
                    <!--{{init_html}}-->
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" class="btn btn-default" @click="save()">Sign in</button>
            </div>
        </div>
        <pre>{{form_data}}</pre>
        <pre>{{init_html}}</pre>
    </form>
</template>

<script>
    export default {
        props:["item_id"],
        data() {
            return {
                form_data: {
                    name: '',
                    body_html:'',
                    body_text:'',
                    thumb_img:'',
                    category_id:'',
                    tags: [],
                },
                inputVisible: false,
                inputValue: '',
                init_html:'',
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
            if(this.item_id){
                var isEdit=true;
                this.getArticleDetail();
            }else{
                var isEdit=false;
            }
        },
        methods: {
            getArticleDetail() {
                var _this = this;
                axios.get("/admin/articles/"+_this.item_id)
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
            getCategoryList() {
                var _this = this;
                axios.get('/common/get_category',{
                    params:{
                        type:'article'
                    }
                })
                    .then(function (response) {
                        console.log(response);

                        _this.categories = response.data.data;
                        _this.loading=false;
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
            },
            handleClose(tag) {
                this.form_data.tags.splice(this.form_data.tags.indexOf(tag), 1);
            },

            showInput() {
                this.inputVisible = true;
                this.$nextTick(_ => {
                    this.$refs.saveTagInput.$refs.input.focus();
                });
            },

            handleInputConfirm() {
                let inputValue = this.inputValue;
                if (inputValue) {
                    this.form_data.tags.push(inputValue);
                }
                this.inputVisible = false;
                this.inputValue = '';
            }
        }
    }
</script>
