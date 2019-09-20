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
	
	var paymentDebtModalName			 =	"#paymentDebtModal";
	var paymentDebtModal				 =	$(paymentDebtModalName);
	var paymentDebtForm					 =	paymentDebtModal.find("form");
	
	var paymentDebtTakenModalName		 =	"#paymentDebtTakenModal";
	var paymentDebtTakenModal			 =	$(paymentDebtTakenModalName);
	var paymentDebtTakenForm			 =	paymentDebtTakenModal.find("form");
	
	//OPEN MODAL
	$("body").on("click", ".paymentDebt", function(e) {
		
		e.preventDefault();
		
		switchDebtModalValues(paymentDebtModal, $(this));
		
	});
	
	$("body").on("click", ".paymentDebtReturn", function(e) {
		
		e.preventDefault();
				
		switchDebtModalValues(paymentDebtTakenModal, $(this));
		
	});
	
	//EDITS PAYMENTS
	$("body").on("click", `${ paymentDebtModalName } table tbody td`, function(e) {
		
		if (!$(this).hasClass("defaultActions")) e.preventDefault();
		
		var parent						 =	$(this).closest("tr");
		var values						 =	parent.data("values");
		
		formValues(paymentDebtForm, values);
		paymentDebtForm.attr("action", paymentDebtForm.data("edit-url").replace(-2, values.id));
		
	});
	
	$("body").on("click", `${ paymentDebtTakenModalName } table tbody td`, function(e) {
		
		if (!$(this).hasClass("defaultActions")) e.preventDefault();
		
		var parent						 =	$(this).closest("tr");
		var values						 =	parent.data("values");
		
		formValues(paymentDebtTakenForm, values);
		paymentDebtTakenForm.attr("action", paymentDebtTakenForm.data("edit-url").replace(-2, values.id));
		
	});
	
	/**
	 * Switches values and sends request
	 * @param DOM modal
	 * @param DOM event
	 */
	function switchDebtModalValues(modal, event) {
		
		var person						 =	event.data("person");
		var modalAsText					 =	modal.html();
		
		modal.html(modalAsText.replace(/-1/g, person.id));
		modal.find("#name").text(person.name);
		modal.find("table").find("tbody").empty();
		
		$.ajax({
			url							 :	event.data("url"),
			method						 :	"GET",
			success						 :	function(data) {
				
				modal.find("table").find("tbody").append(data.debts);
				
			}
		});
		
		modal.modal("show");
		
	}
	
}