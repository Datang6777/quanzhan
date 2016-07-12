<?php


require ($_SERVER['DOCUMENT_ROOT'].'blog/backer/public/header.php');
require ($_SERVER['DOCUMENT_ROOT'].'blog/public/functions.php');

//$tags = tagstree(db('select*from tags'));
?>
<div class="content">
    <div class="title">
        添加标签
    </div>
    <div class="mess">
        　<?php  echo isset($_GET['mess']) ? $_GET['mess'] : '请按照格式添加!' ?>
    </div>

    <form action="tags.php" method="post">
        <input type="hidden" name="action" value="add">
        <p>
            <label>标签名称</label>
            <input type="text" name="tag_name" >
        </p>
        <p>
            <label>点击量</label>
            <input type="text" name="clicks"   value="0">
        </p>
        <p>
            <label>排序</label>
            <input type="text" name="ord" value="0">
        </p>

        <p>
            <label>是否显示</label>

            <input type="radio" name="is_show" value="1" checked="checked">显示
            <input type="radio" name="is_show" value="0">屏蔽
        </p>
        <p>
            <input type="submit" name="sub" value="提 交">
        </p>
    </form>

</div>


<?php include '../public/footer.php'; ?>
