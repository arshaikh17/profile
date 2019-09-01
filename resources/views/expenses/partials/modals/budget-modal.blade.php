<div class="modal" id="budgetModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Month's Budget</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				
				<div>
					@if ($budget)
						<p>
							Budget you've set for this month.
						</p>
						<h3 class="text-info">£{{ number_format($budget->amount) }}</h3>
					@else
						<p>
							Budget not set, yet?
						</p>
					@endif
				</div>
				<div>
					<p class="hover-link" data-toggle="collapse" data-target="#editBudgetForm">It's okay if you wish to update it.</p>
					<div class="collapse" id="editBudgetForm">
						<form action="{{ $budget ? route('expenses.budgets.update', $budget) : route('expenses.budgets.store') }}" method="POST">
							{{ csrf_field() }}
							
							@include("expenses.partials.budget-form-fields", [
								"budget" =>	$budget,
							])
							
							<div class="form-group text-right">
								<input type="submit" class="btn btn-info" value="Save" />
							</div>
						</form>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>