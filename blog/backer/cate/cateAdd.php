<?php


 require ($_SERVER['DOCUMENT_ROOT'].'blog/backer/public/header.php');
 require ($_SERVER['DOCUMENT_ROOT'].'blog/public/functions.php');

$cate = tree(db('select*from cate'));
?>
<div class="content">
    <div class="title">
        添加栏目
    </div>
    <div class="mess">
        　<?php  echo isset($_GET['mess']) ? $_GET['mess'] : '请按照格式添加!' ?>
    </div>

    <form action="cate.php" method="post">
        <input type="hidden" name="action" value="add">
        <p>
            <label>父ID</label>
            <?php echo formselect($cate); ?>
        </p>
        <p>
            <label>栏目名称</label>
            <input type="text" name="cate_name" >
        </p>
        <p>
            <label>排序</label>
            <input type="text" name="ord" value="0">
        </p>

        <p>
            <label>是否显示</label>

            <input type="radio" name="is_show" value="1" checked="checked">	显示
            <input type="radio" name="is_show" value="0"> 屏蔽
        </p>
        <p>
            <input type="submit" name="sub" value="提 交">
        </p>
    </form>

</div>


<?php include '../public/footer.php'; ?>
