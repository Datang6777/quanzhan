<?php
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
/**/
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $post = check($_POST);
    $sql = 'INSERT INTO tags(clicks , tag_name , is_show , ord) VALUES (' . $post['clicks'] . ' , "' . $post['tag_name'] . '" , ' . $post['is_show'] . ' , ' . $post['ord'] . ')';
    $query = DB($sql);

    if ($query) {
        $mess = '添加成功可以继续添加!';
    } else {
        $mess = '添加失败!请重新添加!';
    }
    redirect('tagsAdd.php?mess=' . $mess);
} elseif (isset($_POST['action']) && $_POST['action'] == 'mod') {
    $post = check($_POST);

    $sql = 'UPDATE tags SET tag_name = "' . $post['tag_name'] . '" , ord = ' . $post['ord'] . ', is_show = ' . $post['is_show'] . ' WHERE tid = ' . $post['tid'];
    $query = DB($sql);
    if ($query) {
        redirect('tagslist.php?mess=修改成功!');
    } else {
        redirect('tagsMod.php?tid=' . $post['tid'] . 'mess=修改失败!请重新修改!');
    }

}
?>