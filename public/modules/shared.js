$(document).ready(function () {
	
	templateRendering();
	searchTable();
	filterElements();
	initialiseTooltip();
	toggleDOM();
	initialiseMasonry();
	initialiseSortingArrowOnBootstrapCollapse();
	resetForm();
	initialiseDataTables();
	renderCharts();
	
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

/**
 * Appends values on form
 * 
 * @param DOM form
 * @param JSON values
 */
function formValues(form, values) {
	
	var field;
	
	for (var key in values) {
		
		field							 =	form.find(`[name="${key}"]`);
		
		if (field.length) {
			
			field.val(values[key]);
			
			if (field.is("select")) field.change();
			if (field.is(":checkbox") && values[key]) field.prop("checked", true);
			
		}
		
	}
	
}

/**
 * Resets form
 */
function resetForm() {
	
	$("body").on("click", ".resetForm", function(e) {
		
		e.preventDefault();
		
		var form						 =	$($(this).data("form"));
		
		form.find("input").val("");
		form.find("textarea").val("");
		form.find("select").val("").change();
		
		if (form.data("add-url")) form.attr("action", form.data("add-url"));
		
	});
	
}

/**
 * Initialises DataTables
 */
function initialiseDataTables() {
	
	var table;
	
	$(".datatables").each(function(index, table) {
		
		table							 =	$(table);
		
		table.DataTable();
		
	});
	
}

/**
 * Renders charts
 */
function renderCharts() {
	
	var chartColours					 =	{
		red: 'rgb(255, 99, 132)',
		orange: 'rgb(255, 159, 64)',
		yellow: 'rgb(255, 205, 86)',
		green: 'rgb(75, 192, 192)',
		blue: 'rgb(54, 162, 235)',
		purple: 'rgb(153, 102, 255)',
		grey: 'rgb(201, 203, 207)'
	};
	var chartColoursSet					 =	[
		chartColours.red,
		chartColours.orange,
		chartColours.yellow,
		chartColours.green,
		chartColours.blue,
	];
	
	$(".chart").each(function(index, chart) {
		
		var chart						 =	$(chart);
		var datasets					 =	chart.data("datasets");
		var type						 =	chart.data("type");
		var data						 =	[];
		
		for (var i in datasets.values) {
			
			data.push({
				label					 :	datasets.values[i].label,
				data					 :	datasets.values[i].values,
				borderWidth				 :	2,
				backgroundColor			 :	chartColoursSet,
				borderColor				 :	chartColoursSet,
				hoverBackgroundColor	 :	chartColoursSet,
				hoverBorderColor		 :	chartColoursSet,
			});
			
			console.log(datasets.values)
			
		}
		
		var config						 =	{
			type						 :	type,
			data						 :	{
				labels					 :	datasets.labels,
				datasets				 :	data,
			},
			options						 :	{
				responsive				 :	true
			}
		};
		
		new Chart(chart, config);
		
	});
	
}