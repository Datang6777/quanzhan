<?php

require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
$cate = tree(db('SELECT * FROM cate'));
$tags = db('SELECT tid , tag_name FROM tags WHERE is_show = 1');
?>
    <script type="text/javascript" src="../js/ue/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../js/ue/ueditor.all.min.js"></script>
    <!-- 实例化编辑器 -->
    <div class="content">
        <div class="title">
            添加文章
        </div>
        <div class="mess">
            　<?php  echo isset($_GET['mess']) ? $_GET['mess'] : '请按照格式添加!' ?>
        </div>

        <form action="article.php" method="post">
            <input type="hidden" name="action" value="add">
            <p>
                <label>栏目</label>
                <?php echo formselect($cate); ?>
            </p>
            <div id="tags">


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
                <!--			<textarea name="content"></textarea>-->
            <div style="float:left ;width:70%">
                <script id="container" name="content" type="text/plain"></script>
            </div>
            <div style="clear:both"></div>
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
                <input type="radio" name="is_show" value="1" checked="checked">	是
                <input type="radio" name="is_show" value="0"> 否
            </p>
            <p>
                <label>是否置顶</label>
                <input type="radio" name="top" value="1" checked="checked">是
                <input type="radio" name="top" value="0"> 否
            </p>
            <p>
                <label>是否加精</label>
                <input type="radio" name="best" value="1" checked="checked">	是
                <input type="radio" name="best" value="0">否
            </p>
            <p>
                <input type="submit" name="sub" value="提 交">
            </p>
        </form>

    </div>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
<?php include '../public/footer.php'; ?>