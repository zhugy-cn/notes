

<?php


$ npm install --global vue-cli      # 全局安装 vue-cli

$ vue init webpack my-project      # 创建一个基于 webpack 模板的新项目

$ cd my-project

npm install  # 安装依赖，走你

$ npm run dev


Project name vuedemo                项目名称

Project description A Vue.js project    描述

Author zhugy <860185538@qq.com>         git 信息

Vue build standalone                    

Install vue-router? Yes             是否安装路由

Use ESLint to lint your code? No    语法检测

Set up unit tests No                单元测试

Setup e2e tests with Nightwatch? No     端测试

Should we run `npm install` for you after the project has been created? (recommended) no


1.  route，它是一条路由             { path: '/home', component: Home } path 指路径，component 指的是组件

2.  routes 是一组路由(数组)         [{ path: '/home', component: Home }, { path: '/about', component: About }] 两条路由，组成一个routes

3.  router 是一个机制，相当于一个管理者，它来管理路由,接受routes 参数。   new VueRouter({routes:[{ path: '/home', component: Home }, { path: '/about', component: About }]  })

4.  配置完成后，把router 实例注入到 vue 根实例中,就可以使用路由了   new Vue({ router });

5.  客户端中的路由，实际上就是dom 元素的显示和隐藏,客户端路由有两种实现方式：基于hash 和基于html5 history api.

6.  <router-link> 和<router-view>来对应点击和显示部分

7.  <router-link> 就是定义页面中点击的部分，to 属性，定义点击之后，要到哪里去

8.  <router-view> 定义显示部分，就是点击后，区配的内容显示在什么地方

一。
1.  在src 目录下新建两个组件，home.vue 和 about.vue
2.  路由文件中引入组件，定义router, 就是定义 路径到 组件的 映射
3.  在 App.vue中 定义<router-link > 和 </router-view>  


@ 表示 src 文件路径的别名， webpack.base.conf.js 里 alias 配置
    
    $ npm install --global vue-cli          # 全局安装 vue-cli
    
    $ vue init webpack vue-base             # 创建一个基于 webpack 模板的新项目

    ? Project name (vue-base)               # 项目名称
    
    ? Project description (A Vue.js project)    # 项目描述

    ? Author (gyong <860185538@qq.com>)         # 作者

    Runtime + Compiler: recommended for most users      # 默认选中，安装一些loader

    ? Install vue-router? (Y/n)    Y                    # 是否安装路由

    ? Use ESLint to lint your code? (Y/n)               # 语法检测
    # 安装依赖，走你
    $ cd my-project
    $ npm install
    $ npm run dev
    
    main.js   入口文件

    App.vue   整个组件的入口

    router/index        路由配置
    
    build               webpack配置相关

    config              生产环境和开发环境的配置参数

    node_modules        安装的第三方依赖

    src                 项目源代码

    static              第三方资源

    .gitkeep            git不会忽略

    .babelrc            babel编译器配置
    
    ESLint              代码风格检查忽略的文件
    
    standard            按照这种风格检查代码

    .postcssrc.js       css 规则

    dependencies        生产环境依赖

    devDependencies     开发环境依赖

    ^                   更新项目加载最新的

    每条路由与组件之间有映射关系，通过路由切换组件

    单页应用（SPA），动态生成网页结构，js  css  只用加载一次

    vue-router 使用步骤
        1, 安装模块          cnpm install vue-router --save
        2, 引入模块          import VueRouter from 'vue-router'
        3, 作为Vue的插件     Vue.use(VueRouter)
        4, 创建路由实例对象：
            new VueRouter({
                配置参数
            })
        5, 注入Vue选项参数：
            new Vue({
                router,
            })
        6, 告诉路由渲染的位置    <router-view></router-view>

    
    hash模式跟history模式（没有#号）
     地址栏的#就是hash，默认hash模式，用A标签跳转前面要加#号，<a href="#/home">home</a>
     history模式A标签跳转不用加#号，但会刷新页面，<router-link>标签解决这个问题

     router-link标签：生成的是A标签，取消A标签的默认行为
     to属性指向的是路径,动态绑定用 v-bind:to="",简写 :to

     动态绑定：  <router-link :to="index">home</router-link>
     对象形式：  <router-link :to="{path: '/about'}">about</router-link>
     默认生成A标签，可以用tag="div"修改生成div标签， <router-link :to="index" tag="div">home</router-link>，里面也可以写结构

     激活的链接会自动添加这个类名  router-link-active
     router-link-active起别名，全局设置在路由配置里面：linkActiveClass: 'is-active', // 全局自定义链接激活类名
     单个设置在标签里：active-class="activeClass" <router-link :to="index" active-class="activeClass">home</router-link>

     center作用到所有组件根节点里面<router-view class="center"></router-view> 里面设置class会作用到路径组件面的根节点里面，公共的样式放在这里

     默认是点击触发，event属性可以改变， event="mouseover"改成移入触发  <router-link to="/document" event="mouseover">document</router-link>
 

     嵌套路由：link标签生成的 li 由于没路径信息，需要在里面嵌套一个不加 href 属性的A标签，会自动生成A标签的href属性，并且添加上路由路径信息

     默认第一个显示的路由组件需要写精准匹配 exact

     设置了默认子路由，父路由就不需要写name属性了，而是把name属性写在默认的子路由上面

     路由里面name的作用：防止子路由太长，所有用name动态绑定  :to="{name: 'about'}"

     路由嵌套时：如果想要在地址栏上看不见父路由，就可以把斜杠加上  path: '/hobby',

     页面多个路由：根据对应的name属性来渲染  <router-view name="slider"></router-view>

     滚动条坐标： scrollBehavior(){} 用函数来配置，
        1. 返回的时候根据滚动来的坐标来定位上一次浏览的位置
        2. hash定位(锚点) to="/document#abc">添加#abc,并添加页面上的DOM，ID为abc，最后配置路由里面的函数
    
        一。动态路径参数
        路径： /user/:userId   userId为动态参数  获取参数：通过路由对象的 params 属性
        对组件的注入： 通过在Vue根实例的 router 配置传入 router 实例
        $router      拿到router实例对象
        $route       当前激活的路由信息对象，每个组件实例都会有
        $beforeRouteEnter()     进入组件前的钩子函数
        $beforeRouteLeave()     离开组件前的钩子函数

        1. :to="'/user/'+item.tip+'/'+item.id"      link标签动态传递参数
        2. path: '/user/:tip?/:userId?',,           路由里面定义参数的名称,这时候地址栏就会出现动态的数据 /user/vip/1
        3. this.$route.params.userId    接收传递的参数，跟参数名称对应 
        
        created(){} // 钩子函数，编译之前执行第一次，组件不会重新生成，函数只会执行一次，所有要用watch监控路由信息
            // 用watch监控对象，实时监控地址栏，当地主栏变化时，将参数渲染到视图上

            查询字符串：exact  ?info=follow  <router-link exact to="?info=follow">，添加到地址栏后面
            第二种对象写法： exact :to="{path: '',query:{info: 'share',name: 1}}"  <router-link exact :to="{path: '',query:{info: 'share',name: 1}}">

            $route.qurey  获取查询字符串,
            设置默认显示：需要修改link标签，会默认加上?info=follow :to="{path: '/user/'+item.tip+'/'+item.id, query: {info: 'follow'}}"

        
        二。过渡动画：要设置transition: all .4s linear属性才能看出类名
            添加删除css类名： 
                v-enter  : 定义进入过渡的开始状态
                v-enter-active  : 定义进入活动状态
                v-enter-to  : 定义进入的结束状态

                v-leave ：定义离开过渡的开始状态
                v-leave-active ：定义离开活动状态
                v-leave-to ：定义离开的结束状态

        将切换的视图（view标签）用transition标签包裹起来 
        离开进入一起设置会导致第一个还没有完全离开第二个就显示了,用定位可以定在一起

        两种模式：设置在transition标签上,mode="in-out"
        in-out: 新元素先进行过渡，完成之后当前元素过渡离开，【先进入后离开】
        out-in: 当前元素先进行过渡，完成之后新元素进入，【先离开后进入】,一般用这个

        mode="out-in"设置动画模式，name="left"设置前缀名，默认的前缀是v-
        <transition name="left">

        类名设置为动态，根据选项卡的左边来加载类名，加载左右动画

        路由元信息：在路由配置中meta可以配置一些数据，用在路由信息对象中
        访问meta的数组： $route.meta, 在路由中设置索引来改变类名运用不同的动画


    三。编程式导航，控制浏览器导航
        back：回退一步           this.$router.back();
        forward: 前进一步       this.$router.forward();
        go：指定前进回退步数     this.$router.go(-2);  // 表示后退两步
                                this.$router.go(2);  // 表示前进两步
                                this.$router.go();  // 0 表示刷新当前导航

        push：导航到不同的url，向history栈添加一个新的记录，有历史记录
            this.$router.push('/user')   // 跳转到 user 路由
            // this.$router.push({path: '/document'})   // 跳转到 document 路由

        replace：导航到不同的url，替换history中的当前记录


    四。导航钩子函数：导航发生变化是，导航钩子主要用来拦截导航，让它完成跳转或者取消
    执行钩子函数的位置： router全局。单个路由。组件中

    钩子函数： router实例上： 进入导航之前：beforeEach(判断是否登录)。进入导航之后：afterEach（改变title）
            单个路由中： beforeEnter, 进入单个导航之前执行
            组件内的钩子： beforeRouteEnter、beforeRouteUpdate、beforeRouteLeave

    钩子函数接收的参数： 
        to:   要进入的目标路由对象  到哪里去
        from:  离开导航的路由对象   从哪里来
        next:  用来决定跳转或者取消导航




        三。 vue-cli 配置 scss： 
        1. 安装loader： 
            cnpm install node-sass sass-loader --save-dev
            cnpm install sass-loader --save-dev
        2.webpack.base.config.js在loaders里面加上配置
            { 
                test: /\.scss$/,
                loaders: ["style", "css", "sass"]
            }
        3.用scss的地方写上lang="scss"，<style lang="scss" scoped="" type="text/css"></style>


        npm install --save normalize.css
        
        
        四。引入stylus编写css
        1.安装stylus,stylus-loader
            cnpm install stylus --save-dev
            cnpm install stylus-loader --save-dev