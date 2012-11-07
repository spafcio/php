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
         	<div>
				<?php include_partial('article/articles', array('articles' => $pager->getResults())) ?>         	
         	</div>
         	
<?php if ($pager->haveToPaginate()): ?>

  <div class="pagination">
    <a href="<?php echo url_for('homepage') ?>?page=1">
      <img src="/images/first.png" alt="First page" />
    </a>
 
    <a href="<?php echo url_for('homepage') ?>?page=<?php echo $pager->getPreviousPage() ?>">
      <img src="/images/previous.png" alt="Previous page" title="Previous page" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('homepage') ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('homepage') ?>?page=<?php echo $pager->getNextPage() ?>">
      <img src="/images/next.png" alt="Next page" title="Next page" />
    </a>
 
    <a href="<?php echo url_for('homepage') ?>?page=<?php echo $pager->getLastPage() ?>">
      <img src="/images/last.png" alt="Last page" title="Last page" />
    </a>
  </div>
<?php endif; ?>

</div>
<!-- end #content -->