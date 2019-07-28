$(document).ready(function () {
	
	templateRendering();
	searchTable();
	filterElements();
	initialiseTooltip();
	
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

/**
 * Performs search for specified table
 */
function searchTable() {
	
	$("body").on("keyup", ".ajax-search-table", delay(function() {
		
		NProgress.start();
		
		$.ajax({
			url							 :	$(this).data("route"),
			method						 :	"GET",
			data						 :	{ "term" : $(this).val() },
			success						 :	(data) => {
				
				$(`#${$(this).data("table")} > tbody`).html(data.data);
				$(".pagination").remove();
				
				NProgress.done();
				
			}
		});
		
	}, 500));
	
}

/**
 * Filters the elements
 */
function filterElements() {
	
	$(".filter-element").on("keyup", function() {
		
		var value						 =	$(this).val().toLowerCase();
		var dom;
		$($(this).data("path")).filter(function() {
			
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			
		});
		
	});
	
}
/**
 * Bootstrap 4 tooltip initialisation
 */
function initialiseTooltip(){
	$('[data-toggle="tooltip"]').tooltip();
	$('.toast').toast('show');
}

/**
 * Creates a delay before triggering function
 */
function delay(callback, ms) {
	
	var timer							 =	0;
	
	return function() {
	
		var context						 =	this;
		var args						 =	arguments;
		
		clearTimeout(timer);
		
		timer							 =	setTimeout(function() {
			
			callback.apply(context, args);
			
		}, ms || 0);
		
	};
	
}