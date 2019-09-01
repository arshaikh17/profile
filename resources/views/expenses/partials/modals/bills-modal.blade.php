<div class="modal" id="billsModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Bills of this Month</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h6
					class="hover-link"
					data-toggle="collapse"
					data-target="#billsForm"
				>
					Bills Form
				</h6>
				<div class="collapse" id="billsForm">
					<form method="POST" action="{{ route('expenses.bills.store') }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>Amount</label>
									<input type="text" name="amount" class="form-control form-control-sm" required />
								</div>
							</div>
							<div class="col-8">
								<div class="form-group">
									<label>Bill Of</label>
									<select name="bill_of" class="form-control form-control-sm" required>
										<option>Select bill</option>
										@forelse ($billNames as $billKey => $billName)
											<option value="{{ $billKey }}">{{ $billName }}</option>
										@empty
										@endforelse
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control form-control-sm" required></textarea>
						</div>
						
						<div class="form-group float-right">
							<input type="submit" class="btn btn-sm btn-info" value="Save" />
						</div>
					</form>
				</div>
				<div>
					<table class="table table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>Bills paid this month</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($bills as $bill)
								<tr class="hover-link">
									<td>{{ $bill->bill }}, <span class="text-info">£{{ $bill->amount }}</span></td>
								</tr>
							@empty
							@endforelse
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