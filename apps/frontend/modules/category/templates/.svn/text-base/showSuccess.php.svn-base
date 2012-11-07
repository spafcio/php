<?php use_helper('Text'); ?>
<?php slot('menu') ?>
<div id="useful-links" class="box">
  <h2 class="title">Menu:</h2>
    <div class="content">
	  <ul>
		 <?php include_partial('article/menu', array('menu' => isset($menu['main']) ? $menu['main'] : array())) ?>
	  </ul>
	</div>
</div> 
<?php end_slot() ?>
<?php slot('menu_up') ?>
	 <?php include_partial('article/menu', array('menu' => isset($menu['up']) ? $menu['up'] : array())) ?>
<?php end_slot() ?>
		<div id="content">
			<div id="article" class="post">
				<h1 class="title"><?php echo ucfirst($category) ?></h1>
				<div class="entry">
				  <span><strong><?php echo link_to($mainArticle->getTitle(), 'article_show', $mainArticle) ?></strong></span><br/>
				  <?php include_partial('article/list', array('articles' => $articles))?>
				</div>
			</div>
		</div>