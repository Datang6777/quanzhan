<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/8
 * Time: 9:34
 */
require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');


$data = db('select * from cate');


$tree = tree($data);

?>

<div class="content">
    <div class="content">
        栏目列表
    </div>
    <div class="mess">
        　<?php echo isset($_GET['mess']) ? $_GET['mess'] : '请谨慎修改' ?>
    </div>

    <?php
    echo getTree($tree); ?>
</div>
