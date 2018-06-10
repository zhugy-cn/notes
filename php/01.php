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
  		$data = [];
		for($i=0; $i<21; $i++) {
			$data[] = [
				'name' => 'user_'.$i,
				'age' => md5($i),
			];
		}
		$userModel = new Test();
		$res = $userModel->saveAll($data);
  

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

	11. 响应对象,Response
		'default_return_type'    => 'html',	修改返回的类型

	12. 模板视图view曾层, 
		return view(),默认找当前控制器对应的index.html	view/index/index.html
		view('upload')	找当前控制器对于的upload.html 	view/index/upload.html
		view('user/upload')	找 user 对于的upload.html 	view/user/upload.html
		view('./index.html');	./ 开头就是找public同级目录
		view('./index.html',[		第二个参数是传递给页面的参数，用 {$name} 接受
            'name'=> 'jack',
            'age' => 23
        ],[
			'STATIC' => '页面static的替换内容'		页面直接书写	STATIC
		]);
		不推荐使用这种方式，第二种方式
		1. use think\Controller;
		2. class Index extends Controoler
		3. return $this->fetch('upload',[
			'name' => 'jack',
			'age' => 23
		])	
		传递的参数跟view函数一样
		4. 可以用另一种参数传值
			$this->assign('test','我是assign传递的值');	使用 {$test} 编译后<?php echo $age; ?>
		5. 不需要视图页面，直接输出字符串，
			return $this->display('只是{$name}一个字符串',[
				'name' => 'age'
			]);


	13. 模板变量输出，赋值替换, 编译后的文件：tp5\runtime\temp\fe291b3c15e4f32955234bc1a2be45ac.php
	
		1. 'view_replace_str'       => [],	可以重新配置路径,以下系统提供的
			__STATIC__		/static
			__JS__			/static/js
			__CSS__			/static/css

		2. 页面获取系统变量 $Think
			{$Think.session.name}	
			{$Think.cookie.age}
		
		3. 执行函数
			1. {$age | md5 }	前面是变量，后面是函数，中间用 | 分隔
			2. {$age | substr=0,3}		substr($age, 0, 3) 	 把值作为第一个参数，可以省略###
			3. {$age} == {$age | date='Y-m-d h',###}	如果要把值作为第二个参数，需要用三个###来占位
			4. {$age|md5|strtoupper}	执行多个函数
			5. {$name|default='我是默认的值'}	可以设置默认值
			
		4. 模板循环标签
			1.  {volist name='list' id="item" offset="0" length="3" mod="2" empty="没有数据" key="i"}
					<p></p>
					<p></p>
					<p>{$mod} == {$i} =={$item.name} == {$item.age}</p>
				{/volist}
				name: 	php中的变量
				id: 	变量中的每一项
				offset: 循环起始值
				length: 循环结束值
				mod:	取余
				empty:	值为空时显示
				key: 	索引值，从 0 开始

		    2.	{foreach name='list' item='item'}
					<p>{$item.name} == {$item.age} == {$key}</p>    
				{/foreach}

		5. 比较标签，name为控制器分配的变量,value为比较的值
			1. eq,相等时条件成立,
				{eq name="a" value="10"}
					<p>条件成立</p>
				{else/}
					<p>条件不成立</p>
				{/eq} 
			2. neq,不等时条件成立
				{neq name="a" value="10"}
					<p>条件成立</p>
				{else/}
					<p>条件不成立</p>
				{/neq}
			3. gt,变量大于值时成立
				{gt name="a" value="$b"}
					<p>条件成立</p>
				{else/}
					<p>条件不成立</p>
				{/gt}	
			4. lt, 变量小于值时成立
			5. egt, 大于等于
			6. elt, 小于等于
		
		6. 条件判断标签
			1. switch
				{switch name="Think.get.type"}
					{case value="0|1"} <p>普通的会员</p> {/case}	相同结果时，0 和 1 输出的都是普通的会员， | 
					{case value="2"} <p>铜牌的会员</p> {/case}
					{case value="3"} <p>黄金的会员</p> {/case}
					{default /} <p>游客</p>
				{/switch}

			2. range
				{range name="Think.get.type" value="1,2,3" type="in"}
					<p>当前type是1，2，3中的一个</p>
				{else/}
					<p>当前type不是1，2，3中的一个</p>
				{/range}
				当type为 in 时，判断value的值是否包含有name的值
				当type为 notin 时则相反
				当type为 between ，判断name的值是否存在于value的值区间  1到10，包含启示值和结束值
				当type为 notbetween 则相反，起始值和结束值不会包含
			
			3. if
				{if condition="($Think.get.type) === 1 AND $age == 1"}
					<p>正确</p>
				{else /}
					<p>不正确</p>
				{/if}

		7. 模板布局，包含，继承
			1. 模板的引入
				{include file="common/header" /}

			2. 页面的继承
				{extend name="common/base" /}

			3. 继承模板时显示不同的内容，名字相同的替换
				1. 父模板 	{block name="title"} 公共头部的标题 {/block}
				2. 子模板	{block name="title"} 我是page1的标题 {/block}
				3. 连接原来的内容 {__block__} 获取基础模板的默认值
				{block name="title"}
					连接上原来的值 {__block__}
				{/block}

			4. 使用 layout 
				1. 配置文件template添加两个配置，
					'template' = [
						'layout_on'    => 'true',
						'layout_name'  => 'layout',
					]
				2. view 下 新建 layout.html 文件

				3. 需要替换的地方，{__CONTENT__}



		8. 数据库操作
			1. 数据库链接,只有使用时才链接
				1. 配置文件链接,不需要家key值，database
					use think\Db;
					$res = Db::connect();
				2. DSN 方式链接，
					Db::connect('mysql://root:root@127.0.0.1:3306/study#utf8');
			2. 数据库查询

				1. $res = Db::table('m_user')->where(['id' => 10])->select();			查询全部，是一个二维数组,结果不存在返回空数组

				2. $res = Db::table('m_user')->where(['id' => 10])->find();				返回一条记录，是一个一维数组，结果不存在返回 NULL

				3. $res = Db::table('m_user')->where(['id' => 10])->value('name');		返回一条记录某个字段的值，结果不存在返回 NULL

				4. $res = Db::table('m_user')->column('name','age');		返回一条数组，数组中的值就是列的值,如果传入两个值，第二个值为key

				5. $res = Db::name('user')->select();	name 可以省略数据库的前缀

				6. $res = db('user')->select();		助手函数，每次都实例化类，第三个参数false就不会了, db('user',[],false)

				2. $res = Db::query('select * from m_user where id=?',[1]);

			3. 数据库插入，$db = Db::name('user');
				1. $res = Db::execute('insert into m_user set name=?,age=?',['jack',23]);
					
				2. $res = $db->insert(['name'=> '张三','age' => md5(11111)]);	返回影响行数

				3. $res = $db->insertGetId(['name'=> '张三','age' => md5(11111)]);   返回插入的 ID

				4. $res = $db->insertAll($data)		多条数据插入，$data是一个二维数组，返回插入的行数
					

			4. 数据库更新，$db = Db::name('user');
				1. $res = $db->where(['id'=>1])->update(['name'=>'1858551', 'age'=>22222]);		返回影响行数

				2. $res = $db->where(['id'=>2])->setField(['age'=>457564]);		只更新一个字段，返回影响行数

				3. $res = $db->where(['id'=>1])->setInc('age',4);    自增，默认该字段每次增一,第二个参数是每次增加的数量，返回影响行数

				4. $res = $db->where(['id'=>1])->setDec('age',4);    自减，默认该字段每次减一,第二个参数是每次减少的数量，返回影响行数
			
			5. 数据库删除
				1. $res = delete(1)
						
			6. 其他方法
			    $res = $db
				->where('id','>',10)
				->field('id,name')	// 只显示这两条
				->order('id desc')	// 排序
				->limit(3, 5)
				->page(3,3) 		// 分页
				->group('`group`')	// 分组
				->select();
			
				
		9. 模型，
			1. 定义模型，与表对应
				命名，m_test  ->  Test.php	去掉前缀同名						
					m_user_info  -> UserInfo.php 下划线后面转大写

			2. 模型查询
				-- 获取一条
				一。
				1. $res = Test::get(1);
				2. $res = $res->name		获取一个字段,name
				3. $res = $res->toArray()	获取所有字段
					
			助手函数 model('Test')
				$test = model('Test');
				$res = $test::get(8);
				$res = $res -> toArray();


				二。传入 query 构造查询条件
				4. $user = Test::get(function($query){
						$query->where('name','=','user_6');
					});
				5. $user = Test::where('id',10)-> find();
				
				-- 获取多条
				1. $user = Test::all('1,2,3');	传入主键
				2. $user = Test::all([4,5,6]);
				3. $user = Test::where('id','<','5')->select();
				4. $user = Test::all(function($query){
						$query->where('id','>',4)->field('id,name');
					});

				需要遍历
				foreach($user as $val){
					dump($val->toArray());
				}

				5. $res = Test::where('id',13)->value('name'); 返回一个字段
				6. $res = Test::column('age','name');	获取一列，是一个数组

				获取一条	get()  find()

				获取多条	all()	select()

				获取单个字段	value()
				
				

			3. 模型添加数据
				1.	$res = Test::create([
						'name' => 'user1',
						'age' => 55,
						'demo' => 123
					],true);	// 字段不存在自动过滤，不传则报错

					$res = Test::create([
						'name' => 'user1',
						'age' => 55,
						'group' => 3,
						'demo' => 123
					],['name','group']);  // 只允许添加 name 和 group 这两个字段

					$res = $res->id;	// 获取插入的ID

				2.  $userModel = new Test;
					$userModel->name = '李四';
					$userModel->age = '77';
					$userModel->save();
					
					dump($userModel->id);
				
				3.  $userModel = new Test();
					$res = $userModel->save([
						'name' => '赵六',
						'age' => md5(21)
					]);
					dump($res);	 返回数据库插入的行数，

				4. $userModel->allowField(true)->save	防止报错，自动过滤掉不存在的字段
				5. $userModel->allowField(['name'])->save	只添加 name 字段

				6. $res = $userModel->saveAll([
						['age' => 44],
						['age' => 77],
					]);
					foreach($res as $val){
						dump($val->id);				只获取ID
						dump($val->toArray());		获取新增的结果集
					}
					新增多条
				
				
				


			4. 更新数据
				1. $res = Test::update([
					'id' => 1,		// 数组中存在主键，自动的更新
					'name' => '李四',
				]);

				2. $res = Test::update([	
						'name' => '王五',
					],['id'=>2]);	// 数组中没有主键，条件写在后面
				3. $res = Test::update([
						'name' => '王五',
					],function($query){
						$query->where('id','<','5');
					});
				
				4. $res = Test::where('id','<','4')->update([
						'name' => 18584651
					]);  返回影响的行数

				5. $userModel = Test::get(1);
					$userModel -> name = '赵六';	// 已经包含了主键
					$userModel -> age = 7584;	
					$res = $userModel->save();	// 自动更新
					dump($res);		// 返回影响行数
				
			5. 删除数据
				1. $res = Test::destroy(1);	 返回影响行数，传入主键

				2. $res = Test::destroy(function($query){
						$query->where('id','<',5);
					});
				3. $userModel = Test::get(7);
					$res = $userModel->delete();
				4. $res = Test::where('id',10)->delete();
				
				
			6. 聚合操作
				1. 


			
			模板布局
					

			模板继承



  </script>
</body>	
</html>