<?php

require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $post = check($_POST);

    $update_time = $pass_time = time();

    $sql = "INSERT INTO article(cid , title , content , author  ,clicks , is_show , ord , update_time , pass_time,top,best) VALUES (" . $post['pid'] . " ,'" . $post['title'] . "' ,'" . $post['content'] . "' ,'" . $post['author'] . "' ," . $post['clicks'] . "  , " . $post['is_show'] . " , " . $post['ord'] . " , " . $update_time . " ," . $pass_time . "," . $post['top'] . "  , " . $post['best'] . " )";

    $query = db($sql);
    if ($query) {
//			获取最近一条插入的ID;
        $insert_id = mysql_insert_id();

        if (isset($post['tids'])) {

            foreach ($post['tids'] as $tid) {
                db('INSERT INTO tags_article(tid , aid) VALUES(' . $tid . ' , ' . $insert_id . ')');
            }
        }

        $mess = '添加成功可以继续添加!';
    } else {
        $mess = '添加失败!请重新添加!';
    }
    redirect('articleAdd.php?mess=' . $mess);
} elseif (isset($_POST['action']) && $_POST['action'] == 'mod') {
    $post = check($_POST);

    $sql = "UPDATE article SET cid = " . $post['pid'] . " , title = '" . $post['title'] . "' , content = '" . $post['content'] . "', author = '" . $post['author'] . "', clicks = " . $post['clicks'] . ", is_show = " . $post['is_show'] . ", ord = " . $post['ord'] . ", update_time = " . time() . " , top = " . $post['top'] . ", best = " . $post['best'] . "WHERE aid = " . $post['aid'];

    $query = DB($sql);
    if ($query) {
        $del = db('DELETE FROM tags_article WHERE aid = ' . $post['aid']);
        if ($del) {
            if (isset($post['tids'])) {
                foreach ($post['tids'] as $tid) {
                    db('INSERT INTO tags_article(tid , aid) VALUES(' . $tid . ' , ' . $post['aid'] . ')');
                }
            }
        }
        redirect('articleList.php?mess=修改成功!');
    } else {
        redirect('articleMod.php?aid=' . $post['aid'] . '&mess=修改失败!请重新修改!');
    }

}
?>