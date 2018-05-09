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
        CSS 不会阻塞 DOM 的解析，但会CSS 阻塞页面渲染

        CSSOM树和DOM树是分开构建，之所以把link标签放抬头而script放body尾部，是因为浏览器遇到script标签时，会去下载并执行js脚本，从而导致浏览器暂停构建DOM。然而JS脚本需要查询CSS信息，所以JS脚本还必须等待CSSOM树构建完才可以执行。
这将相当于CSS阻塞了JS脚本，JS脚本阻塞了DOM树构建。是这样子的关联才对。
只要设置CSS脚本提前加载避免阻塞JS脚本执行时CSSOM树还没构建好，同时给script标签设置async就可以解决这个问题
    </script>
</body>
</html>