<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/12/17
 * Time: 17:50.
 */

function ConsoleCommand(){
    return [
        \Polite\Console\Adapters\Version::class,
        \Polite\Console\Adapters\GetConfig::class,
        \Polite\Console\Adapters\Maker\MakeController::class,
        \Polite\Console\Adapters\Maker\MakeModel::class,
    ];
}
