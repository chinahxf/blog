<template>
    <el-row class="tac">
        <el-col :span="24">
            <el-menu
                    default-active="2"
                    class="el-menu-vertical-demo"
                    @open="handleOpen"
                    @close="handleClose"
                    background-color="#545c64"
                    text-color="#fff"
                    active-text-color="#ffd04b">
                <el-submenu index="1">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>文章模块</span>
                    </template>
                    <el-menu-item-group>
                        <a href="/boss/articles/get_article_list"><el-menu-item index="1-1">文章管理</el-menu-item></a>
                        <a href="/boss/articles/category"><el-menu-item index="1-2">文章分类</el-menu-item></a>
                    </el-menu-item-group>
                </el-submenu>
                <el-submenu index="2">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>留言模块</span>
                    </template>
                    <el-menu-item-group>
                        <a href="/boss/comments/get_comment_list"><el-menu-item index="1-1">评论管理</el-menu-item></a>
                        <a href="/boss/comments/category"><el-menu-item index="2-2">评论分类</el-menu-item></a>
                    </el-menu-item-group>
                </el-submenu>
                <el-submenu index="3">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>banner模块</span>
                    </template>
                    <el-menu-item-group>
                        <a href="/boss/banners/category"><el-menu-item index="3-1">banner管理</el-menu-item></a>
                    </el-menu-item-group>
                </el-submenu>
                <el-submenu index="4">
                    <template slot="title">
                        <i class="el-icon-location"></i>
                        <span>tag模块</span>
                    </template>
                    <el-menu-item-group>
                        <a href="/boss/tags"><el-menu-item index="4-1">tag管理</el-menu-item></a>
                    </el-menu-item-group>
                </el-submenu>
            </el-menu>
        </el-col>
    </el-row>
</template>

<script>
    export default {
        data() {
            return {
                items: '234',
            }
        },
        mounted() {

        },
        methods: {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>
