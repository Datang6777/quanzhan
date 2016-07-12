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
if (!isset($_GET['pid']) && $_GET['pid'] != '') {
    redirect('playerList.php');
}


$data = db('SELECT * FROM player WHERE pid = ' . $_GET['pid']);
var_dump($data);
?>
    <div class="content">
        <div class="title">
            修改焦点图
        </div>
        <div class="mess">
            　<?php echo isset($_GET['mess']) ? $_GET['mess'] : '请按照正常格式修改' ?>
        </div>
        <form action="player.php" method="post">
            <input type="hidden" name="action" value="mod">
            <input type="hidden" name="pid" value="<?php echo $data[0]['pid'] ?>">

            <p>
                <label>焦点图名称</label>
                <input type="text" name="player_name" value="<?php echo $data[0]['player_name'] ?>">
            </p>

            <p>
                <label>焦点图URL</label>
                <input type="text" name="img_url" value="<?php echo $data[0]['img_url'] ?>">
            </p>

            <p>
                <label>焦点图关联URL</label>
                <input type="text" name="contact_url" value="<?php echo $data[0]['contact_url'] ?>">
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