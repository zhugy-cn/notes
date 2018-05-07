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
            router实例上:   beforeEach(进入导航之前)、afterEach(进入导航之后，改变当前title)
            单个路由中:     beforeEnter(进入导航之前)
            组件内的钩子:   beforeRouteEnter(进入组件之前)、beforeRouteUpdate(子导航切换时执行)、beforeRouteLeave(离开组件之前)
        路由钩子函数比组件钩子函数先执行，要想在路由钩子函数中改变数据，需要在next函数中传一个回调函数，参数就是当前的Vue实例

        3. 钩子函数接受的参数
            to:     要进入的目路由对象，到哪里去
            from:   正要离开导航的路由对象，从哪里来
            next:   用来决定跳转或取消导航
        
    ·