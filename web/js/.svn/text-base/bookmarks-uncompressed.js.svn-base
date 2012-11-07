function bookmarks(bar_location, content_location, hidden_list_loc) {
	$( function() {
		$(bar_location + " li a").click(
				function() {
					if (hidden_list_loc != undefined) {
						if ($(this).hasClass("clicked")) {
							return true;
						}
						$(bar_location + " li a").removeClass("clicked");
					}
					$(bar_location + " li.active").removeClass("active");
					$(this).parent("li").addClass("active");
					var element_index = $(bar_location + " li").index(
							$(this).parent("li"));
					$(content_location + ":visible").hide();
					$(content_location).eq(element_index).show();
					if (hidden_list_loc != undefined) {
						$(this).attr(
								"href",
								$(hidden_list_loc + " a").eq(element_index)
										.attr("href"));
						$(this).addClass("clicked");
					}
					return false;
				});
	});
}