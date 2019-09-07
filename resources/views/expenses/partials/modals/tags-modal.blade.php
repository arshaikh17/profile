<div class="modal" id="tagsModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tags</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row mb-2">
					<div class="col-10">
						<h6
							class="hover-link"
							data-toggle="collapse"
							data-target="#tagFormDiv"
						>
							Tag Form
						</h6>
					</div>
					<div class="col-2 text-right">
						<a
							href="#"
							class="btn btn-sm btn-info resetForm"
							data-form="#tagsForm"
						>
							<i class="fas fa-redo-alt"></i>
						</a>
					</div>
				</div>
				
				<div class="collapse" id="tagFormDiv">
					<form
						id="tagsForm"
						method="POST"
						action="{{ route('expenses.tags.store') }}"
						data-add-url="{{ route('expenses.tags.store') }}"
						data-edit-url="{{ route('expenses.tags.update', -1) }}"
					>
						{{ csrf_field() }}
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control form-control-sm" required />
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control form-control-sm" required></textarea>
						</div>
						<div class="form-group float-right">
							<button type="submit" class="btn btn-sm btn-info">Save</button>
						</div>
					</form>
				</div>
				<div>
					<table
						class="table table-hover table-striped table-bordered"
					>
						<thead>
							<tr>
								<th>Tag</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($tags as $tag)
								<tr
									class="hover-link"
									data-data="{{ $tag }}"
								>
									<td>{{ $tag->name }}</td>
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