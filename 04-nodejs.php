<?php 


	microsoft	
		860185538@qq.com
		birthday19950825




	淘宝镜像：npm install -g cnpm --registry=https://registry.npm.taobao.org
	
	git官网	https://git-scm.com/download
	
	nodejs官网：https://nodejs.org/en/

	node -v			v8.9.3 				v.11.4

	npm -v			5.5.1				3.10.10

	webpack -v     	3.9.1				3.9.1

	gulp -v 		3.9.1				3.9.1
	
	ruby -v 		2.4.2p198			2.4.2p198

	sass -v			3.5.3				3.5.3

	npm ls -g --depth=0					查看已经安装在全局的模块

	npm install xxx						安装但不写入package.json；

	npm install xxx –save 				安装并写入package.json的”dependencies”中；

	npm install xxx –save-dev			安装并写入package.json的”devDependencies”中。
	
	cnpm update css-loader				更新模块
	
	npm uninstall xxx					删除xxx模块； 

	npm uninstall -g xxx				删除全局模块xxx；

	npm（node package manager）nodejs的包管理器，用于node插件管理（包括安装、卸载、管理依赖等）

	-g					全局安装。将会安装在C:\Users\Administrator\AppData\Roaming\npm，并且写入系统环境变量,在任何地方都可以通过命令行调用

						非全局安装：将会安装在当前定位目录的node_modules文件夹下，通过require()调用

	--save				存在于package.json的dependencies中，也就是说它是生产环境需要依赖的包

	--save-dev			package.json的devDependencies中，也就是说它是开发环境中需要的，上线并不需要这个包的依赖

	npm install			安装全部项目依赖包

	npm install --production		只安装生产环境依赖包

		异步I/O，就是我们读取写入文件或者操作数据库的时候，此时应该是异步的读取，
	CPU命令磁盘驱动器去读取文件，CPU此时不能死等磁盘返回结果，如果死等那么CPU自己
	就被阻塞了，性能是极大的浪费，比如PHP读取文件，性能就不高，因为被阻塞了

		V8引擎，使用C++开发，就是Chrome浏览器里的JS解析引擎，把V8移植到服务器上，node为
	性能而生

	英文路径名不能包含中划线 - 

	node命令实际上是存在nidejs的安装目录里的，但是安装node的时候已经自动把这个目录设置成了环境变量，所以到哪都可以使用

	cmd 清屏 cls    ctrl+C 打断挂起的程序

	nodejs是后台语言,将js运行在了服务端，看不见源代码。
执行在服务器上的语言是后台语言，源码用户不可见，运行在浏览器上的语言就是前端语言，源码用户可见

	php建设在Apache上，而node不用建设在任何的服务器软件上，没有根目录

	顶级路由



	安装  cnpm install -g live-server  自动刷新

	启动 live-server


	npm install -g browser-sync   自动刷新