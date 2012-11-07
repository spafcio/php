<?php if(!isset($rise_comment, $article, $userToken)): ?>
	<?php echo ('There is a problem with rise_article_form fields!') ?>
<?php else: ?>
<?php include_partial('comment/no-moderated', array(
				'comment' => $rise_comment,
				'article' => $article,
				'userToken' => $userToken
				)); 
?>
<?php endif; ?>	