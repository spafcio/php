<?php if($comment = $article->getCommentByToken($userToken)): ?>
	<div id="no-moderated-comments">
	
		<h4>Twój ostatni komentarz oczekujący na moderację:</h4>

		 <?php echo $comment->getContent() ?>
		 <a id="moderated_comment_delete" 
		 href="<?php echo url_for2('no_js_comment_delete', array('id' => $comment->getId())) ?>
		 #comments-form" onclick="
		 		var f = document.createElement('form'); 
				f.style.display = 'none'; 
				this.parentNode.appendChild(f); 
				f.method = 'post'; 
				f.action = '<?php echo url_for('comment/delete?id='.$comment->getId()) ?>';
				var m = document.createElement('input'); 
				m.setAttribute('type', 'hidden'); 
				m.setAttribute('name', 'sf_method'); 
				m.setAttribute('value', 'delete'); 
				f.appendChild(m);
				$.post(f.action, $(f).serialize(), function(data)
						{ 
							$('#no-moderated-comments').remove();
							return false;
						});
				lock(true);
				return false;">Usuń komentarz</a>
		 	
	</div>
<?php endif; ?>