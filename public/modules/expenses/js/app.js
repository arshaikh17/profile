$(document).ready(function() {
	
	expenditures();
	tags();
	allowances();
	payments();
	
});

/**
 * Methods for expenditures modals
 */
function expenditures() {
	
	var expenseModalName				 =	"#expenseModal";
	var expenseModal					 =	$(expenseModalName);
	var expenseForm						 =	expenseModal.find("form");
	var expenseTableName				 =	"#allExpensesModal";
	
	//EDITS EXPENDITURE
	$("body").on("click", `${ expenseTableName } table tbody tr`, function(e) {
		
		e.preventDefault();
		
		var values						 =	$(this).data("values");
		expenseForm.attr("action", expenseForm.data("edit-url").replace(-1, values.id))
		
		formValues(expenseForm, values);
		
		expenseModal.modal("show");
		
	});
	
}

/**
 * Methods for tags modal
 */
function tags() {
	
	var tagModalName					 =	"#tagsModal";
	var tagModal						 =	$(tagModalName);
	var tagForm							 =	tagModal.find("form");
	var tagTable						 =	tagModal.find("table");
	
	//EDIT TAG
	$("body").on("click", `${ tagModalName } table tbody tr`, function() {
		
		var values						 =	$(this).data("data");
		tagForm.attr("action", tagForm.data("edit-url").replace(-1, values.id))
		
		formValues(tagForm, values);
		
	})
	
}

/**
 * Methods for allowances modal
 */
function allowances() {
	
	var allowancesModalName				 =	"#allowancesModal";
	var allowancesModal					 =	$(allowancesModalName);
	var allowancesForm					 =	allowancesModal.find("form");
	var allowancesTable					 =	allowancesModal.find("table");
	
	//EDIT TAG
	$("body").on("click", `${ allowancesModalName } table tbody tr`, function() {
		
		var values						 =	$(this).data("values");
		allowancesForm.attr("action", allowancesForm.data("edit-url").replace(-1, values.id))
		
		formValues(allowancesForm, values);
		
	})
	
}

/**
 * Methods for payments modals
 */
function payments() {
	
	var paymentOweModalName				 =	"#paymentOweModal";
	var paymentOweModal					 =	$(paymentOweModalName);
	var paymentOweForm					 =	paymentOweModal.find("form");
	
	//OPEN MODAL
	$("body").on("click", ".paymentOwe", function(e) {
		
		e.preventDefault();
		
		var person						 =	$(this).data("person");
		var paymentOweModalAsText		 =	paymentOweModal.html();
		
		paymentOweModal.html(paymentOweModalAsText.replace(/-1/g, person.id));
		paymentOweModal.find("#name").text(person.name);
		paymentOweModal.find("table").find("tbody").empty();
		
		$.ajax({
			url							 :	$(this).data("url"),
			method						 :	"GET",
			success						 :	function(data) {
				
				paymentOweModal.find("table").find("tbody").append(data.owes);
				
			}
		});
		
		paymentOweModal.modal("show");
		
	})
	
	//EDITS PAYMENTS
	$("body").on("click", `${ paymentOweModalName } table tbody td`, function(e) {
		
		if (!$(this).hasClass("defaultActions")) e.preventDefault();
		
		var parent						 =	$(this).closest("tr");
		var values						 =	parent.data("values");
		
		formValues(paymentOweForm, values);
		paymentOweForm.attr("action", paymentOweForm.data("edit-url").replace(-2, values.id));
		
	});
	
}