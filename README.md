# redis
redis 操作类

[redis 操作指南](https://www.w3cschool.cn/redis/)


```
<?php

require_once "../vendor/autoload.php";

use Rredis\Rredis;


$config = array(
    'host' => 'redis'
);
$redis = Rredis::getInstance($config);


// 命令详情，请点击下方链接
// https://www.w3cschool.cn/redis/


$key = 'test';

// $ret = $redis->get($key);
// $ret = $redis->setex($key, 60, $key);
$ret = $redis->multi($key);

var_dump($ret);

?>
```