<?php



页面滚动加载

    数据
        list:[],            // 数据
        queryList: {        // 查询条件
            page: 1,        // 页码
            pageSize: 20,   // 每一页的数量
            type: 0,        // 类型
        },
        downLoading: false, // 下拉是否加载中
        upLoading: false,   // 上拉是否加载中
        isMore: true,       // 是否还有下一页数据
        isData: true,       // 是否有数据，trur表示有数据

    
    函数
        // 初次加载
        mounted() {
            this.getList('init')
        },
        // 点击切换类型加载
        handleTabsChange(type, index) {
            // 切换类型时重新定义查询条件
            this.queryList = {
                ...this.queryList,
                type,
                page: 1
            }
            this.typeIndex = index
            this.getList('init')
        },
        // 监听下拉刷新事件
        onRefresh() {
            this.getList('refresh')
        },
        // 监听上拉触底事件
        onReachBottom() {
            // 只有当前不在上拉加载数据状态并且还有下一页数据的情况下才允许加载下一页
            // this.upLoading = false 
            // this,isMore = true
            if(!this.upLoading && this.isMore) {
                this.queryList = {
                    ...this.queryList,
                    ++page
                }
                this.getList('bottom')
            }
            
        },
        // 获取数据
        getList(type) {
            // 上拉加载
            if(type == 'bottom') {
                // 上拉加载中,必须加载完才能加载下一页
                this.upLoading = true
            }
            // 下拉刷新
            if(type == 'refresh') {
                // 下拉刷新需要显示loading
                this.SET_GLOBAL_LOADING(true)
                // 把页数改成第一页
                this.queryList.page = 1;
            }
            // 请求数据
            getCoinRecord_api(this.queryList)
                .then(res => {
                    let data = res.rows
                    // 数据为空
                    if (!data.length) {
                        this.isData = false;
                    } else {
                        this.isData = true;
                    }
                    // 当返回的数量小于pageSize时，说明没有下一页了
                    if (data.length < this.queryList.pageSize) {
                        this.isMore = false
                    }else {
                        this.isMore = true
                    }
                    switch (type) {
                        // 初次加载
                        case 'init':
                            this.selectedData = data;
                            this.onLoaded();
                            break;

                        // 上拉加载
                        case 'bottom':
                            this.selectedData = this.selectedData.concat(data);
                            // 上拉加载完毕
                            this.upLoading = false
                            break;
                            
                        // 下拉刷新
                        case 'refresh':
                            this.selectedData = data;
                            // 刷新完毕，关闭下拉状态
                            this.downLoading = false;
                            this.SET_GLOBAL_LOADING(false)
                            break;
                    }
                })
                .catch(() => { });
        },