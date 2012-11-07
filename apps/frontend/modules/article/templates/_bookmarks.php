<ul>
	<?php foreach($bookmarks as $bookmark): ?>
	<li<?php echo ($active == $bookmark['title']) ? ' class="active"' : null ?>><a href="<?php echo $bookmark['href'] ?>"><?php echo $bookmark['title'] ?></a></li>
	<?php endforeach; ?>
</ul>