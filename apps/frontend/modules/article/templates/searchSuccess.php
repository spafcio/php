<?php use_helper('Text'); ?>
<?php slot('menu_up') ?>
  <?php include_partial('article/menu', array('menu' => $menu['main'], 'active' => false)) ?>
<?php end_slot() ?>

<div id="search-results">
<?php include_partial('article/list', array('articles' => $articles)) ?>
</div>