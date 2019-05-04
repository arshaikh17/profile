<form
	method="POST"
	action="{{ route('admin.profile.updatePost', 'about') }}"
	>
	<div class="card-body">
		<div id="aboutMeFields">
			{{ csrf_field() }}
			
			<div class="row form-group">
				<div class="col-md-6">
					<label>First Name</label>
					<input
						type="text"
						class="form-control"
						name="first_name"
						value="{{ isset($about) ? $about->first_name : '' }}"
						required
					/>
				</div>
				<div class="col-md-6">
					<label>Surname</label>
					<input
						type="text"
						class="form-control"
						name="surname"
						value="{{ isset($about) ? $about->surname : '' }}"
						required
					/>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label>Work Title</label>
					<input
						type="text"
						class="form-control"
						name="work_title"
						value="{{ isset($about) ? $about->work_title : '' }}"
						required
					/>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					<label>Objective</label>
					<textarea
						class="form-control"
						name="objective"
						required
					>{{ isset($about) ? $about->objective : '' }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<input
		type="submit"
		class="btn btn-primary w-100"
		value="Save"
		/>
	</div>
</form>