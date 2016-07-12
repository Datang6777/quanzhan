<?php
require('public/header.php');
if (!isset($_GET['aid']) && intval($_GET['aid']) == 0) {
    redirect('index.php');
}
$data = DB('SELECT aid,a.cid,cate_name,title,description,content,author,update_time,a.clicks FROM article a,
		cate c WHERE a.is_show = 1 && aid = ' . $_GET['aid']);
?>
<!-- banner -->
<div class="banner shadow two-nav">
    首页 > <a href="list.html">生活小技巧</a> > PHP是最火的语言吗?
</div>
<!-- banner end -->
<!-- content -->
<div class="content clear">
    <!-- content left -->
    <div class="list-right clear">
        <div class="right shadow f-right no-bor">
            <p class="title">
                <span>人生点滴</span>
            </p>
            <div class="cont-box">
                <?php $get = DB('SELECT aid,title,top,best FROM article WHERE is_show = 1 && cid = '.$data[0]['cid'].' && aid != '.$data[0]['aid'].' ORDER BY top DESC,clicks DESC,update_time DESC LIMIT '.LIST_NUMS); ?>
                <ul>

                    <?php foreach($get as $g): ?>
                        <li>
                            <?php if($g['top'] == 1): ?>
                                <span class ="top">top</span>
                            <?php endif; ?>
                            <?php if($g['best'] == 1): ?>
                                <span class ="hot">hot</span>
                            <?php endif; ?>
                            <a href="show.php?aid=<?php echo $g['aid'] ?>"><?php echo getSubTitle($g['title'] , 15); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="left shadow f-right">
            <p class="title">
                <span>标签云/Tags</span>
            </p>
            <div class="cont-box">
                <?php include 'public/tags.php'; ?>
            </div>
        </div>

    </div>


    <!-- content left end -->
    <!-- content center -->

    <div class="center shadow list-center">

        <div class="cont-box">
            <?php if(!empty($data)): ?>

                <p class="show-title">
                    <a href="javascript:;"><?php echo $data[0]['title'] ?></a>
                </p>
                <p class="show-state">
                    更新时间 : <?php echo date('Y-m-d H:i:s' , $data[0]['update_time']) ?> 作者 : <?php echo $data[0]['author'] ?> 分类 : <?php echo $data[0]['cate_name'] ?> 浏览 : <?php echo $data[0]['clicks'] ?>
                </p>
                <br>
                <p class="show-content">
                    <?php echo $data[0]['description'] ?>
                </p>
                <br>
                <p class="show-content">
                    <?php echo $data[0]['content'] ?>
                </p>

                <div class="show-page">
                    <p>上一篇 :<?php echo prevArticle($data[0]['aid'] , $data[0]['cid']) ?></p>
                    <p>下一篇 : <?php echo nextArticle($data[0]['aid'] , $data[0]['cid']) ?></p>
                </div>

            <?php endif; ?>
        </div>
    </div>
    <!-- content center end -->

</div>
<!-- content end -->
<?php include 'public/footer.php'; ?>

