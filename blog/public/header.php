<?php
require($_SERVER['DOCUMENT_ROOT'] . 'blog/public/functions.php');
$nav = tree(db('select * from cate where is_show =1 order by ord desc ,cid asc'));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BLOG</title>
    <link rel="stylesheet" href="css/hello.css">
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery-2.2.3.js"></script>
    <script src="js/bootstrap.js"></script>

    <!--    <script src="../js/application.js"></script>-->
</head>
<body>
<!--//欢迎部分-->
<div class="hello">
    <div class="collect">
        欢迎来到我的博客!
    </div>
    <div class="return">
        <a href="index.php">返回首页</a>
    </div>
    <div class="return">
        <a href="#">网站地图</a>
    </div>
    <div class="return">
        <a href="#">博客工具箱</a>
    </div>
</div>
<div class="header">
    <div class='logo'>
        大唐IT技术园
    </div>
</div>
<!--<div class="container">-->
<!--    <div class="row">-->
<!--                <div class="span8">-->
<!--                    <ul class="nav nav-pills">-->
<!--                        <li class="active"><a href="index.php">Home</a></li>-->
<!---->
<!--
<!--                        <li class="dropdown">-->
<!--                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">HTML<b-->
<!--                                    class="caret bottom-up"></b></a>-->
<!--                            <ul class="dropdown-menu bottom-up pull-right">-->
<!--                                <li><a href="#">HTML5</a></li>-->
<!--                                <li><a href="#">WEB前端</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li><a href="#">CSS </a></li>-->
<!--                        <li><a href="#">PHP</a></li>-->
<!--                        <li><a href="#">JAVASCRIPT</a></li>-->
<!--                        <li><a href="#">JQUERY</a></li>-->
<!--                        <li><a href="#">BOOTSTRAPE</a></li>-->
<!--                        <li><a href="#">WORDPRESS</a></li>-->
<!--                        <li><a href="#">PDO</a></li>-->
<!--                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">前端 <span-->
<!--                                    class="caret"></span> </a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li><a href="#">javascript</a></li>-->
<!--                                <li><a href="#">jQuery</a></li>-->
<!--                                <li><a href="#">Bootstrape</a></li>-->
<!--                                <li class="divider"></li>-->
<!--                                <li><a href="#">wordpress</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="dropdown">-->
<!--                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">BackEnd<b-->
<!--                                    class="caret bottom-up"></b></a>-->
<!--                            <ul class="dropdown-menu bottom-up pull-right">-->
<!--                                <li><a href="#">PHP</a></li>-->
<!--                                <li><a href="#">MySQL</a></li>-->
<!--                                <li><a href="#">PostgreSQL</a></li>-->
<!--                                <li class="divider"></li>-->
<!--                                <li><a href="#">Live Demos</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="dropdown">-->
<!--                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">HELP<b-->
<!--                                    class="caret bottom-up"></b></a>-->
<!--                            <ul class="dropdown-menu bottom-up pull-right">-->
<!--                                <li><a href="#">PHP</a></li>-->
<!--                                <li><a href="#">MySQL</a></li>-->
<!--                                <li><a href="#">PostgreSQL</a></li>-->
<!--                                <li class="divider"></li>-->
<!--                                <li><a href="#">Live Demos</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<div class="container">
    <div class="row">
        <div class="span8">
            <ul class="nav nav-pills">
                <li class="active"><a href="index.php">Home</a></li>
                <?php foreach ($nav as $n): ?>
            <a href="list.php?cid=<?php echo $n['cid'] ?>"><?php echo $n['cate_name'] ?></a>
                <?php if (isset($n['son'])):?>

                <ul class="dropdown-menu bottom-up pull-right">
                    <?php foreach ($n['son'] as $son) : ?>
                    <li><a href="list.php?cid=<?php echo $son['cid'] ?>"><?php echo $son['cate_name'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif;?>
            </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>


