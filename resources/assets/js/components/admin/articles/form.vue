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
            <label class="col-sm-1 control-label">内容</label>
            <div class="col-sm-10">
                <script id="editor" type="text/plain" ></script>
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
                    body_text:''
                },
                categories:[],
                editor:'',
                paginate:{},
                items: [],
                loading:true,
            }
        },
        mounted() {
            this.getCategoryList();
            this.editor=UE.getEditor('editor');
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
                var _this = this;
                _this.form_data.body_html=_this.editor.getContent();
                _this.form_data.body_text=_this.editor.getContentTxt();

                axios.post('/admin/articles',{
                        form_data:_this.form_data,

                })
                    .then(function (response) {

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
