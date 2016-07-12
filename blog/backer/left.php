<?php include 'public/header.php'; ?>

	<ul class="menu">
		<li class="p">标签管理</li>
		<ul class="menu-list">
			<li><a href="tags/tagslist.php?action=list" target="right">标签列表</a></li>
			<li><a href="tags/tagsAdd.php?action=add" target="right">添加标签</a></li>
		</ul>
		<li class="p">内容管理</li>
		<ul class="menu-list">
			<li><a href="article/articleList.php?action=list" target="right">内容列表</a></li>
			<li><a href="article/articleAdd.php?action=add" target="right">添加内容</a></li>
		</ul>
		<li class="p">栏目管理</li>
		<ul class="menu-list">
			<li><a href="cate/cateList.php" target="right">栏目列表</a></li>
			<li><a href="cate/cateAdd.php" target="right">添加栏目</a></li>
		</ul>
		<li class="p">焦点图管理</li>
		<ul class="menu-list">
			<li><a href="player/playerList.php" target="right">焦点图列表</a></li>
			<li><a href="player/playerAdd.php" target="right">添加焦点图</a></li>
		</ul>
		<li class="p">系统管理</li>
		<ul class="menu-list">
			<li><a href="tags.php?action=list" target="right">系统管理</a></li>
		</ul>
	</ul>

<?php include 'public/footer.php'; ?>