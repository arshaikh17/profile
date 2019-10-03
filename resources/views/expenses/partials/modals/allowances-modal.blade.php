<div class="modal" id="allowancesModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Allowances to this Month</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<table class="table table-sm table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Description</th>
							<th>Amount</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($allowances as $allowance)
							<tr
								class="hover-link"
								data-values="{{ $allowance }}"
							>
								<td>
									{{ $allowance->description }}
								</td>
								<td>£{{ $allowance->amount }}</td>
								<td class="btn-group">
									<form
										method="POST"
										action="{{ $allowance->is_paid ? route('expenses.allowances.mark-inactive', [$allowance]) : route('expenses.allowances.mark-active', [$allowance]) }}"
									>
										{{ csrf_field() }}
										<button
											type="submit"
											class="btn btn-sm btn-info"
											data-toggle="tooltip"
											title="Mark {{ $allowance->is_paid ? "inactive" : "active" }}"
										>
											<i class="fa fa-{{ $allowance->is_paid ? 'times' : 'check' }}"></i>
										</button>
									</form>
									<form method="POST" action="{{ route('expenses.allowances.destroy', [$allowance]) }}" class="ml-1">
										{{ csrf_field() }}
										<button
											type="submit"
											class="btn btn-sm btn-danger"
											data-toggle="tooltip"
											title="Delete this allowance"
										>
											<i class="fas fa-trash"></i>
										</button>
									</form>
								</td>
							</tr>
						@empty
						@endforelse
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>