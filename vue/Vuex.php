<?php

    mvvm设计模式: 更多的是操作数据，模型层(m)的数据改变,vm会通知视图(v)进行改变，M层是最重的
        m(模型), v(视图), vm(viewModel)


    mvp设计模式: 重点在控制器层，更多的是操作DOM
        m(模型), v(视图), c(控制器)
    
    前端组件化: 把页面的每一个部分都看做是一个组件,
    
    




    // 并发
    axios.all([p1(), p2()]).then(axios.spread((res1, res2) => {

    }))

    
