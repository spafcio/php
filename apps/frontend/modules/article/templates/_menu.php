<?php if(count($menu)): ?>
<?php foreach($menu as $i => $item): ?>
	<li><?php echo link_to($item->getTitle(), $item->getUrl()) ?></li>
<?php endforeach; ?>
<?php endif; ?>
