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

	单入口文件：应用程序的所有HTTP请求都由某一个文件接受并由这个文件转发到功能代码中（不同的控制器）

	优势: 安全, 请求过滤, 

	常量定义在 thinkphp/base.php

	
    1. namespace app\index\controller;   application应用 -> index模块 -> controller

    2. common 是公共模块，不能在url访问
		1. use app\common\controller\Index as commonIndex;
		2. $common = new commonIndex();
		3. $common->index();

		1. use app\common\controller\User as commonUser;
		2. class User extends commonUser
		3. $this->showName()

	3. 命名空间更加清晰
		1. 修改appliction为app
		2. 修改public/index.php -> define('APP_PATH', __DIR__ . '/../app/');


	4. 配置，config()
		1. 添加自定义配置文件
			1. public/index.php 添加 define('CONF_PATH', __DIR__.'/../config/');
			2. 在app同级目录新建 config/config.php

		2. 惯例配置		thinkphp/convention.php

		3. 应用配置		config/config.php
			修改配置: 直接覆盖 -> 'app_debug' => true
			原理: dump(array_merge(应用配置, 惯例配置));  合并覆盖
		
		4. 扩展配置		config/extra/userInfo.php	extra名字不能变
			1. 配置只会多出一项，扩展配置的文件名作为key
			2. database 除外

		5. 场景配置(不同环境使用不同配置)  'app_status' => 'home',根据home来建立文件夹读取不同的配置
			1. config/config.php 修改 'app_status' => 'home',
			2. config.php同级新建home.php(名字一样)
			3. config/config.php 修改 'app_status' => 'office',
			4. config.php同级新建office.php(名字一样)
			5. 根据不同的名字来读取不同的文件配置
			6. 配置数据库要配置所有

		6. 模块配置(只对当前模块有效)，config.php 同级目录下新建模块同名文件夹, index/config.php

		7. 动态配置(只对当前控制器有效)
			1. 直接用 config('before','动态备注') 修改
			2. 在__construct里使用，对当前控制器有效
			3. 在方法里使用，只在当前方法有效
			
	5. 读取配置,Config类和助手函数config
		读取所有
		1. use think\Config;
		2. Config::get()	-->  \think\Config::get()
		3. config()对Config类做了一个封装

		读取一个
		1. \think\Config::get('app_host')
		2. config('app_host')

		检测是否存在配置,返回true或false
		1. \think\Config::has('app_host')
		2. config('?app_host')
	
	6. 隐藏入口文件
		1. Apache/conf/httpd.conf	
			150行 LoadModule rewrite_module modules/mod_rewrite.so 解开注释
			226行 AllowOverride All
		2. public/.htaccess	这个文件配置

	7. 入口文件绑定
		1. define('BIND_MODULE','admin/index');  直接绑定到index控制器，后面加上的就是方法，但是就不能访问别的控制器了
		2. 'auto_bind_module' => true, 入口文件自动绑定,自动访问跟入口文件相同的模块, api.php 访问api模块
	api.php/index/demo api模块index控制器/demo方法


	8. 路由
		// 是否开启路由
		'url_route_on'           => true,
		// 是否强制使用路由
		'url_route_must'         => false,

	9. 请求对象 request()
		1. 请求类型
			dump($request->method());	请求方法
			dump($request->isGet());	是否是GET
			dump($request->isPost());	是否是POST
			dump($request->isAjax());	是否是Ajax
		2. 获取参数
			dump($request->get());			get
			dump($request->post());			post
			dump($request->session());		session
    		dump($request->cookie());		cookie
			session('type','yyy');
    		cookie('age',12);
		3. 模块，控制器，操作
			dump($request->module());			
			dump($request->controller());		
    		dump($request->action());		

	10. input助手函数
		1.


  </script>
</body>
</html>



