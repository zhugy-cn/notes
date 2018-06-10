<?php
    前端路由
        作用：通过管理url,实现url和组件的对应和通过url进行组件之间的切换，url跟视图对应

    单页页面（SPA）：
        加载单个HTML页面，并在用户与应用程序交互时动态更新该页面，不会刷新，通过js动态的生成页面结构，
    首次加载，后续不用加载，浪费多余的资源

    <!-- 使用步骤 -->
    1. 安装模块
        npm install vue-router --save

    2. 引入模块
        import VueRouter from 'vue-router'

    3. 作为Vue插件
        Vue.use(VueRouter)

    4. 创建路由实例对象
        new VueRouter({
            配置参数
        })

    5. 注入Vue选项参数
        new Vue({
            router
        })

    6. 告诉路由渲染的位置，显示当前路由地址所对应的内容
        <router-view />

    一、路由实例选项
        1. mode: 'history',     history 模式, 默认 hash 模式

        2. linkActiveClass: 'is-active',   全局设置路由被激活的类名，默认router-link-active

        linkExactActiveClass

        scrollBehavior(to, from, saveedPosition) {
            if(saveedPosition){
                return saveedPosition
            }else{
                return {x:0, y:0}
            }
        }

        porps: true 直接传给组件的props,不需要路由获取

        

        3. active-class="active-class"  设置单个路由被激活的类名

        4. tag='li' 把router-link渲染成li标签，默认是 A 标签

        5. event='mouseover'    路由触发的事件，默认是点击
        
        6. <router-view class="center" />   设这里的类名会加到路由组件的根标签上，作用于所有匹配到的路由组件

        7. exact  完全匹配

        8. 如果已经设置默认子路由，那么name属性就应该设置在默认子路由上面

        9. 当把router-link的tag设置成li后，为了能看见路由，可以嵌套一个什么属性都不加的A标签，这样路由信息就会显示在A标签上

        10. 当路由层次嵌套过深时，可以用name来匹配路由， to='/about/hobby' -> :to='{name:"hobby"}'


        11. this.$route 当前激活的路由信息对象，每个组件实例都会有
            fullPath    全路径
            hash        hash值
            matched     嵌套路由
            meta        元信息
            name        当前路由名字
            params      url动态参数
            path        当前路径
            query       查询字符串


    二、组件过渡动画
        1. v-enter          组件进入的开始状态

        2. v-enter-active   组件进入的过渡时间

        3. v-enter-to       组件进入的结束状态

        4. v-leave          组件离开的开始状态
        
        5. v-leave-active   组件离开的过渡时间

        6. v-leave-to       组件离开的结束状态

        7. 可以使用name模式改变前缀
        
        8. 自定义class名字，配合 animate.js 使用
            enter-active-class="active"
            leave-active-class="leave"

        9. 跟 animate.js 配合
            enter-active-class="animated swing"     进场
            leave-active-class="animated shake"     出场

        10. 刷新页面第一次也需要有动画效果
            appear
            appear-active-class="animated swing"

        11. 包含两种动画
            type="transition"   以transition动画时长为主
            :duration="2000"    自定义动画时长
            :duration="{enter: 2000, leave: 5000}"  分别设置进场与出场的动画
            enter-active-class="animated swing fade-enter-active"     进场
            leave-active-class="animated shake fade-leave   -active"     出场
        
        10. 总结
            1. 组件进入的开始状态就是组件离开的结束状态
            2. 组件进入和组件离开的过渡时间一般一样
            3. 组件进入的结束状态就是组件离开的开始状态

        11. 简写
            .fade-enter,
            .fade-leave-to {
                opacity: 0;
                transform: translate(100%, 0);
            }
            .fade-leave-active,
            .fade-enter-active {
                transition: all 1s;
            }
        
        12. 过渡模式，不设置就是同时执行
            1. in-out: 先进后出
            2. out-in: 先出后进

        13. <transition name="left" mode='out-in'>
            找left开头的动画，先出后进

        14. 定义left动画和right动画，设置路由元信息(meta)来动态的设置transition的name属性，实现左右不同方向的切换

        15. 动画钩子函数，js动画与 Velocity.js 结合
            <transition
                入场动画
                @before-enter="事件名"      有一个参数，el 动画包裹的标签
                @enter="事件名"             有两个参数，el, done
                @after-enter                done调用后执行，一个参数，el

        16. v-if 切换元素会导致动画失效，是因为Vue复用DOM，加key可以解决

        17. 列表过渡动画，相当于在每个列表项外面加了一个 trnsition
            <transition-group>
                列表内容
            </transition-group>
    

    三、编程式导航
        1. this.$router.back()      后退一步

        2. this.$router.forward()   前进一步

        3. this.$router.go(-1)      指定前进或后退的步数

        4. this.$router.push('/home')       像history栈添加一个新纪录

        5. this.$router.replace     替换history栈中的记录
        
    四、导航钩子函数
        1. 执行钩子函数的位置
            router全局
            单个路由
            组件中
        
        2. 钩子函数 
                            
            router实例上:   beforeEach(进入导航之前)、beforeResolve()、afterEach(进入导航之后，改变当前title)   进行数据的校验，权限控制
            单个路由中:     beforeEnter(进入导航之前)
            组件内的钩子:   beforeRouteEnter(进入组件之前)、beforeRouteUpdate(子导航切换时执行)、beforeRouteLeave(离开组件之前)
        路由钩子函数比组件钩子函数先执行，要想在路由钩子函数中改变数据，需要在next函数中传一个回调函数，参数就是当前的Vue实例

        next(vm=>{
            console.log(拿到Vue实例)
            vm.text
        })

        异步路由
            component: () => import(组件的路径)
        
        
        3. 钩子函数接受的参数
            to:     要进入的目路由对象，到哪里去
            from:   正要离开导航的路由对象，从哪里来
            next:   用来决定跳转或取消导航
        
    
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
            
