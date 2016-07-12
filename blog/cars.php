<?php
/**
 * Created by PhpStorm.
 * User: ll
 * Date: 2016/6/16
 * Time: 20:20
 */
require ('db.php');
$db = db::getInstance();
$brand = mysql_escape_string($_GET['brand']);
$price = intval($_GET['price']);
$sql= "select * from t_car";
print_r($data);?>
<script type="text/javascript">
    setTimeout(function(){
        window.location.href="cars.php";},3000);
    }))
</script>