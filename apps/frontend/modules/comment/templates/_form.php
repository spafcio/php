<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<script type="text/javascript">
/* <![CDATA[ */ 
var obj = {
	error: false,
	csrf_token: null,
	article_id: null,
	comment_id: null
}

function lock(arg)
{
	var form_elements = $("#rise_comment_form").children("tbody").children("tr").children("td").children("input, textarea");
	var form_submit = $("input.rise_comment_form_submit");

	if(arg == false)
	{
		form_elements.attr("disabled", "disabled");
		form_submit.attr("value", "Komentarz dodany pomyślnie.").attr("disabled", "disabled").attr("value", "Komentarz dodany pomyślnie!");
	}
	else
	{
		form_elements.removeAttr("disabled");
		form_submit.removeAttr("disabled").attr("value", "Komentuj");
	}
}

function checkErr()
{
	$("#rise_comment_form .error_list").parent("td").children("input, textarea").addClass("err");
}

function resetErr()
{
	$(".err").removeClass("err");
}

function addError(field_name, message)
{	
	$("#"+field_name).before('<ul class="error_list"><li class="'+field_name+'_error">'+message+'</li></ul>');
}

function checkEmail(field) {
	var email_regexp = /^[^@]+@([a-z0-9\-]+\.)+[a-z]{2,4}$/i;

	if (email_regexp.test(field)) 
	{
		return true;
	}
	return false;
}

function checkEmpty(field) {
	if(field.attr("value") == '')
	{
		return false;
	}	
}

function process(data)
{
	if($("#no-moderated-comments").text() == '')
	{
		$("#comments-form").before(data);
	}
	else
	{
		$("#no-moderated-comments").replaceWith(data);
	}

	lock(false);
}

$(function()
{
	resetErr();
	checkErr();		
	$(".rise_comment_form_submit").click(
	function()
	{
		resetErr();
		obj.error = false;
		$("#rise_comment_form .error_list").remove();
		jQuery.each($("#rise_comment_author, #rise_comment_email, #rise_comment_content"), function (){

			if($(this).attr("value") == '')
			{
				addError($(this).attr("id"), "Pole wymagane!");
				obj.error = true;
			}
			
		});
						
		if($("#rise_comment_author").attr("value").length < 2 && $("#rise_comment_author").attr("value").length != 0)
		{
			addError("rise_comment_author", "Twój nick musi zawierać conajmniej 3 znaki.");
			obj.error = true;
		}

		if(!checkEmail($("#rise_comment_email").attr("value")) && $("#rise_comment_email").attr("value").length != 0)
		{
			addError("rise_comment_email", "Błędny format adresu e-mail");
			obj.error = true;
		}

		checkErr();
		if(obj.error)return false;

		$.post("<?php echo url_for('@comment_create', $form->getObject()) ?>", $("form").serialize(), function(data){ process(data)});

		return false;
		
	});
	
});


/* ]]> */ 
</script>
<?php if($sf_user->hasFlash('notice')): ?>
	<p class="notice" style="padding: 1px; background-color: #ddffdd; border-color: #aaccaa; border-style: solid; border-width: 2px;"><?php echo $sf_user->getFlash('notice') ?></p>
<?php endif; ?>
<form method="post" action="<?php echo url_for('@comment_create', $form->getObject()) ?>#comments-form">
  <table id="rise_comment_form">
    <tfoot>
      <tr>
        <td colspan="2">
          <input class="rise_comment_form_submit" type="submit" value="Komentuj" />
          <input class="clear" type="reset" value="Wyczyść" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>