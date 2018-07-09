<?php

    mvvm设计模式: 更多的是操作数据，模型层(m)的数据改变,vm会通知视图(v)进行改变，M层是最重的
        m(模型), v(视图), vm(viewModel)


    mvp设计模式: 重点在控制器层，更多的是操作DOM
        m(模型), v(视图), c(控制器)
    
    前端组件化: 把页面的每一个部分都看做是一个组件,
    
    




    // 并发
    axios.all([p1(), p2()]).then(axios.spread((res1, res2) => {

    }))

    


    import Vue from 'vue'
    import Vuex from 'vuex'

    Vue.use(Vuex)

    export default new Vuex.Store({
        state: {
            count: 0,
            firstName: 'jack',
            lastName: 'ros'
        }
        mutations: {
            // 只能传两个参数，如果想传多个参数，用对象方式
            // 第一个参数就是 state 数据
            // 不能处理异步，处理异步使用 action 
            add(state, num) {
                state.count += num
            }
        }
        getters: {
            fuillName(state) {
                return state.firstName + '哈哈哈' + state.lastName
            }
        }
        actions: {
            addAsync(store, data) {
                setInterval(() => {
                    console.log(store)
                    store.commit('add', data.num)
                }, 1000)
            }
        }
    })

    {{count}}
    <p>{{fullName}}</p>
    mounted() {
        console.log(this.$store);
        let i = 0;
        setInterval(() => {
            this.$store.commit('add', ++i);
        }, 1000);
    },
    computed: {
        count() {
            return this.$store.state.count;
        },
        fullName() {
            return this.$store.getters.fullName;
        }
    }


    简写方法
        ...mapState(['count']),     {{count}}
        ...mapState({               
            counter: 'count'        {{counter}}
        }),
        ...mapState({
            number: state => {      {{number}}
                return state.count;
            }
        }),

        ...mapGetters(['fullName'])

    数据只能通过 mutations 修改

        this.$store.state.count = 10;

        strict: true    设置，正式环境不能使用


        mutations: 不能处理异步, 第一个参数是 state 数据
        
        actions: 可以处理异步， 第一个参数就是整个 store, Action 提交的是 mutation，而不是直接变更状态。

        this.$store.commit('add', ++i);     用来提交 mutations，

        this.$store.dispatch('add', ++i);     用来提交 actions，


        import { mapState, mapGetters, mapMutations, mapActions } from 'vuex';
        mounted() {
            this.addAsync({
                num: 5,
                time: 1000
            });
            this.add(20);
        },
        methods: {
            ...mapActions(['addAsync']),
            ...mapMutations(['add'])
        },
        computed: {
            ...mapState(['count']),
            ...mapState({
                counter: 'count'
            }),
            ...mapState({
                number: state => {
                    return state.count;
                }
            }),
            ...mapGetters(['fullName'])
        }


        多模块

        modules: {
            user: {
                state: {
                    name: '朱光勇',
                    age: 23
                }
            },
            login: {
                state: {
                    text: '我是login模块'
                }
            }
        }



        获取数据
        computed: {
            name() {
                return this.$store.state.user.name;
            },
            ...mapState({
                name: state=>state.user.name
            }),
        }

        使用mutation
        mounted() {
            let i = 10
            this.addAge(i+=10);
        },
        methods: {
            ...mapMutations(['addAge'])
        },


        所有的mutation都在全局空间
        要想只在当前模块，需要设置 namespaced: true,
        这样相同的 mutations 就不会互相影响了,前面加上命名空间
        mounted() {
            let i = 10
            this['user/addAge'](i+=10);
        },
        methods: {
            ...mapMutations(['user/addAge'])
        },

        getters
        getters: {
            // 第三个参数就是全局的state
            // 所有的getters方法
            fullName(state, getters, rootState) {
                return state.name + rootState.count
            }
        }
        ...mapGetters({
            fullName: 'user/fullName'
        })


        actions
        actions: {
            add({ state, commit, rootState }) {
                {root,true} 代表的是调用全局的mutations
                commit('addAge', rootState.count,{root,true})
                // commit('login/addAge', rootState.count,{root,true})     其他模块
            }
        }

