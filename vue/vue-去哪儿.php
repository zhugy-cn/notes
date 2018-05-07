<?php

--save 开发生产都使用,dependencies里面

cnpm install fastclick --save   点击300ms延迟

cnpm install stylus --save

cnpm install stylus-loader --save


css文件夹里引入别的css前面加 ~ ,

cnpm install vue-awesome-swiper@2.6.7 --save


高度是宽度的31.25%,图片高度自适应,是以父元素的width为参照物的！
  overflow: hidden
  width: 100%;
  height: 0;
  padding-bottom: 31.25%;

样式穿透，作用全部子组件的类名
  .wrapper>>>.swiper-pagination-bullet-active {
    background-color: red !important;
  }

  eksos


  cnpm install axios --save



  cnpm install better-scroll --save


  cnpm install vuex --save
  

  <keep-alive>  把路由中的内容放到内存中，下次直接从内存拿出来

IP地址被访问
  "dev": "webpack-dev-server --host 0.0.0.0 --inline --progress --config build/webpack.dev.conf.js",
  

手机白屏，不支持promise
  cnpm install babel-polyfill --save
main.js引入 import 'babel-polyfill'


npm run build

assetsPublicPath: '/demo',    放在demo文件夹下