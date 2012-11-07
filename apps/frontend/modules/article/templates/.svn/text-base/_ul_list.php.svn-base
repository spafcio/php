<ul>
	<?php foreach($articles as $article): ?>
	<li>
		<p>
			<strong><?php echo link_to($article->getTitle(), 'article_show', $article) ?></strong>
			<br />
			<small><?php echo truncate_text($article->getContent(), 70, '...', true) ?></small>
		</p>
	</li>
	<?php endforeach; ?>
</ul>