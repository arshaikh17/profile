$(document).ready(function () {
	
	templateRendering();
	
});

/**
 * Updates html template in DOM
 */
function templateRendering () {
	
	/**
	 * Add a template
	 */
	$("body").on("click", ".add-template", function (e) {
		
		e.preventDefault();
		
		var id							 =	(new Date()).getTime();
		var template					 =	$("#" + $(this).data("template")).html();
		template						 =	template.replace(/__INDEX__/g, id);
		
		$("#" + $(this).data("append")).append(template);
		
	});
	
	/**
	 * Removes a template
	 */
	$("body").on("click", ".remove-template", function (e) {
		
		e.preventDefault();
		
		$("#" + $(this).data("id")).remove();
		
	});
	
}