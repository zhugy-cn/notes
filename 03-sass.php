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

			1. 先安装 Ruby 环境     ruby -v     查看环境版本   安装 Ruby 时一定要勾选 Add Ruby executables to your PATH

			2. 开始菜单中打开 ruby 的 命令行
			3. 安装命令：	gem install sass
			4. sass -v		查看sass是否安装成功

			安装less cnpm install -g less

			编译：
			1. 命令行编译：	sass  index.scss:index/index.css       将index.scss编译成index.css并放在同级的index文件夹目录下
							sass  test/:index/				将test文件夹里的.scss编译.css并放在index文件夹下	
				开启“watch”功能，这样只要你的代码进行任保修改，都能自动监测到代码的变化，并且给你直接编译出来：
				sass --watch index.scss:index/index.css


			2. GUI工具编译：http://koala-app.com/	

			3. 自动化编译：Grunt 和 Gulp 


			4. 创建 Sass 文件时，就需要将文件编码设置为“utf-8”，路径不要包含英文，防止报错

			5. 四种风格的输出方法
				嵌套输出方式 nested 		sass --watch index.scss:index.css --style nested		默认是nested，所以后面加不加--style nested不影响效果。
			效果：最后一行	border: 10px solid #fff; }	
				
				展开输出方式 expanded  		在编译的时候加上参数  --style expanded		和 nested 类似，只是大括号在另起一行，

				紧凑输出方式 compact 		在编译的时候带上参数  --style compact 		在一行显示
			效果：nav li { display: inline-block; }

				压缩输出方式 compressed 	在编译的时候带上参数  --style compressed  	压缩输出方式会去掉标准的 Sass 和 CSS 注释及空格。也就是压缩好的 CSS 代码样式风格

			6. !default用于变量，含义是：如果这个变量被声明赋值了，那就用它声明的值，否则就用这个默认值。

			7. 把变量声明放在一个文件夹，_variables。

			8.	@extends 继承		定义：@mixin center($f)  调用：@include center(right)

			9. 	@import "test.scss";	导入文件（可以用到文档任何地方，在编译阶段将被引入的文件合并并输出到相应的css文件）
				@import "../01";		父文件夹的同级
				@import "../03/03";		父元素的同级的下级


			10. 宿主文件，路劲不要出现中文


			11. chrome 调试：

				1. 点击样式编辑中的颜色属性，会弹出一个颜色选择器，当选择器开启时，如果你停留在页面，鼠标指针会变成一个放大镜，让你去选择页面上的颜色

				2. 在颜色预览功能使用快捷键Shift + Click，可以在rgba、hsl和hexadecimal来回切换颜色的格式

				3. 通过workspaces来编辑本地文件：
				先：add folder to work space（工作目录）
				再：打开html文件到chorme
				然后：map to network resource

				插件： http://chromecj.com/top/ 



				

				
				
				
				
				


				scss
					变量：$app-bg: rgb(245,245,245);
					mixin: 
						@mixin vertical-center {
							position: absolute;
							top: 50%;
							transform: translateY(-50%);
						}
						使用: @include vertical-center;






				stylus
					变量：$app-bg = rgb(245,245,245);
					
					mixin:
						vertical-center()
							position absolute
							top: 50%
							transform: translateY(-50%)  
						使用: vertical-center();
						
					继承
						@extend .border-bottom-1px;
						
					
				
				






	</script>
	
</body>
</html>