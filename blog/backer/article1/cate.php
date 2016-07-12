<?php
require ($_SERVER['DOCUMENT_ROOT'].'blog/public/functions.php');
if(isset($_POST['action']) && $_POST['action'] == 'add'){
    $post = check($_POST);
    $sql = 'INSERT INTO cate(pid , cate_name , is_show , ord) VALUES ('.$post['pid'].' , "'.$post['cate_name'].'" , '.$post['is_show'].' , '.$post['ord'].')';

    $query = db($sql);

    if($query)
    {
        $mess='添加成功可以继续添加!';
    }else{
        $mess='添加失败!请重新添加!';
    }
    redirect('cateAdd.php?mess='.$mess);
}
elseif(isset($_POST['action']) && $_POST['action'] == 'mod')
{
    $post = check($_POST);

    $sql = 'UPDATE cate SET pid = '.$post['pid'].' , cate_name = "'.$post['cate_name'].'" , ord = '.$post['ord'] . ', is_show = '.$post['is_show'] . ' WHERE cid = '.$post['cid'];

    $query = db($sql);

    if($query)
    {
        redirect('cateList.php?mess=修改成功!');
    }else{
        redirect('cateMod.php?cid='.$post['cid'].'mess=修改失败!请重新修改!');
    }

}
?>