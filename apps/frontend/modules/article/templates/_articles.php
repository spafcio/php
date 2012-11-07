<?php foreach($articles as $article): ?>
	<div class="post">
		<h1 class="title"><?php echo link_to($article->getTitle(), 'article_show', $article) ?></h1>
		<div class="entry">
			<p class="for_image"><?php echo image_tag('/uploads/articles/'.$article->getImage(), 'alt='.$article->getTitle()) ?></p>
			<p><?php echo truncate_text($article->getContent(), 500, '...<br/>['.link_to('czytaj dalej', 'article_show', $article).']', true) ?></p>
		</div>
	</div>
<?php endforeach; ?>