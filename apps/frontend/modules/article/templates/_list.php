<?php foreach($articles as $article): ?>
<span><?php echo link_to($article->getTitle(), 'article_show', $article) ?></span><br/>
<?php endforeach; ?>