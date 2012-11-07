function generate_link(menu_id_location, route_url)
{
	$(function()
			{
				$("a#menu_generate_submit").click(
				function()
				{
					var rise_menu_id = $(menu_id_location+" :selected").attr("value");
					if(rise_menu_id == '')
					{
						alert("Najpierw wybierz nazwe menu z listy!");
						return false;
					}
					var url = route_url+"?rise_menu_id="+rise_menu_id;
					$(".sf_admin_form_field_rise_menu_id").load(url+" #generated");				
				});
			});
}

$(function()
{
	var menu_id = $(".sf_admin_form_field_rise_menu_id").hide();
	
	menu_id.children("div").append('<a id="menu_generate_submit">Generuj</a>');
	
	$("div.sf_admin_form_field_menu_generate div :checkbox").hide().after('<a id="menu_generate_show">Otwórz generowanie linka</a>');
	
	$("a#menu_generate_show").toggle(
	function()
	{
		$(this).text("Zamknij generowanie linka");
		menu_id.show("normal");
	},		
	function()
	{
		$(this).text("Otwórz generowanie linka");
		menu_id.hide("normal");
	});
		
});