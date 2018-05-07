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
	  	文档： https://docs.mongodb.com/manual/tutorial/getting-started/

		配置环境变量：
		Path:   C:\Program Files\MongoDB\Server\3.6\bin


		命令：

		mongod    开机   mongod --sbpath c:/mongo，开机之后不能关，要想操作数据库，必须另起一个窗口来操作

		或者在 C 盘手动新建 data/db 命令直接 mongod 也可以

		mongo     使用链接数据库（另起命令行）

		mongoimport     导入数据


		基本命令
		show dbs    查看所有数据库

		use admin    进入数据库

		show collections   显示当前数据库集合

		db    显示当前数据库

		简单操作
		use user   建立数据库
		
		db.name.insert({"name":"jack"})  创建name集合并在name集合中插入一行文件

		db.name.find()  查询name集合的所有文件

		db.name.findOne()  查询一条

		db.name.update({"name":"ros"},{"name":"ros","sex":"nv"})   修改

		db.name.remove({"name":"zhangsan"})   删除一条文件

		db.name.drop()  删除name集合

		db.dropDatabase()   删除数据库

		不要超过48M

		db.name.insert([{"_id":1},{"_id":2}])  批量添加

		update修改器
		
	</script>

</body>

</html>