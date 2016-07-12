<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/8
 * Time: 9:34
 */
require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');


$sql = 'SELECT tid,tag_name,clicks,is_show FROM tags ORDER BY tid DESC';
//echo $sql;
$fields = array(
    'tid' => 'TID',
    'tag_name' => '标签名称',
    'clicks' => '点击量',
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
        'url' => 'tagsMod.php',
        'field' => 'tid',
    ),
    array(
        'mc' => '删除',
        'url' => 'tagsDel.php',
        'field' => 'tid',
    ),
    array(
        'mc' => '查找',
        'url' => 'tagsFind.php',
        'field' => 'tid',
    ),
);
?>
    <div class="content">
        <div class="title">
            标签列表
        </div>
        <div class="mess">
            <?php echo isset($_GET['mess']) ? $_GET['mess'] : '温馨提示：请谨慎修改您的栏目!' ?>
        </div>

        <div class="table-list">
            <?php echo getPageList($sql, $fields, $mod); ?>
        </div>

    </div>

<?php include '../public/footer.php'; ?>