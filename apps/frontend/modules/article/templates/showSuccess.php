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
				<h1 class="title"><?php echo $article->getTitle() ?></h1>
				<div class="entry">
				    <p class="for_image"><?php echo image_tag('/uploads/articles/'.$article->getImage(), 'alt=example') ?>
					<p><?php echo $article->getContent() ?></p>
					<p class="root"><?php echo $article->getRoot() ? 'Źródło:'.$article->getRoot() : null ?></p>
					<p class="author">Zredagował:&nbsp;<?php echo $article->getAuthor() ?></p>
					<p><?php echo link_to('Powrót', '@homepage') ?>
				</div>
				<div class="entry">
				    <?php include_partial('comment/view', array('userToken' => $userToken, 'article' => $article, 'form' => $form)) ?>
				</div>
			</div>
		</div>