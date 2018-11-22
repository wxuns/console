<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/11/22
 * Time: 16:09
 */

namespace Polite\Console\Event;

class Config
{
    public static $application = '';
    public function __construct()
    {
        $this::$application = realpath(dirname(__FILE__) . '/../../../../../');
    }

    /**
     * 获取配置项信息
     * @param $pathname
     * @param null $configname
     * @return array|bool
     */
    public function getConfig($pathname,$configname = null)
    {
        $ini_path = self::$application . '/conf/';
        $config = parse_ini_file($ini_path . $pathname . '.ini');
        if ($config){
            return $configname?isset($config[$configname])?$config[$configname]:false:$config;
        }else{
            return false;
        }
    }
}