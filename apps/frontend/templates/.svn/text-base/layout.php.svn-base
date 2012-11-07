<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon2.ico" />
</head>
<body>
<div id="logo">
	<h1><?php echo link_to('Rise', '@homepage') ?></h1>
	<h2>created by kopix, hosted by <strong><?php echo link_to('risecms project', 'http://code.google.com/p/risecms/') ?></strong></h2>
</div>
<div id="menu">
	<ul>
		<li class="active"><?php echo link_to('Strona główna', '@homepage')?></li>
		<?php if(has_slot('menu_up')): ?>
		  <?php include_slot('menu_up') ?>
		<?php endif; ?>
	</ul>
	<hr />
</div>
<div id="bg">
  <div id="page">
		<?php echo $sf_content; ?>
  		<div id="sidebar">			
  		  <?php if(has_slot('menu')): ?>
		  	<?php include_slot('menu') ?>
		  <?php endif; ?>	
		</div>
		<!-- end #sidebar -->
		<div style="clear: both; height: 20px;">&nbsp;</div>
  </div>
</div>
<!-- end #bg -->
<div id="footer">
	<hr />
	<p>	Copyright (c) 2009. All rights reserved. Hosted by <?php echo link_to('RiseCms', 'http://code.google.com/p/risecms/') ?>. Designed by <?php echo link_to('NodeThirtyThree', 'http://www.nodethirtythree.com/') ?></p>
</div>
</body>
</html>