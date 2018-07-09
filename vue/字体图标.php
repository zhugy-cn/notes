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

        symbol 

        优点：
            支持多色图标了，不再受单色限制。
            支持像字体那样通过font-size,color来调整样式。
            支持 ie9+
            可利用CSS实现动画。
            减少HTTP请求。不用发送woff|eot|ttf| 这些很多个字体库的请求
            矢量，缩放不失真
            可以很精细的控制SVG图标的每一部分

        使用步骤：

            一  下载字体
        
            二  拷贝项目下面生成的symbol代码，引入 iconfont.js

            三  第二步：加入通用css代码（引入一次就行）
                <style type="text/css">
                    .icon {
                    width: 1em; height: 1em;
                    vertical-align: -0.15em;
                    fill: currentColor;
                    overflow: hidden;
                    }
                </style>
            
            四  挑选相应图标并获取类名，应用于页面
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-xxx"></use>
                </svg>

        
        使用组件方式：
            
            一  引入svg组件
                import IconSvg from '@/components/IconSvg'

            二  全局注册icon-svg
                Vue.component('icon-svg', IconSvg)
        
            三  在代码中使用
                <icon-svg icon-class="password" />

            四  cnpm install svg-sprite-loader --save-dev

            五  修改loader  webpack.base.conf.js
                
                {
                    test: /\.svg$/,
                    loader: 'svg-sprite-loader',
                    include: [resolve('src/icons')],
                },
                {
                    test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                    loader: 'url-loader',
                    exclude: [resolve('src/icons')],
                    options: {
                    limit: 10000,
                    name: utils.assetsPath('img/[name].[hash:7].[ext]')
                    }
                },
                
                
        
    </script>
</body>
</html>