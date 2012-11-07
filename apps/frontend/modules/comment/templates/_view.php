<div id="comments">

<h3>
<?php if($comments_num = $article->countComments()): ?>
	<?php echo $comments_num.'&nbsp;' ?>
	<?php if($comments_num == 1): ?>
		komentarz:
	<?php elseif($comments_num > 1 && $comments_num < 5): ?>
		komentarze:
	<?php else: ?>
		komentarzy:
	<?php endif; ?>
<?php else: ?>
	Brak komentarzy
<?php endif; ?>
</h3>

<?php if($comments = $article->getComments()): ?>
	<div id="comments-list">
	<ul>
	<?php foreach($comments as $i => $comment): ?>
	
		<li class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
		<p class="comment-info">Komentarz dodany dnia <i><?php echo $comment->getCreatedAt('d-m-Y') ?></i> o godzinie <i><?php echo $comment->getCreatedAt('h:i') ?></i> przez&nbsp;&nbsp;<b><?php echo $comment->getAuthor() ?></b>:</p>
		<p><?php echo $comment->getContent() ?></p>
		<?php if($userToken == $comment->getToken()): ?>
			<?php echo link_to('Usuń komentarz', 'comment/delete?id='.
					   $comment->getId().'#comments',
					   array(
					   		'method' => 'delete',
				   			'confirm' => 'Na pewno chcesz usunąć swój komentarz?')) ?>
		</li>
		<?php endif; ?>
			
	<?php endforeach; ?> 
	</ul>
	</div>
<?php endif; ?>

<?php include_partial('comment/no-moderated', array('article' => $article, 'userToken' => $userToken)) ?>

<div id="comments-form">
	<h4>Dodaj nowy komentarz:</h4>
	<?php include_partial('comment/form', array('form' => $form)) ?>
	
</div>

</div>