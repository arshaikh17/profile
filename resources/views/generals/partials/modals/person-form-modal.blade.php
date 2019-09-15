<div class="modal" id="personModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Person</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form
				id="personForm"
				action="{{ route('generals.persons.store') }}"
				method="POST"
			>
				<div class="modal-body">
					<div class="row mb-2">
						
						<div class="col-12 text-right">
							<a
								href="#"
								class="btn btn-sm btn-info resetForm"
								data-form="#personForm"
							>
								<i class="fas fa-redo-alt"></i>
							</a>
						</div>
					</div>
					<div>
						{{ csrf_field() }}
						
						<div class="row">
							<div class="form-group col-6">
								<label>First Name</label>
								<input
									type="text"
									name="first_name"
									class="form-control"
									required
								/>
							</div>
							<div class="form-group col-6">
								<label>Surname</label>
								<input
									type="text"
									name="surname"
									class="form-control"
									required
								/>
							</div>
							<div class="form-group col-12">
								<label>Email</label>
								<input
									type="text"
									name="email"
									class="form-control"
									required
								/>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-6">
								<label>Owed anything?</label>
								<input
									type="text"
									name="owed"
									class="form-control"
								/>
							</div>
							<div class="form-group col-6">
								<label>Lent anything?</label>
								<input
									type="text"
									name="lent"
									class="form-control"
								/>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-sm btn-info">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>