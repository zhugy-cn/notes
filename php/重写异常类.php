<?php

默认位置：thinkphp\library\think\exception\Handle . php 的 render 方法

    1. 重写 Handle类的render方法

    2. 配置文件修改
        // 异常处理handle类 留空使用 \think\exception\Handle
        'exception_handle'       => '\app\common\lib\ApiHandleException',

    3. 未知异常处理
        namespace app\common\lib;

    请求错误
    {
        'code' => 0,
        'error' => '服务器内部错误',
        'request_url' => request()->url(true)
    }

    请求正确,有数据返回时
    {
        'code' => 1,
        'data' => [ ]
    }
    请求正确,没数据返回时
    {
        'code' => 1,
        'msg' => 'success',
    }

    未授权
    {
        'code' => 3,
        'error' => '未授权',
        'httpCode' => 403
    }

        use Exception;
        use think\exception\Handle;

        class ApiHandleException extends Handle {
            public $httpCode = 500;
            public $code = 1;

            public function render(Exception $e) {
                // 如果开启调试模式，就使用系统默认的异常处理
                //        if (config('app_debug')) {
                //            return parent::render($e);
                //        }
                // 如果是自定义的异常，就覆盖
                if ($e instanceof ApiException) {
                    $this->httpCode = $e->httpCode;
                    $this->code = $e->code;
                }
                $result = [
                    'code' => $this->code,
                    'error' => $e->getMessage(),
                    'request_url' => request()->url(true)
                ];
                return json($result, $this->httpCode);
            }
        }


        4. 自定义异常处理，可以设置状态码跟code码
        namespace app\common\lib;

        use think\Exception;

        class ApiException extends Exception {
            public $message;
            public $httpCode;
            public $code;

            public function __construct($message = "", $httpCode = 500, $code = 0) {
                $this->message = $message;
                $this->httpCode = $httpCode;
                $this->code = $code;
            }
        }

        使用
            throw new ApiException('未授权', 403, 3);