

<?php

            forEach遍历,
            var ary = [12,23,24,42,1];
            var res = ary.forEach(function (item,index,input) {
                 console.log(item);         数组中的每一项 （值）
                 console.log(index);        从零开始的索引 （键）
                 console.log(input);        整个数组（打印五遍数组）
                 input[index] = item*10;
            })
            console.log(res);       //-->undefined;
            console.log(ary);       //-->会对原来的数组产生改变；

            
            map 遍历,map的回调函数中支持return返回值
            var ary = [12,23,24,42,1];
            var res = ary.map(function (item,index,input) {
                console.log(item);         数组中的每一项 （值）
                console.log(index);        从零开始的索引 （键）
                console.log(input);        整个数组（打印五遍数组）
                return item*10;
            })
            console.log(res);       //-->[120,230,240,420,10];
            console.log(ary);       //-->[12,23,24,42,1]；

            arr.map():返回一个新的Array，每个元素为调用func的结果

            arr.filter():返回一个符合func条件的元素数组

            arr.some():返回一个boolean，判断是否有元素是否符合func条件

            arr.every():返回一个boolean，判断每个元素是否符合func条件

            arr.forEach():没有返回值，只是针对每个元素调用func

            :class="{'check-true': true}"           类名要加冒号


    构造器给组件传值用 v-bind:       :text="content"   props:['text'],   template:`<h1>{{text}}<h1>`,


        第一步： 引入子组件
        import ComponentA from './ComponentA.vue'
        
        第二步： 注册子组件，{ ComponentA } 是 { "ComponentA": ComponentA } 的简写,
        components: { ComponentA }
        三种写法都可以：
        components: {
            home,
            'home': home,
            home: home,
        }

        第三步： 使用子组件
        <component-a></component-a>         Vue 会自动的将 key 转换为component-a


        传值： 
        第一步： text="传过来的值"   定义值
        第二步： props: ['text']    接收值，
        第三步： <h1>{{ text }}</h1>    使用值，接收的属性(text)跟定义的属性(text)还有使用的属性(text)都一样

        动态传值： 
        第一步在构造器里定义数据：
        data: {
            content: '文本',
            url: 'http://www.baidu.com'
        },

        第二步与标签动态绑定：
        <parent :text="content" :href="url"></parent>

        第三步用props[]接收：components{}下
        props: ['text','href']           vue-cli 是对象 props: {'text','href'}

        第四步使用：
        template: `<a :href="href">{{ text }}</a>`,


        vue-cli 父传值给子
        1.引入子组件：
        import home from '@/components/home'

        2.注册子组件：
        components:{ home }

        3.使用子组件：
        <home></home>

        4.给子标签定义接收的属性跟需要传送的值：
        <home title="我是父组件传过来的值"></home>

        5.子组件构造器里使用props接收：
        props: ['title']

        6.直接用插值的方式在子组件模板里使用：三个属性都是 title
        <p>{{ title }}</p>

        动态绑定：
        1.准备数据：
        data() {
            return {
              content: 'A标签',
              url: 'http://www.baidu.com'
            }
        },
        
        2.子标签上采用动态绑定方式
        <app-home v-bind:text="content" v-bind:href="url"></app-home>

        3.子组件构造器里面用props选项接收：
        props:['text','href']

        4.跟data数据一样使用方式
        <a :href="href">{{ text }}</a>

        5.数据是对象可以简写：
        v-bind="array" 



        一。 vue-router 引入步骤
        1.新建router/index.js文件夹来配置路由
        2.引入vue跟vue-router
        import Vue from 'vue'
        import VueRouter from 'vue-router'
        3.注册成为Vue的插件： Vue.use(VueRouter)
        4.创建router实例并书写routes配置，最后暴露
            4.1 引入路由组件
            import home from '@/components/home'
        const router = new VueRouter({
            routes: [
                4.2 书写配置
                { path: '/', component: home }
            ]
        })
            4.3 暴露出去：export default router;
        5.  在main.js引入：import router from './router'   index不必书写，会默认加载index
            注入Vue根实例: new Vue({ router })
        6. 书写<router-view></router-view>标签来渲染路径匹配到的视图组件

        
        二。 新增路由步骤
        1.路由配置文件index.js里面引入需要配置的组件
        import home from '@/demo1/home'
        2.配置路由：{ path:'/home', name: 'home', component: home }
        3.书写router-link标签来跳转，<router-link to="/demo1" tag="li"> to属性指向跳转的path路径，tag生成的标签

        三。 vue-cli 配置 scss： 
        1. 安装loader： 
            cnpm install node-sass --save-dev
            cnpm install sass-loader --save-dev
        2.webpack.base.config.js在loaders里面加上配置
            { 
                test: /\.scss$/,
                loaders: ["style", "css", "sass"]
            }
        3.用scss的地方写上lang="scss"，<style lang="scss" scoped="" type="text/css"></style>


        四。引入stylus编写css
        1.安装stylus,stylus-loader
            cnpm install stylus --save-dev
            cnpm install stylus-loader --save-dev




        四。 HTML5 History 模式：mode: 'history',默认是hash,地址栏有#号

        五： view-link标签属性
        1.to属性：书写方式有四种： to="/home"  :to="url" :to="{name:'home'}"  :to="{path:'/home'}"
        2.router-link-active: 链接激活时默认添加的类名，可以修改
          2.1 全局配置： router实例里面配置： linkActiveClass: 'is-active'，链接加上 exact 精准匹配
          2.2 配置单挑： 在link标签里配置： active-class="selfActive"
        3.event:设置触发导航的事件，默认是点击，在link标签里可以修改
          3.1 event="mouseover" 改成移入触发

        六： 重定向和别名
        1.redirect: 重定向，当访问 /name 路由时，URL 将会被替换成 /home，然后匹配路由为 /home
            1.1 {path: '/name', redirect: '/home'}   根据路径匹配
            1.2 {path: '/name', redirect: '{path: /home}'}  也是根据路径匹配
            1.3 {path: '/name', redirect: '{name: home}'}   根据路由名字来匹配
            1.4 {path: '/name', redirect: (to)=>{}}   函数写法
        2.alias: 别名
            2.1 alias: '/index', 
        3.404页面
        to 参数是一个包含当前URL信息的对象，可以根据输入的URL来重定向不同的页面
        {path: '*',redirect:(to)=>{     
            if(to.path === '/home'){
                // return '/name';
                return {path: '/name'};
            }else {
                return {name: 'about'}
            }
        }}

        七。 嵌套路由
            7.1  新建子路由模板文件，在router配置文件中引入
                import left from '@/componnets/left'
                import right from '@/componnets/right'
            7.2  父路由添加一个children属性，是一个数组 children: [],里面配置着子路由的信息
                children:[
                    {path:'', component:left},  path 为空说明进入父路由时默认渲染这个子路由
                    {path:'right', component:right} 前面不能写斜杠，因为斜杠是匹配根路径
                ]
            7.3  父路由模板里面书写router-link标签来导航，书写router-view标签来渲染匹配到的组件
                <router-link to="/demo2/left">左边子路由</router-link>
                <router-link to="/demo2/right">右边子路由</router-link>
                <router-view></router-view>     视图呈现处
            7.4  默认渲染某个子路由
                1.默认不渲染任何子路由，要想渲染子路由需要把子路由的path设置为空，
                    {path:'', component:left},
                2.并且还需要在router-link标签里面修改to属性与父路由一样，添加exact精准匹配，这样才能激活导航，添加类名，显示高亮
                    <router-link exact to="/demo2">   改变前 to="/demo2/left"
                3.如果设置了默认的子路由，那么就需要把父路由的name属性给到默认的子路由身上，否则会报错
                    {path:'', component:left, name:"demo2"}
                4.路由嵌套过多时，可以把to属性改成对象方式
                    :to="{name:'left'}"   对比之前：to="/demo2/left"
                5.如果不想在地址栏看见层级的父元素，可以在path前面加上 / ,这时候就是根据根目录来匹配，但是link标签必须是以name方式来匹配路由，否则就会报错
                    {path:'/right'}       对比之前：{path:'right'} 
                    注意这是router-link标签里面的to属性必须是以name来匹配路由的
                    :to="{name:'right'}"  对比之前：to="/demo2/right"
                    这时候访问的地址栏就变成了 "/right"  对比之前："/demo2/right",没有了嵌套关系
                6.总结：默认子路由的router-link标签的 to 属性跟父路由的设置成一样，并且设置 exact 精准匹配来点亮类名，
                要想地址栏看不到路由层级关系，就把子路由的router-link标签绑定为name匹配，并在路由路径设置前面加上 '/'
        
        
        八。 命名视图，一个组件两个同级视图
            8.1. 页面添加一个router-view标签，并在标签上添加一个name属性
                <router-view name="slider" class="bottom"></router-view>
            8.2. 新建组件并在路由配置文件中引入
                import nav from '@/demo-3/nav'
            8.3 在路由配置中将component改成components:{},并在components里面配置，
                components: {
                    default: demo3,     默认显示的组件
                    slider: nav         前面的slider是view标签上的name属性值，后面的nav是引入的组件
                }
                对比之前：component: demo3
            8.4. 这时会将 demo3 组件渲染到没有name属性的view标签上，把nav组件渲染到name属性为slider的view标签上
        
        九。  滚动行为
            