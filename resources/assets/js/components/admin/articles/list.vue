<template>
    <div>
        <div class="text-right">
            <el-form :inline="true" :model="form_data" class="demo-form-inline">
                <el-form-item label="活动标题">
                    <el-input v-model="form_data.title"></el-input>
                </el-form-item>
                <el-form-item label="创建时间">
                <el-date-picker
                v-model="form_data.dates"
                type="daterange"
                placeholder="选择日期范围">
                </el-date-picker>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" @click="onSubmit">查询</el-button>
                </el-form-item>
            </el-form>
        </div>
        <template>
            <el-table
                    :data="tableData"
                    border
                    style="width: 100%"
                    :default-sort="{prop: 'date', order: 'descending'}"
            >
                <el-table-column
                        prop="date"
                        label="日期"
                        sortable
                        width="180">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="姓名"
                        sortable
                        width="180">
                </el-table-column>
                <el-table-column
                        prop="address"
                        label="地址">
                </el-table-column>
            </el-table>

        </template>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                tableData: [{
                    date: '2016-05-02',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1518 弄'
                }, {
                    date: '2016-05-04',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1517 弄'
                }, {
                    date: '2016-05-01',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1519 弄'
                }, {
                    date: '2016-05-03',
                    name: '王小虎',
                    address: '上海市普陀区金沙江路 1516 弄'
                }],
                form_data: {
                    dates: '',
                    title: ''
                },
                items: '234',
            }
        },
        mounted() {
            this.getUserList();
        },
        methods: {
            getUserList() {
                var _this = this;
                console.log('woaini');
                axios.get('users')
                    .then(function (response) {
                        _this.items = response.data;
                        console.log(_this.items);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            onSubmit() {
                console.log('aaaa');
            }
        }
    }
</script>
