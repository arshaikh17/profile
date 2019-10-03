<div class="modal" id="paymentDebtModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="name"></span>'s History</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h6
					class="hover-link"
					data-toggle="collapse"
					data-target="#paymentForm"
				>
					Payment Form
				</h6>
				<div class="collapse" id="paymentForm">
					<form
						method="POST"
						action="{{ route('expenses.payments.persons.debts.store', -1) }}"
						data-add-url="{{ route('expenses.payments.persons.debts.store', -1) }}"
						data-edit-url="{{ route('expenses.payments.persons.debts.update', [-1, -2]) }}"
					>
						{{ csrf_field() }}
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label>Amount</label>
									<input type="text" name="amount" class="form-control form-control-sm" required />
								</div>
							</div>
							<div class="col-6">
								<label></label>
								<div class="form-group form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="is_paid"> Paid?
									</label>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control form-control-sm" required></textarea>
						</div>
						
						<div class="form-group text-right">
							<input type="submit" class="btn btn-sm btn-info" value="Save" />
						</div>
					</form>
				</div>
				<div>
					<p>Debt taken over course.</p>
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Amount</th>
								<th>Date</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>