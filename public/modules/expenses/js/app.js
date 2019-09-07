$(document).ready(function() {
	
	expenditures();
	tags();
	
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