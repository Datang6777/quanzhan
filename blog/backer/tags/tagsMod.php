<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/8
 * Time: 10:31
 */
require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');

if(!isset($_GET['tid']) && $_GET['tid'] != '')
    redirect('tagslist.php');

//$data = db('SELECT * FROM tags WHERE tid = ' . $_GET['tid']);
$data = db('SELECT * FROM tags');
//var_dump($data);

?>

<div class="content">
    <div class="title">
        修改栏目
    </div>
    <div class="mess">
        　<?php  echo isset($_GET['mess']) ? $_GET['mess'] : '请按照格式修改!' ?>
    </div>
    <form action="tags.php" method="post">
        <input type="hidden" name="tid" value="<?php echo $data[0]['tid'] ?>">
        <input type="hidden" name="action" value="mod">
        <p>
            <label>标签名</label>
            <input type="text" name="tag_name" value="<?php echo $data[0]['tag_name']?>">
        </p>
        <p>
            <label>点击量</label>
            <input type="text" name="clicks" value="<?php echo $data[0]['clicks'] ?>">
        </p>
        <p>
            <label>排序</label>
            <input type="text" name="ord"  value="<?php echo $data[0]['ord'] ?>">
        </p>
        <p>
            <label>是否显示</label>
            <?php if($data[0]['is_show']== 1 ):?>
                <input type="radio" name="is_show" value="1" checked="checked">	显示
                <input type="radio" name="is_show" value="0"> 屏蔽
            <?php else: ?>
                <input type="radio" name="is_show" value="1">	显示
                <input type="radio" name="is_show" value="0"  checked="checked"> 屏蔽
            <?php endif; ?>
        </p>
        <p>
            <input type="submit" name="sub" value="提 交">
        </p>
    </form>

</div>


<?php include '../public/footer.php'; ?>
