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
        $file = $ini_path . $pathname . '.ini';
        while (!file_exists($file)) :
            return false;
        endwhile;

        $config = parse_ini_file($file);
        if (strstr($configname,'.')){
            return $configname?(isset($config[$configname])?$config[$configname]:false):$config;
        }else if($configname===null) {
            return $this->getTree($config);
        }else{
            return isset($this->getTree($config)[$configname])?$this->getTree($config)[$configname]:false;
        }
    }

    /**
     * 合并数组
     * @param $tree
     * @return array
     */
    public function getTree($tree)
    {
        $anyconfig = [];

        foreach ($tree as $k=>$v){
            $anyconfig = array_merge_recursive($this->stringToArray($k,$v),$anyconfig);
        }
        return $anyconfig;
    }

    /**
     * 键值排序
     * @param $str
     * @param $value
     * @return array
     */
    public function stringToArray($str,$value)
    {
        $separator = '.';
        $pos = strpos($str, $separator);

        if ($pos === false) {
            return [$str=>$value];
        }

        $key = substr($str, 0, $pos);
        $str = substr($str, $pos + 1);

        $result = [
            $key => $this->stringToArray($str,$value),
        ];

        return $result;
    }
}