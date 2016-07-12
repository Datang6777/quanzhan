<?php


require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
$cate = tree(db('select * from cate'));
$tags = db('select tid,tag_name from tags where is_show =1');

?>
<div class="content">
    <div class="title">
        添加文章
    </div>
    <div class="mess">
        　<?php  echo isset($_GET['mess']) ? $_GET['mess'] : '请按照格式添加!' ?>
    </div>
    <form action="art.php" method="post">
        <input type="hidden" name="action" value="add">
        <p>
            <label>栏目</label>
            <?php echo formselect($cate); ?>
        </p>
        <div id="tags">
            <label></label>
            <div class="clear"></div>
        </div>
        <p>
            <label>添加标签</label><?php echo getTagsName($tags); ?>　<input type="button" name="but" value="选中">
        </p>

        <p>
            <label>名称</label>
            <input type="text" name="title" >
        </p>
        <p>
            <label>内容</label>
            <textarea name="content"></textarea>
        </p>
        <p>
            <label>作者</label>
            <input type="text" name="author">
        </p>
        <p>
            <label>点击量</label>
            <input type="text" name="clicks" value="0">
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
