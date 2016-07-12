<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/15
 * Time: 19:08
 */
$tags = db('select tid,tag_name from tags where is_show=1 order by ord desc ,clicks desc');
$nums = db('select tid,count(*) as count from tags_article group by tid');
?>
<?php foreach($tags as $t):?>
<a href = "list.php?tid=<?php echo $t['tid']?>">
    <?php echo $t['tag_name'] ?>
    <?php foreach($nums as $n):?>
        <?php if($t['tid'] == $n['tid']):?>
        &nbsp;&nbsp;<small>&nbsp;<?php echo $n['count']?></small>
        <?php endif;?>
<?php endforeach;?>
</a>
<?php endforeach;?>