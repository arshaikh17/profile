$(document).ready(function() {
	searchTable();
	filterElements();
});

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

/**
 * Filters the elements
 */
function filterElements() {
	
	$(".filter-element").on("keyup", function() {
		
		var value						 =	$(this).val().toLowerCase();
		
		$($(this).data("path")).filter(function() {
			
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			
		});
		
	});
	
}