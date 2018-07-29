<template>
    <div class="row">
        <header class="text-center">
            <h3>{{items.name}}</h3>
            <span class="glyphicon glyphicon-user" style="margin-left: 20px;"></span>
            <span>作者：{{items.user_id}}</span>
            <span class="glyphicon glyphicon-time"></span>
            <span>修改时间：{{items.updated_at}}</span>
            <span class="glyphicon glyphicon-eye-open"></span>
            <span>浏览量：{{items.browse_num}}</span>
            <span class="glyphicon glyphicon-duplicate"></span>
            <span>文章类型：{{items.category_name}}</span>
        </header>
            <div class="col-xs-6 col-md-4 col-md-offset-4 col-xs-offset-3" v-if="items.thumb_img">
                <a :href="items.thumb_img" target="_blank"class="thumbnail">
                    <img :src="items.thumb_img" alt="">
                </a>
            </div>
        <div class="col-xs-10 col-md-8 col-md-offset-1 col-xs-offset-2"v-html="items.body_html">
        </div>
    </div>
</template>

<script>
    export default {
        props:["item_id"],
        data() {
            return {
                items:{},
                loading:true,
            }
        },
        mounted() {
            this.getArticleDetail();
        },
        methods: {
            getArticleDetail() {
                var _this = this;
                axios.get("/boss/articles/"+_this.item_id)
                    .then(function (response) {
                        var result=response.data;
                        if(result.ret==0){
                            _this.items=response.data.data;
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
        }
    }
</script>
