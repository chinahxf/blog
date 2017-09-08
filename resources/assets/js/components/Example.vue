<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <el-button @click="visible = true">按钮</el-button>
                    <el-dialog v-model="visible" title="Hello world">
                        <p>欢迎使用 Element</p>
                    </el-dialog>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                items:'234',
            }
        },
        mounted() {
            this.getUserList();
        },
        methods:{
            getUserList()
            {
                var _this=this;
                console.log('woaini');
                axios.get('console/users')
                        .then(function (response) {
                            _this.items=response.data;
                            console.log(_this.items);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

            }
        }
    }
</script>
