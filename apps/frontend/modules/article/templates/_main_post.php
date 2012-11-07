<h1 class="title"><?php echo link_to($article->getTitle(), 'article_show', $article) ?></h1>

<?php if($article->getImage()): ?>
	<?php $path = '/uploads/articles/'.$article->getImage(); ?>
	<a rel="lightbox-articlesMainImages" class="lightbox-enabled" href="<?php echo $path ?>">
	<?php echo image_tag($path, 'alt=example class=left') ?>
	</a>
<?php endif; ?>
<p><?php echo truncate_text($article->getContent(), 400, '...', true) ?></p>