<?php


缓存的 key： token令牌
缓存的 value： uid + username + scope

// 设置缓存数据
cache('name', $value, 3600);
// 获取缓存数据
var_dump(cache('name'));
// 删除缓存数据
cache('name', NULL);


