<?php
class Cms_Err {
    const ERROR_SUCCESS = 200; // 成功
    const ERROR_NO_AUTH = 401; //无权
    const ERROR_POST = 402; //非法请求
    const ERROR_PARAM = 403;//参数错误
    const ERROR_NO_FOUND = 404;//找不到
    const ERROR_EXPIRE = 405;//过期
    const ERROR_SYS = 500;//系统错误
    const ERROR_FAILED = 499;//失败
    const ERROR_FREQ = 429;//频繁

    public static $error_desc = array (
        self::ERROR_SUCCESS => '成功',
        self::ERROR_NO_AUTH => '请求非法',
        self::ERROR_POST => '请求非法',
        self::ERROR_PARAM => '参数非法',
        self::ERROR_SYS => '系统错误',
        self::ERROR_NO_FOUND => '找不到',
        self::ERROR_EXPIRE => '过期',
        self::ERROR_FAILED => '失败',
        self::ERROR_FREQ => '操作频繁',
    );
}
