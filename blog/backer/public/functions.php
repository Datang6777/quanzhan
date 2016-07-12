<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/7
 * Time: 10:58
 */
include 'db.php';

//把数据处理成树状结构
function tree($arr,$id='cid',$pid='pid'){
    $items =array();
    foreach($arr as $row)//处理下标
    {
        $items[$row[$id]]=$row;
    }
    foreach($items as $item){
        $items[$item[$pid]]['son'][$item[$id]]=&$items[$item[$id]];
        //arr[0][son ][1]=arr[1];
        //加引用赋值是为了同步修改 $items,否则son 就不会肤质到$items 里
    }
    return isset($items[0]['son'])?$items[0]['son']:array();
}
function formselect($arr , $pid = 0, $i = 0)
{
    static $html;
    foreach($arr as $val)
    {
        $selected = '';
        if($val['cid'] == $pid)
            $selected = 'selected';

        $html .= '<option value="'.$val['cid'].'" '.$selected.'>'.str_repeat('|-----' , $i).$val['cate_name'].'</option>';
        if(isset($val['son']))
        {
            formselect($val['son'],$pid, $i+1);
        }
    }
    return '<select name="pid"><option value="0">根分类</option>'.$html.'</select>';
}

function check($arr)
{
    foreach($arr as &$v)
    {
        $v = htmlspecialchars($v);
    }
    return $arr;
}
function redirect($url='')
{
    header('Location:'.$url);
    exit();
}
function getTree($arr,$i=0)
{
    static $html;
    foreach($arr as $val)
    {
        $html .='<li>'.str_repeat('|------',$i).
            $val['cate_name'].'<a href="cateMod.php?cid='.$val['cid'].'">修改</a></li>';
        if(isset($val['son']))
        {
            getTree($val['son'],$i+1);
        }
    }
    return '<ul>'.$html.'</ul>';
}