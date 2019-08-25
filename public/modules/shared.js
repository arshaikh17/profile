$(document).ready(function () {
	
	templateRendering();
	searchTable();
	filterElements();
	initialiseTooltip();
	toggleDOM();
	initialiseMasonry();
	initialiseSortingArrowOnBootstrapCollapse();
	
});

/**
 * Updates html template in DOM
 */
function templateRendering() {
	
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
function initialiseTooltip() {
	$('[data-toggle="tooltip"]').tooltip();
	$(".toast").toast("show");
}

/*
 * Toggles DOM elements
 */
function toggleDOM() {
	
	$("body").on("click", ".toggle-dom", function (e) {
		
		e.preventDefault();
		
		var element						 =	$(this);
		$(".toggle-dom").removeClass("active");
		element.addClass("active");
		
		var value						 =	element.data("toggle-dom-id");
		var className					 =	element.data("toggle-dom-child");
		
		if (value === undefined) {
			
			$(className).show();
			return false;
			
		}
		
		$(className).hide();
		$(`${className}[data-toggle-dom-value="${value}"]`).show();
		
	});
	
}

/**
 * Initialise masonry
 */
function initialiseMasonry() {
	
	$(".masonry-grid").each(function (index, grid) {
	
		$($(this).data("masonry-parent")).masonry({
			itemSelector				 :	$(this).data("masonry-child"),
		});
		
	});
	
}

/**
 * Initialises sorting arrows on bootstrap collapse
 */
function initialiseSortingArrowOnBootstrapCollapse() {
	
	$("[data-toggle='collapse']").each(function (index, element) {
		
		var element						 =	$(element);
		
		if (!element.hasClass("chevron")) element.addClass("chevron");
		
		if ($(element.data("target")).hasClass("show")) {
			
			element.removeClass("chevron-down");
			
		} else {
			
			element.addClass("chevron-down");
			
		}
		
	});
	
	$("body").on("click", "[data-toggle='collapse']", function (e) {
		//console.log($(this).data("target"))
		if ($($(this).data("target")).hasClass("show")) {
			
			$(this).addClass("chevron-down");
			
		} else {
			
			$(this).removeClass("chevron-down");
			
		}
		
	});
	
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