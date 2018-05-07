<?php

node.js   6.12.3

yarn  1.6.0

webpack   3.10.0

npm install yarn -g

yarn init

yarn add webpack@3.10.0 --dev

webpack
  html -> html-webpack-plugin
  脚本 -> babel + babel-preset-react
  样式 -> css-loader + sass-loader
  图片/字体 -> url-loader + file-loader

  html-webpack-plugin html单独打包成文件
  extract-text-webpack-plugin 样式打包成单独文件
  CommonsChunkPlugin 提取通用模块
  
  yarn add webpack-dev-server@2.9.7 --dev