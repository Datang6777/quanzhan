<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/8
 * Time: 10:31
 */
require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
$cate = tree(db('SELECT * FROM cate'));
if(!isset($_GET['cid']) && $_GET['cid'] != ''){
    redirect('catelist.php');
}


$data = db('SELECT * FROM cate WHERE cid = ' . $_GET['cid']);
?>
    <div class="content">
        <div class="title">
            修改栏目
        </div>
        <div class="mess">
            　<?php echo isset($_GET['mess']) ? $_GET['mess'] : '请按照正常格式修改' ?>
        </div>
        <form action="cate.php" method="post">
            <input type="hidden" name="action" value="mod">
            <input type="hidden" name="cid" value="<?php echo $data[0]['cid'] ?>">

            <p>
                <label>父类ID</label>
<!--                --><?php //print_r($data); ?>
                <?php echo formselect($cate, $data[0]['cid']); ?>
            </>

            <p>
                <label>栏目名称</label>
                <input type="text" name="cate_name" value="<?php echo $data[0]['cate_name'] ?>">
            </p>

            <p>
                <label>排序</label>
                <input type="text" name="ord" value="<?php echo $data[0]['ord'] ?>">
            </p>

            <p>
                <label>是否显示</label>
                <?php if ($data[0]['is_show'] == 1): ?>
                    <input type="radio" value="1" checked="checked" name="is_show">显示
                    <input type="radio" value="0" name="is_show">屏蔽
                <?php else: ?>
                    <input type="radio" value="1" name="is_show">显示
                    <input type="radio" value="0" checked="checked" name="is_show">屏蔽
                <?php endif; ?>
            </p>

            <p>
                <input type="submit" name="sub" value="确认修改">
            </p>
        </form>
    </div>
<?php include '../public/footer.php'; ?>