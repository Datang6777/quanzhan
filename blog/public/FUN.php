<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/13
 * Time: 14:13
 */
function getPagelist($sql = '', $fields = array(), $mod = array())
{
    $count = count(db(sql));
    $totalNum = ceil($count / PAGE_NUM);
    $path = $request_url['path'];

    $page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'];
//   组装limit语句
    $limit = 'LIMIT' . ($page - 1) * PAGE_NUM . ',' . PAGE_NUM;
    $datas = db($sql, $limit);
    $html = getTable($datas, $fields, $mod);
    $start = ($page - PAGE_OFFSET) > 0 ? $page - PAGE_OFFSET : 1;//获取左侧位置的偏移
    $end = ($page + PAGE_OFFSET) < $totalNum ? $page + PAGE_OFFSET : $totalNum;
    $html .= '<div class="page">';
    if ($page > 1) {
        $html .= '<a href="' . $path . '?page=' . ($page - 1) . '">上一页</a>';
        $html .= '<a href="' . $path . '?page=1">首页</a>';
    }
    for($i = $start;$i<=$end;$i++)
    {
        $class = ($i==$page)?'class="on"':'';
        $html .='<a href ="'.$path.'?page='.$i.'"'.$class.'>'.$i.'</a>';


    }
    if ($page < $totalNum) {
       ;
        $html .= '<a href="' . $path . '?page='.$totalNum.'">尾页</a>';
        $html .= '<a href="' . $path . '?page='.($page+1).'">下一页</a>';
    }
    $html .='共'.$totalNum.'页';
    $html .='</div>';
    return $html;
}