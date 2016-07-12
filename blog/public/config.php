<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/7
 * Time: 10:45
 */
header("Content-type:text/html;charset=utf-8");
date_default_timezone_get('Asia/Shanghai');
const HOST = 'localhost';
const MYSQL_USER = 'root';
const MYSQL_PASSWORD = '';
const DATABASE = 'blog';
const PAGE_NUM =5;
const PAGE_OFFSET = 2;
const LIST_NUMS = 15;