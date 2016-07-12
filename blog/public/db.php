<?php
include 'config.php';
// $link = mysql_connect('主机' , '数据库用户名', '数据库的密码') or die('数据库连接失败!<br> 错误码:'.mysql_errno().'错误信息:'.mysql_error());

@mysql_connect('localhost', 'root', '') or die('数据库连接失败!<br> 错误码:' . mysql_errno() . '错误信息:' . mysql_error());
mysql_set_charset('utf8');        //设置字符集,参数是字符集

mysql_select_db('blog') or die('数据库选择失败!');    //选择数据库,成功返回true ,失败 false


function db($sql = '')
{

    $res = mysql_query($sql);    //执行SQL语句

    $rows = array();    //定义一个空数组

    if (strstr($sql, 'SELECT') || strstr($sql, 'select'))    //判断传入SQL是否为查询语句
    {
        if ($res && mysql_num_rows($res) > 0)        //如果结果集存在,并行数大于0
        {
            while ($row = mysql_fetch_assoc($res))    //执行循环,并使用mysql_fetch_assoc函数返回关联数组,进行遍历
            {
                $rows[] = $row;    //把逐行获取到的数据,放入新数组
            }
        }
    } else {
        return $res ? true : false;    //如果为更新,新增,删除的语句直接返回是否执行成功
    }
    return $rows;    //返回查询语句结果集的数组
}


//mysql_close();        //关闭数据库


//    $sql= 'INSERT INTO cate ( pid , cate_name) VALUES ( 0 , "HTML" ),(0,"CSS"),(0,"PHP"),(0,"JAVASCRIPT"),(0,"IOS"),(0,"JAVA"),(1,"html5")';
//$sql = 'insert into cate (pid,cate_name) values(8,"css3")';
//$sql = "insert into cate(pid,cate_name) values(6,"require"),(6,"str")";


//var_dump(db($sql));


?>