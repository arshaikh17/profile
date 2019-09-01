<div class="modal" id="expenseModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Expense</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form
				method="POST"
				data-action-add="{{ route('expenses.expenditures.store') }}"
				data-action-edit="{{ route('expenses.expenditures.update', -1) }}"
			>
				{{ csrf_field() }}
				
				<div class="modal-body row">
					<div class="form-group col-md-6">
						<label>Amount</label>
						<input type="text" name="amount" class="form-control form-control-sm" required />
					</div>
					<div class="form-group col-md-6">
						<label>Tag</label>
						<select name="tag_id" class="form-control form-control-sm">
							<option value="">No tag</option>
							@forelse ($tags as $tag)
								<option value="{{ $tag->id }}">{{ $tag->name }}</option>
							@empty
							@endforelse
						</select>
					</div>
					<div class="form-group col-12">
						<label>Description</label>
						<textarea name="description" class="form-control form-control-sm"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-info" value="Save" />
				</div>
			</form>
		</div>
	</div>
</div>