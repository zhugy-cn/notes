


// 添加基础路径
// 1. 请求拦截器     config.url = 'http://admin.com' + config.url
// 2. 全局设置      axios.defaults.baseURL = 'http://admin.com';


// // 创建axios实例
// let server = axios.create({
//     baseURL: 'http://admin.com',
//     timeout: 5000,
// })

// axios.defaults.baseURL = 'http://admin.com';
// axios.defaults.headers.common['Content-Type'] = 'application/x-www-form-urlencoded';
// request 拦截器
axios.interceptors.request.use(config => {
    // config.headers['token'] = '24554'
    console.log(config)
    return config;  // 必须return,不然报错  Cannot read property 'cancelToken' of undefined
}, error => {
    console.log('请求拦截器', error)
});

// response 拦截器
axios.interceptors.response.use(response => {
    // 对响应数据做点什么
    // 必须 return ，不然返回undefined
    console.log('响应')
    const { data, code, error } = response.data
    if (code == 0) {
        return data
    } else {
        // code 不等于 0 时，不 return 进入 resolve ,返回 undefined
        console.log(error)
    }
}, error => {
    // 对响应错误做点什么
    console.log(error.response)
    if (error.response) {
        // 请求已发出，但服务器响应的状态码不在 2xx 范围内
        const { data, status } = error.response
        if (status === 403) {
            console.log('未授权')
        } else {
            console.log(error.message)
        }
        console.log('data', error.response.data);
        console.log('status', error.response.status);
        console.log('msg', error.message);
    } else {
        console.log(error)
        // 在设置引发错误的请求时发生了一些事情。
        console.log('响应拦截器', error.message);
    }
    // 不抛出就会走 resolve，返回值是 undefined
    // 抛出后不接收就会报错
    // return Promise.reject(error.response)
});

