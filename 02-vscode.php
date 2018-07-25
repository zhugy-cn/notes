<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    <script>
    
        Auto Close Tag              // 自动添加HTML / XML关闭标签

        Auto Rename Tag             // 自动重命名配对的HTML / XML标签

        Bracket Pair Colorizer      // 颜色识别匹配括号

        Document This               // 类、函数加注释   Ctrl+Alt+D and again Ctrl+Alt+D

        Git History                 // 以图表的形式查看git日志,使用 command+shift+p（Ctrl+shift+p） 输入git log就可以看到了

        npm Intellisense             // 在导入语句中自动填充npm模块

        Open In Browser             // 右键打开浏览器  快捷键alt + b

        path autocomplete          // 路径自动补全

        Code Spell Checker          // 检测单词是否拼写错误

        Material Icon Theme         // 文件图标
        
        vetur                       // 语法高亮、智能感知

        VueHelper                   // vue代码片段
        
        JavaScript (ES6) code snippets      // es6代码片段

        JavaScript Snippet Pack             // js代码片段

        Vue VSCode Snippets         // vue代码片段


        



        {
            "editor.fontSize": 15,
            "workbench.iconTheme": "material-icon-theme",
            "prettier.tabWidth": 4,
            "prettier.singleQuote": true,
            "vetur.format.defaultFormatter.html": "prettier",
        }


            文件 -> 首选项 -> 用户代码片段
            "Print to console": {
                "prefix": "vb",
                "body": [
                    "<template>",
                    "\t<div>",
                    "\t\t$1",
                    "\t</div>",
                    "</template>",
                    "<script>",
                    "export default {",
                    "\tname: '$2',",
                    "\tdata() {",
                    "\t\treturn {",
                    "\t\t};",
                    "\t}",
                    "};",
                    "</script>",
                    "<style>",
                    "</style>",
                ],
                "description": "vue 初始化"
            }
    </script>
    




</body>



</html>