<?php
require('public/header.php');
?>
    <!--
    1.cid显示当前栏目ID下所有的文章。
    2.tid显示当前标签id下所有的文章
    3.不传的条件下应该按照文章排序，点击量，更新时间倒序排序，like模糊查询。
    4.添加分页
    二：
    1.cid 找出当前栏目ID下点击量倒叙排列的列表,只显示 10 条  limit 10
        tid 找出当前标签ID下点击量倒叙排列的列表,只显示 10 条

        不传的情况下,应该按照文章置,排序,点击量,更新时间倒叙排列
        搜索结构,输入关键词,用 Like 模糊查询去查询文章标题
    -->
    <body>
<?php

$sqlStr = '';
$urlQuery = array();
if(isset($_GET['cid']) && intval($_GET['cid']) != 0)
{
    $sqlStr .= '&& a.cid = '.$_GET['cid'];
    $urlQuery['cid'] = $_GET['cid'];
}

if(isset($_GET['tid']) && intval($_GET['tid']) != 0)
{
    $aids = DB('SELECT aid FROM tags_article WHERE tid = '.$_GET['tid']);
    $aid = array_column($aids , 'aid');
    $urlQuery['tid'] = $_GET['tid'];
    $sqlStr .= ' && aid IN('.implode(',', $aid).')';
}

if(isset($_GET['search']))
{
    $sqlStr .= ' && title like "%'.$_GET['search'].'%"';
    $urlQuery['search'] = $_GET['search'];
}

$sql = 'SELECT aid,title,cate_name,update_time,author,a.clicks,description FROM article a,cate c WHERE a.is_show = 1 && a.cid = c.cid '.$sqlStr.'
		 ORDER BY top DESC,a.ord DESC,a.clicks DESC,update_time DESC';
?>


    <div class="banner shadow two-nav">
        首页>这里有你想不到的惊喜
    </div>
    <div class="content clear">
        <div class="list-right clear">
            <div class="right shadow f-right no-bor">
                <p class="title">
                    <span>最新技术分享</span>
                </p>

                <div class="cont-box">
                    <?php $get = DB('SELECT aid,title,top,best FROM article WHERE is_show = 1 order by top desc,clicks desc,update_time desc limit' . LIST_NUMS); ?>
                    <ul>
                        <?php foreach ($get as $g): ?>
                            <li>
                                <?php if ($g['top'] == 1): ?>
                                    <span class="top">top</span>
                                <?php endif; ?>
                                <?php if ($g['best'] == 1): ?>
                                    <span class="hot">hot</span>
                                <?php endif; ?>
                                <a href="show.php?aid=<?php echo $g['aid'] ?>"><?php echo getSubTitle($g['title'], 15); ?></a>
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
        <div class="center shadow list-center">
            <div class="cont-box">
                <ul>
                    <?php echo getPageList($sql, array(), array(), 'getList', $urlQuery); ?>
                </ul>
            </div>
        </div>
        <!-- content center end -->

    </div>
    <!-- content end -->
<?php include 'public/footer.php'; ?>