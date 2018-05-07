<?php


    mvvm设计模式:
        更多的是操作数据,模型层(m)的数据改变,vm会通知视图(v)进行改变，M层是最重的
        m(模型), v(视图), vm(viewModel)


    mvp设计模式: 
        重点在控制器层，更多的是操作DOM
        m(模型), v(视图), c(控制器)


    前端组件化: 把页面的每一个部分都看做是一个组件,


    父传子值，通过属性
        1. 父组件   :title='item'    :index='index'
        2: 子组件   props: ['item','index']
        3. 子组件   {{item}}
    

    子传父值，通过事件
        1. 子组件   this.$emit('delete',this.index)
        2. 父组件   @delete="handleDelete"
        3. 父组件   handleDelete函数可以接收index值


    Vue实例vm, Vue实例接管el下的DOM,Vue实例的属性和方法前面都加了一个$, Vm.$data, Vm.$emit, Vm.$destroy


    其实每一个组件就是一个Vue实例，但只有一个Vue根实例，这些Vue实例全部挂载在一个Vue的根实例里面


    生命周期函数，生命周期函数就是vue实例在某一个时间点自动执行的函数
        1. beforeCreate     创建vue实例进行初始化后

        2. created          创建完成

        3. 是否有 el 和 template 
            没有 template 就把 el 节点当作模板来渲染
            <div id="app">测试</div> 相当与 <div id="app"></div> template: "<div>测试</div>"

        4. beforeMount      页面数据挂载之前，页面数据还没有被渲染

        5. mounted          页面数据挂载之后，页面数据已经渲染完毕

        6. beforeDestroy    组件被销毁之前，调用vm.destroy之前

        7. destroyed        组件被销毁之后，调用vm.destroy之后

        8. beforeUpdate     数据更新前

        9. updated          数据被更新后

    v-html  v-text


    computed: 计算属性，需要return
        自带缓存，当依赖的属性没有发生改变的时候，不会重新计算，而是用上一次的计算结果，可以提高一些性能，依赖的属性发生改变才会重新执行计算
        methods: 方法每次都会调用
        watch: 也有一个缓存机制，但需要监听每一个属性
    
        get: 获取值时执行

        set: 修改值时执行，参数就是修改的值，改变相关联的值，又重新计算


    样式绑定,对象和数组
        1. :class="{active: isActive}"  active是类名，isActive是true或false

        2. :class="[active]"            active是绑定在data里的类名

        3. :style="styObj"              styObj是绑定在data里的对象

        4. ：style="[styObj, {fontSize: '20px'}]"

    条件渲染：
        v-show=true 显示,display=none
        v-if=true   显示,没有DOM节点
        
        input 切换时内容没有清空，可以加key来解决

    
    列表渲染，数组(v, i), 对象(v, k, i)
        vm.list[4] = {id: 1,name: 'jack'}，不会更新到视图
        数据已经改变，但不会更新到视图

        push pop shift unshift splice sort reverse   变异方法才能改变
        
        方法一: vm.list.splice(4,1,{id: 1,name: 'jack'})

        方法二: 改变数组引用
        
        template不会渲染到页面上

        对象:   vm.$set(vm.userInfo, 'key', 'value')    改变对象更新视图


    组件
        <li is="row"></li>    列表渲染BUG,row是组件

        子组件的 data 必须时一个函数，而不能是一个对象，因为子组件不像根组件只会调用一次，而是会被调用多次
    防止共享一份数据，根据引用数据类型的特性，防止某个组件的数据改变而影响其它的子组件，所以必须是函数，每个
    子组件数据都应该是独立的

        获取DOM
            1. 定义 ref="demo"
            2. 获取 this.$refs.demo
            3. 在组件上加 ref 获取的是组件的引用

        注册局部组件: components: {demo}

    单项数据流
        子组件只能使用父组件传递的值，不能直接修改，因为如果传递的是引用类型而刚好其他的子组件也使用的话会影响其他子组件的值
    子组件自定义一个只来接受父组件的值，然后改变自己的值再传给父组件


    组件参数校验，
        1. content="hello wrold"
        3. props: {
            content: String,            必须是字符串类型
            content: [String, Number],  数字或者字符串  
            content: {
                type: String,       
                required: true,     必传
                default: 'demo'     不传时的默认值
                validator: function(value) {
                    return (value.length > 5)   长度必须大于5
                }
            }
        }
        props特性，传递属性跟接受属性一样，DOM里面没有显示
        非props特性，会显示再DOM里

    组件上绑定的是自定义事件，通过this.$emit触发
        要想在组件上绑定原生事件，<child @click.native="事件名"></child>
        
    非父子组件传值：Vuex，总线机制，发布订阅模式，观察者模式

    插槽，传递DOM结构，子组件：<slot>默认内容</slot>

    具名插槽，多个插槽，父组件取名字 <p slot='header'></p>
                 子组件： <slot name='header'></slot>

    作用域插槽：
        子组件: <slot v-for="item of list" :item=item></slot>
        父组件: 
        <template slot-scope="props">   接受的数据放在props里面
            <li>{{props.item}}</li>
        </template>

    动态组件:   <component :is="type"></component>  type就是组件名

    v-once: 保存在内存里，提高静态内容切换的性能

    .vue    单文件组件
    
    多页页面与单页页面
        多页应用: 每次页面跳转，都会发送HTTP请求新的页面
            优点: 首屏时间快，SEO效果好
            缺点: 页面切换慢

        单页应用: JS感知到URL的变化后，会动态的清除当前页面内容，加载URL对应的内容，路由由前端来做
            优点: 页面切换快
            缺点: 首屏时间稍慢，SEO差