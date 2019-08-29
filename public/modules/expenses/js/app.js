$(document).ready(function() {
	
	expenditures();
	
});

/**
 * Methods for expenditures modals
 */
function expenditures() {
	
	//ADDS EXPENDITURE
	$("body").on("click", "#addExpense", function(e) {
		
		e.preventDefault();
		
		var modal						 =	$("#expenseModal");
		var form						 =	modal.find("form");
		var url							 =	form.attr("data-action-add");
		
		form.attr("action", url);
		
		changeExpenditureFormValues(form, null);
		
		modal.modal("show");
		
	});
	
	//EDITS EXPENDITURE
	$("body").on("click", ".expenditureRow", function(e) {
		
		e.preventDefault();
		
		var data						 =	$(this).data("data");
		var modal						 =	$("#expenseModal");
		var form						 =	modal.find("form");
		var url							 =	form.attr("data-action-edit").replace(-1, data.id);
		
		form.attr("action", url);
		
		changeExpenditureFormValues(form, data);
		
		modal.modal("show");
		
	});
	
	//CHANGES FORM VALUES
	function changeExpenditureFormValues(form, data = null) {
		
		var amount						 =	data ? data.amount : "";
		var description					 =	data ? data.description : "";
		var tag_id						 =	data ? data.tag_id : "";
		
		form.find("input[name='amount']").val(amount);
		form.find("textarea[name='description']").val(description);
		form.find("select[name='tag_id']").val(tag_id).change();
		
	}
	
}