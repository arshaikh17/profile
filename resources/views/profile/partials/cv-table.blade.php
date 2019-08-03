<h1>
	My CVs
</h1>
<div class="card card-default">
	<div class="card-body border shadow">
		<p 
			data-toggle="collapse"
			data-target="#cvForm"
		>
			Add New CV
		</p>
		<form
			method="POST"
			action="{{ route('profile.cvs.store') }}"
			enctype="multipart/form-data"
			class="collapse"
			id="cvForm"
		>
			{{csrf_field()}}
			
			<div class="form-group">
				<label>Title</label>
				<input
					type="text"
					class="form-control"
					placeholde="Enter title of CV"
					name="title"
					required
				/>
			</div>
			<div class="form-group">
				<label>Upload CV (Only PDF)</label>
				<input
					type="file"
					name="cv"
					required
				/>
			</div>
			<div class="form-group">
				<label>Is Main?</label>
				<input
					type="checkbox"
					class="form-control"
					name="is_main"
					value="1"
				/>
			</div>
			<div class="form-group">
				<input
					type="submit"
					class="btn btn-primary btn-sm float-right"
					value="Upload"
				/>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<table class="table table-hover table-condensed table-striped">
			<thead>
				<tr>
					<th>Title</th>
					<th>Is Main?</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($cvs as $cv)
					<tr>
						<td>
							<a 
								href="{{ route('profile.cvs.edit', $cv) }}"
							>
								{{ $cv->title }}
							</a>
						</td>
						<td>
							{{ $cv->is_main ? "YES" : "NO" }}
						</td>
					</tr>
				@empty
				@endforelse
			</tbody>
		</table>
	</div>
</div>