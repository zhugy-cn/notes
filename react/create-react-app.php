<?php

    环境搭建
    cnpm install -g create-react-app
    create-react-app my-app
    cd my-app/
    npm start

    cnpm install redux --save

    es6常用语法

    块级作用域：let 
    定义常量：const    

    字符串：模板字符串，换行，${name}
    let name = "jack";
    let skill = "web";
    console.log(`我的名字${name},技能${skill}`);

    函数扩展：
    参数默认值；
    箭头函数：一个参数括号可以省略，简写代码，保持this指向
    const demo = name => {
      console.log('箭头函数')
    }
    展开运算符：

    对象扩展：
    Object.kets  values    entries  
    对象方法的简写{...a,...b}  b会把a覆盖

    解构赋值
    let arr = [1,2,2]
    let [a,b,c]=arr

    类

    cnpm install express --save

    二。Express + mongodb
    Express开发web接口
    mongodb： 非关系型数据库
    mongoose来链接和操作mongodb
    安装：cnpm install express --save
    cnpm install -g nodemon   不用结束当前的node，自动监听  nodemon server.js 自动监听
    app.use 使用模块
    res.send()      返回文本
    res.json()      返回JSON
    res.sendfile()  返回文件

    安装mongodb：  https://www.mongodb.com/download-center?jmp=nav#community
    安装mongoose： cnpm install mongoose --save
    connect连接数据库
    定义文档模型，sc
    create(增)   remove(删)   update(改)
    find和findOne来查询数据

    // 无状态函数，无状态函数的props就是父组件传进来的值，用props.name获取
    function 骑兵连(props) {
      return <h2>骑兵连连长{props.老大}，冲啊</h2>
    }

    cnpm install antd-mobile --save     安装ui组件  官网地址：https://mobile.ant.design/docs/react/use-with-create-react-app-cn
    cnpm install babel-plugin-import --save     按需加载组件(需要自配置)

    三。Redux
    cnpm install redux --save   安装redux
  

    手动连接
    1. 新建store ，并传给子组件
    2. 将store跟action都传给子组件，让子组件用 dispatch() 来修改数据
    3. 将渲染页面放在一个函数里面，函数放在 store.subscribe() 里面，这样数据一旦变化会调用函数从而渲染视图

    1.redux处理异步，需要redux-thunk插件，安装  cnpm insatll redux-thunk --save
        使用applyMiddleware开启thunk中间件，index.js页面
        action可以返回函数，使用dispatch提交action
        
    2.谷歌调试工具： redux-devtools
    3.使用react-redux来优雅的连接react跟redux  cnpm insatll react-redux --save
      忘记subscribe,记住reducer,action和dispatch
      react-redux提供 provider 和 connect 两个接口来连接
      使用：
      Provider 组件放在应用的最外层，传入 store 即可，只用一次
      Connect 组件负责从外部获取组件需要的参数
      Connect 可以用装饰器来写：
        npm run eject 弹出个性化配置
        cnpm install babel-plugin-transform-decorators-legacy --save-dev 安装插件

      四。路由
      安装： cnpm install react-router-dom --save

      BrowserRouter 包裹整个应用
      Route 路由对应渲染的组件，可嵌套
      Link 跳转专用

      加 exact 就是完全匹配


      <div>
      <ol>
        <li>loader尽量去官网差，有对应的基本配置</li>
        <li>cnpm init 创造package.json项目身份证</li>
        <li>cnpm install --save-dev webpack</li>
        <li>创建webpack.config.js配置文件</li>
        <li>cnpm install --save-dev babel-core babel-loader babel-preset-es2015 babel-preset-react</li>
        <li>cnpm install react react-dom --save-dev</li>
        <li>自定义组件首字母必须大写，小写会被解析成普通的标签</li>
        <li>export default 暴露不需要大括号,需要把引入的js放在最后面，否则会找不到DOM</li>
        <li>
          <dl>
            <dt>jsx语法被babel-preset-react翻译解析，</dt>
            <dd>外层必须被一个标签包裹,</dd>
            <dd>标签必须封闭</dd>
            <dd>class写成className,for写成htmlFor</dd>
            <dd>html注释不能使用</dd>
            <dd>{} 可以插入一个简单表达式</dd>
            <dd>原生标签要使用自定义属性，必须用 data- 前缀 data-a="10",自定义标签可以 a="10"</dd>
            <dd>数组必须要有不重复的Key属性</dd>
          </dl>
        </li>
      </ol>
      <h3>数据传递三兄弟: state、props、context</h3>
      <ol>
        <li>子类必须在constructor方法中调用super方法，否则新建实例时会报错。这是因为子类没有自己的this对象，而是继承父类的this对象，然后对其进行加工。如果不调用super方法，子类就得不到this对象。</li>
        <li>绑定事件on后面的首字母要大写，onClick={add}</li>
        <li>绑定函数的时候要绑定this，onClick={(add.bind(this))},只有bind才不会刺激函数运行</li>
        <li>属性中的值变化，不会引起视图的变化</li>
        <li>
          <h3>state 属性</h3>
          <ol>
            <li>
              React 里，只需更新组件的 state，然后根据新的 state 重新渲染用户界面（不要操作 DOM）。,状态值，每次修改以后，自动调用 this.render 方法，再次渲染组件。
            </li>
            <li>定义state：this.state = {a:100, b:200}</li>
            <li>使用state：{this.state.a}</li>
            <li>改变state：this.setState({a: this.state.a+1}),不能写++，因为只读</li>
          </ol>
        </li>
        <li>
          <h3>props 属性,父组件给子组件传值</h3>
          <ol>
            <li>定义在自定义组件标签上的值，就是props当props改变的时候，会引发视图的改变</li>
            <li>给子组件传值，
              <b a=10 b="10"></b>
            </li>
            <li>子组件接受：{this.props.a}</li>
            <li>构造函数中使用：第一个参数是props，props.a</li>
            <li>父组件的值改变，子组件也会跟着改变,但在子组件中props的值不可变</li>
            <li>子组件中，props是只读的，不能修改，如果要修改，可以在构造函数中用state来接受，然后用setState来改变state的值</li>
            <li>
              props属性验证有效性
              <br>
              <span>安装：cnpm install --save-dev prop-types</span>
              <br>
              <span>引入：import {PropTypes} from 'prop-types'</span>
              <br>
              <span>在子组件中使用：Demo.PropTypes = {a: PropTypes.string.isRequired,}</span>
            </li>
          </ol>
        </li>
        <li>
          <h3>子组件给父组件传值</h3>
          <ol>
            <li>父组件传一个函数给子组件，子组件通过传参数将数据返回给父组件，父组件的函数接受实参改变父组件中的的state等值</li>
          </ol>
        </li>
        <li>
          <h3>context属性</h3>
          <ol>
            <li>爷爷组件可以直接传数据给孙子组件</li>
            <li>爷爷组件：getChildContext({return{a: this.state.a}),</li>
            <li>引包：import PropTypes from 'prop-types'</li>
            <li>爷爷组件：Yeye.childContextTypes={a:PropTypes.number.isRequired},往下传的类型</li>
            <br>
            <li>子组件也需要设置：Baba.contextTypes-{a:PropTypes.number.isRequired}，得到的类型</li>
            <li>constructor构造函数的第二个参数是context，插值：{this.context.a}</li>
          </ol>
        </li>
        <li>
          <h3>组件的生命周期（9个），分为挂载阶段（4个）、更新阶段（4个）、卸载阶段（1个）三个阶段</h3>
        </li>
        <ol>
          <li>
            <h3>挂载阶段</h3>
          </li>
          <ol>
            <li>constructor 组件的初始化</li>
            <li>componentWillMount 组件即将被挂载，使用constructor()来替代</li>
            <li>render 渲染组件</li>
            <li>componentDidMount 组件挂载完毕。可以通过this.refs来访问真实DOM</li>
          </ol>
          <li>
            <h3>更新阶段</h3>
          </li>
          <ol>
            <li>componentWillReceiveProps 已加载的组件在props发生变化时调用</li>
            <li>shouldComponentUpdate 这个函数只返回true或false，表示组件是否需要更新（重新渲染）</li>
            <li>componentWillUpdate 接收到新的props或者state之后，这个函数就会在render前被调用。</li>
            <li>render 组件更新后的二次渲染</li>
            <li>componentDidUpdate 二次渲染完后调用，也可以使用this.refs来获取真实的DOM</li>
          </ol>
          <li>
            <h3>卸载阶段</h3>
          </li>
          <ol>
            <li>componentWillUnmount 在组件被卸载和销毁之前立刻调用。在这个函数中，应该处理任何必要的清理工作，比如销毁定时器、取消网络请求、清除之前创建的相关DOM节点等。</li>
          </ol>
          <li>
            <h3>组件变化的完整流程</h3>
          </li>
          1 == constructor == 组件形成时
          <br> 2 == componentWillMount == 组件即将被挂载
          <br> 3 == render == 渲染组件
          <br> 4 == componentDidMount == 渲染完毕后调用，已经渲染出了真实的DOM
          <br> 5 == componentWillReceiveProps == props变化时调用
          <br> 6 == shouldComponentUpdate == 这个函数只返回true或false，表示组件是否需要更新（重新渲染）
          <br> 7 == componentWillUpdate == 接收到新的props或者state之后，这个函数就会在render前被调用。
          <br> 3 == render == 渲染组件
          <br> 8 == componentDidUpdate == render函数二次渲染完毕后调用
          <br>
        </ol>
        </li>
      </ol>
  
    </div>