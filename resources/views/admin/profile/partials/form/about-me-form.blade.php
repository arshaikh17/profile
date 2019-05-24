<form
	method="POST"
	action="{{ route('admin.profile.updatePost', 'about') }}"
	enctype="multipart/form-data"
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
				<div class="col-12">
					<div class="form-group">
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
				<div class="col-12">
					<div class="form-group">
						<label>Objective</label>
						<textarea
							class="form-control"
							name="objective"
							required
						>{{ isset($about) ? $about->objective : '' }}</textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label>Brief Description</label>
						<textarea
							class="form-control"
							placeholder="Briefly describe yourself"
							name="brief"
							rows="6"
							required
						>{{ isset($about) ? $about->brief : '' }}</textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label>Responsibilities</label>
						<div id="responsibilitiesRows">
							@forelse(($about->responsibilities ?? []) as $responsibilityKey => $responsibility)
								@include("admin.profile.partials.form.responsibility-row", [
									"key"					 =>	$responsibilityKey,
									"responsibility"		 =>	$responsibility
								])
							@empty
							@endforelse
						</div>
						<a
							href="#"
							class="btn btn-sm btn-primary float-right add-template"
							data-template="responsibilitiesRowTemplate"
							data-append="responsibilitiesRows"
						>
							Add
						</a>
					</div>
				</div>
				<div class="col-12 mt-5">
					<div class="form-group">
						<img
							src="{{ $about->profile_picture ? asset('uploads/profile/' . $about->profile_picture) : asset('uploads/defaults/no_image.png') }}"
							class="img-responsive"
							width="250"
						/>
					</div>
					<div class="form-group">
						<label>Upload Profile Picture</label>
						<input
							type="file"
							name="profile_picture"
						/>
					</div>
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
<div class="invisible">
	<div id="responsibilitiesRowTemplate">
		@include("admin.profile.partials.form.responsibility-row", [
			"key"						 =>	"__INDEX__"
		])
	</div>
</div>