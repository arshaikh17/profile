<div class="modal" id="savingModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Month's Saving</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				
				<div>
					@if ($saving)
						<p>
							Saving goal for this month.
						</p>
						<h3 class="text-info">£{{ number_format($saving->amount) }}</h3>
						
						<p>Here is something you can do about it.</p>
						<form
							action="{{ $saving->status ? route('expenses.goals.savings.mark-inactive', [$saving]) : route('expenses.goals.savings.mark-active', [$saving]) }}"
							method="POST"
						>
							{{ csrf_field() }}
							<div class="form-group text-right">
								<input type="submit" class="btn btn-info" value="Mark as {{ $saving->status ? 'Inactive' : 'Active' }}" />
							</div>
						</form>
					@else
						<p>
							You haven't set any saving goal for this month.
						</p>
					@endif
				</div>
				<div>
					<p class="hover-link" data-toggle="collapse" data-target="#editSavingForm">It's okay if you wish to update it.</p>
					<div class="collapse" id="editSavingForm">
						<form
							action="{{ $saving ? route('expenses.goals.savings.update', $saving) : route('expenses.goals.savings.store') }}"
							method="POST"
						>
							{{ csrf_field() }}
							
							@include("expenses.partials.goal-form-fields", [
								"goal"	 =>	$saving,
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