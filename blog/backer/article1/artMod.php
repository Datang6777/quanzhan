<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/8
 * Time: 10:31
 */
require($_SERVER['DOCUMENT_ROOT'] . 'blog/backer/public/header.php');
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
if(!isset($_GET['aid']) && $_GET['aid'] != '')
    redirect('artlist.php');
$cate = arttree(db('SELECT * FROM art'));
$data = db('SELECT * FROM article WHERE aid = ' . $_GET['aid']);
$tags= db('select tid,tag_name from tags where is_show=1');
$tids = db('select * from tags_article where aid  ='.$_GET['aid']);
$tid = implode(',',array_column($tids,'tid'));
$haveTid = db('select tid,tag_name from tags where tid in('.$tid.')');

?>
    <div class="content">
        <div class="title">
            修改文章
        </div>
        <div class="mess">
            　<?php echo isset($_GET['mess']) ? $_GET['mess'] : '请按照正常格式修改' ?>
        </div>
        <form action="art.php" method="post">
            <input type="hidden" name="action" value="mod">
            <input type="hidden" name="aid" value="<?php echo $data[0]['aid'] ?>">

            <p>
                <label>栏目</label>
                <?php echo formselect($cate, $data[0]['cid']); ?>
            </p>
            <div id ="tags">
                <label></label>
                <?php foreach($haveTid as $t):?>
    <div class = "tag_list">
        <?php echo $t['tag_name']?>
        <input type = "hidden" name = "tids[]" value="<?php echo $t['tid']?>"> <span>点我我会闪</span>
        <?php endforeach;?>
    </div>
            </div>
            <p>
                <label>添加标签</label><?php echo getTagsName($tags); ?>　<input type="button" name="but" value="选中">
            </p>
            <p>
                <label>名称</label>
                <input type="text" name="title" value="<?php echo $data[0]['title'] ?>">
            </p>
            <p>
                <label>内容</label>
                <textarea name="content"><?php echo $data[0]['content'] ?></textarea>
            </p>
            <p>
                <label>作者</label>
                <input type="text" name="author" value="<?php echo $data[0]['author'] ?>">
            </p>
            <p>
                <label>点击量</label>
                <input type="text" name="clicks" value="<?php echo $data[0]['clicks'] ?>">
            </p>
            <p>
                <label>排序</label>
                <input type="text" name="ord" value="<?php echo $data[0]['ord'] ?>">
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