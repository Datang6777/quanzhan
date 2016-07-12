<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/8
 * Time: 9:34
 */
require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');


$sql = 'SELECT pid,player_name,img_url,contact_url,ord,is_show FROM player ORDER BY pid DESC';
//echo $sql;
$fields = array(
    'pid' => 'PID',
    'player_name' => '焦点图名称',
    'img_url' => '焦点图url',
    'contact_url' => '焦点图关联url',
    'is_show' => array(
        'mc' => '是否显示',
        'type' => '',
        'check' => array(
            '1' => '<font color="green">显示</font>',
            '0' => '<font color="red">屏蔽</font>',
        ),
    ),
);
$mod = array(
    array(
        'mc' => '修改',
        'url' => 'playerMod.php',
        'field' => 'pid',
    ),
    array(
        'mc' => '删除',
        'url' => 'tagsDel.php',
        'field' => 'pid',
    ),
    array(
        'mc' => '查找',
        'url' => 'tagsFind.php',
        'field' => 'pid',
    ),
);
?>
    <div class="content">
        <div class="title">
            焦点图列表
        </div>
        <div class="mess">
            <?php echo isset($_GET['mess']) ? $_GET['mess'] : '温馨提示：请谨慎修改您的栏目!' ?>
        </div>

        <div class="table-list">
            <?php echo getPageList($sql, $fields, $mod); ?>
        </div>

    </div>

<?php include '../public/footer.php'; ?>