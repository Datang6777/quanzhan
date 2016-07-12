<?php

require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $post = check($_POST);



    $sql = 'INSERT INTO player( player_name ,img_url,contact_url , ord, is_show) VALUES ( "' . $post['player_name'] . '" ,"' . $post['img_url'] . '" ,"' . $post['contact_url'] . '" , ' . $post['ord'] . ', ' . $post['is_show'] . ' )';

    $query = db($sql);
    if ($query) {
//			获取最近一条插入的ID;
//        $insert_id = mysql_insert_id();
//
//        if (isset($post['tids'])) {
//
//            foreach ($post['tids'] as $tid) {
//                db('INSERT INTO tags_article(tid , aid) VALUES(' . $tid . ' , ' . $insert_id . ')');
//            }
//        }

        $mess = '添加成功可以继续添加!';
    } else {
        $mess = '添加失败!请重新添加!';
    }
    redirect('playerAdd.php?mess=' . $mess);
} elseif (isset($_POST['action']) && $_POST['action'] == 'mod') {
    $post = check($_POST);

    $sql = "UPDATE player SET  player_name = '" . $post['player_name'] . "' , img_url = '" . $post['img_url'] . "', contact_url = '" . $post['contact_url'] . "', ord = " . $post['ord'] . ",  is_show = " . $post['is_show'] . "WHERE pid = " . $post['pid'];

    $query = DB($sql);
    if ($query) {
//        $del = db('DELETE FROM tags_article WHERE aid = ' . $post['aid']);
//        if ($del) {
//            if (isset($post['tids'])) {
//                foreach ($post['tids'] as $tid) {
//                    db('INSERT INTO tags_article(tid , aid) VALUES(' . $tid . ' , ' . $post['aid'] . ')');
//                }
//            }
//        }
        redirect('playerList.php?mess=修改成功!');
    } else {
        redirect('playerMod.php?pid=' . $post['pid'] . '&mess=修改失败!请重新修改!');
    }

}
?>