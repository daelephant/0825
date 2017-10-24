<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17.10.17
 * Time: 7:56
 */
$mem = new Memcache();
$flag = $mem -> connect('127.0.0.1',11211);
$f1 = $mem -> set('weather','cloud',0);
var_dump($f1);//true