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
    // Vue 实例属性
        vm.$data        vm.text === vm.$data.text

        vm.$props
    
        vm.$el

        vm.$options     vm.$options.render = (h) => return 新的

        vm.$root        vm.$root === vm

        vm.$children    

        vm.$slots

        vm.$scopedSlots

        vm.$refs        ref=

        vm.$isServer

    // Vue实例方法
        vm.$watch('text',(newText,oldText)=>{})     需要自动注销，unWatch()

        vm.$on('test',()=> 事件)    vm.$emit('test')

        vm.$forceUpdate()       强制组件渲染一次

        vm.$nextTick    保证DOM渲染完成

        生命周期变化    this和this.$el有区别

        是否有 el，没有就等待调用 vm.$mount() 方法，
        是否有 template ,有就把template解析成 render Function,在 beforeMount 和 mounted 中间执行
        



        
        

        
         
        
    
    </script>
</body>
</html>