<?php
//require_once('/public/header.php');
require('public/header.php')
//include 'public/header.php';

?>
<div class="lunbo" xmlns="http://www.w3.org/1999/html">
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/0.jpg" alt="First slide">

            </div>
            <div class="item">
                <img src="images/1.jpg" alt="Second slide">

            </div>
            <div class="item">
                <img src="images/2.jpg" alt="Third slide">

            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next">&rsaquo;</a>
    </div>
</div>
<!--导航信息栏-->
<div class="banner shadow two-nav">
    <span class="floor">F1</span>-犹抱琵琶半遮面
</div>
<!--左侧标签云-->
<div class="content clear">
    <div class="left shadow">
        <p class="title">
            <span>标签云</span>
        </p>

        <div class="cont-box">
            <?php include 'public/tags.php'; ?>
        </div>
    </div>

    <!--content left end-->
    <!--content center-->
    <div class="center shadow">
        <p class="title">
            <span>实时资讯</span>
        </p>

        <div class="cont-box">
            <ul>
                <?php $new = DB('SELECT aid,title,update_time FROM article WHERE is_show = 1 ORDER BY update_time DESC,ord DESC,clicks DESC'); ?>
                <?php foreach ($new as $n): ?>
                    <li>
                        <a href="show.php?aid=<?php echo $n['aid'] ?>"><?php echo getSubTitle($n['title']); ?></a><span><?php echo date('Y-m-d', $n['update_time']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="right shadow">
        <p class="title">
            <span>常见的问题解析</span>
        </p>


        <div class="cont-box">
            <?php $get = db('select aid ,title,top,best from article where is_show = 1 && cid = 11'); ?>
            <ul>
                <?php foreach ($get as $b): ?>
                    <li>
                        <?php if ($b['top'] == 1): ?>
                            <span class="top">top</span>
                        <?php endif; ?>
                        <?php if ($b['best'] == 1): ?>
                            <span class="hot">hot</span>
                        <?php endif; ?>
                        <a href="show.php?aid=<?php echo $b['aid'] ?>"><?php echo getSubTitle($b['title'], 15); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p class="more"><a href="http://www.ucai.cn/">MORE>>></a></p>
        </div>

    </div>
</div>
<div class="banner shadow two-nav">
    <span class="floor">F2</span> - 沉舟侧畔千帆过
</div>
<div class="content clear">
    <!-- content left -->
    <div class="left shadow">
        <p class="title">
            <span>标签云/Tags</span>
        </p>

        <div class="cont-box">
            <?php include 'public/tags.php'; ?>
        </div>


    </div>
    <!-- content left end -->
    <!-- content center -->
    <div class="center shadow">
        <p class="title">
            <span>最新更新/News</span>
        </p>

        <div class="cont-box">
            <ul>
                <ul>
                    <?php $new = DB('SELECT aid,title,update_time FROM article WHERE is_show = 1 ORDER BY update_time DESC,ord DESC,clicks DESC'); ?>
                    <?php foreach ($new as $n): ?>
                        <li>
                            <a href="show.php?aid=<?php echo $n['aid'] ?>"><?php echo getSubTitle($n['title']); ?></a><span><?php echo date('Y-m-d', $n['update_time']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </ul>

            <p class="more"><a href="list.html">More>>></a></p>
        </div>
    </div>
    <!-- content center end -->
    <!-- content right -->
    <div class="right shadow">
        <p class="title">
            <span>神技能/Get</span>
        </p>

        <div class="cont-box">
            <ul>
                <li>
                    <span class="top">top</span
                    <a href="#">DIV + CSS布局的技巧分享</a>
                </li>
                <li>
                    <span class="hot">hot</span>
                    <a href="#">DIV + CSS布局的技巧分享</a>
                </li>
                <li>
                    <span class="new">new</span>
                    <a href="#">DIV + CSS布局的技巧分享</a>
                </li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
                <li><a href="#">DIV + CSS布局的技巧分享</a></li>
            </ul>

            <p class="more"><a href="list.html">More>>></a></p>
        </div>
    </div>
    <!-- content right end -->
</div>
<div class="banner shadow two-nav">
    <span class="floor">F3</span> -小游戏
</div>
<div class="content clear">
    <div class="photo">
        <div class="photo-list shadow">
            <img src="/blog/images/2.jpg">
        </div>
        <div class="photo-list shadow">
            <img src="/blog/images/1.jpg">
        </div>
        <div class="photo-list shadow">
            <img src="/blog/images/0.jpg">
        </div>
    </div>
</div>


<?php

require('fixedright/index.php');
require('clander.php');


require('public/footer.php');
?>
