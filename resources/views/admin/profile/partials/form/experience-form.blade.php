<form
	method="POST"
	action="{{ $experience->id ? route('admin.profile.experience.editPost', [$experience]) : route('admin.profile.experience.store') }}"
	enctype="multipart/form-data"
>
	{{ csrf_field() }}
	<input
		type="hidden"
		name="id"
		value="{{ $experience->id }}"
	/>
	<div class="row">
		<div class="col-12 col-md-10">
			<div class="form-group">
				<label>Company Name</label>
				<input
					type="text"
					name="company"
					value="{{ $experience->company }}"
					class="form-control"
					placeholder="Company name"
					required
				/>
			</div>
		</div>
		<div class="col-12 col-md-2">
			<div class="form-group">
				<label>Is Active?</label>
				<input
					type="checkbox"
					name="is_active"
					value="1"
					class="form-control"
					{{ $experience->is_active ? "checked" : "" }}
				/>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label>Title</label>
				<input
					type="text"
					name="title"
					value="{{ $experience->title }}"
					class="form-control"
					placeholder="Title"
					required
				/>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<label>Job Type</label>
				<select
					name="job_type_id"
					class="form-control"
					required
				>
					@forelse ($types as $typeKey => $type)
						<option 
							value="{{ $typeKey }}" 
							@if($experience->job_type_id == $typeKey) selected @endif
						>
							{{ $type }}
						</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				<label>City</label>
				<input
					type="text"
					name="city"
					value="{{ $experience->city }}"
					class="form-control"
					placeholder="City"
					required
				/>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				<label>Country</label>
				<input
					type="text"
					name="country"
					value="{{ $experience->country }}"
					class="form-control"
					placeholder="Country"
					required
				/>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				<label>Start Date</label>
				<input
					type="text"
					name="start_date"
					value="{{ $experience->start_date }}"
					class="form-control"
					placeholder="Start date"
					required
				/>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				<label>End Date</label>
				<input
					type="text"
					name="end_date"
					value="{{ $experience->end_date }}"
					placeholder="End date"
					class="form-control"
				/>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Description</label>
				<textarea
					type="text"
					name="description"
					class="form-control"
					placeholder="Briefly describe your job"
					rows="6"
					required
				>{{ $experience->title }}</textarea>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Responsibilities</label>
				<div id="responsibilitiesRows">
					@forelse(($experience->responsibilities ?? []) as $responsibilityKey => $responsibility)
						@include("admin.profile.partials.form.responsibility-row", [
							"key"		 =>	$responsibilityKey
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
		<div class="col-12">
			<div class="form-group">
				<label>Skills</label>
				<div class="row" id="skillTagsRows">
					@forelse($experience->skill_tags as $skillTagKey => $skillTag)
						@include("admin.profile.partials.form.skill-tag-row", [
							"key"		 =>	$skillTagKey,
							"skills"	 =>	$skills,
							"skillTag"	 =>	$skillTag
						])
					@empty
					@endforelse
				</div>
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="skillTagRowTemplate"
					data-append="skillTagsRows"
				>
					Add
				</a>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<img
					src="{{ $experience->company_logo ? asset('uploads/company/' . $experience->company_logo) : asset('uploads/defaults/no_image.png') }}"
					class="img-responsive"
					width="250"
				/>
			</div>
			<div class="form-group">
				<label>Upload Logo</label>
				<input
					type="file"
					class="form-control"
					name="company_logo"
					{{ $experience->id ? "" : "required" }}
				/>
			</div>
		</div>
		<div class="col-12 mt-5">
			<div class="form-group">
				<input
					type="submit"
					class="btn btn-sm btn-primary w-100"
					value="Save"
				/>
			</div>
		</div>
	</div>
</form>
<div class="invisible">
	<div id="responsibilitiesRowTemplate">
		@include("admin.profile.partials.form.responsibility-row", [
			"key"						 =>	"__INDEX__"
		])
	</div>
	<div id="skillTagRowTemplate">
		@include("admin.profile.partials.form.skill-tag-row", [
			"key"						 =>	"__INDEX__",
			"skills"					 =>	$skills
		])
	</div>
</div>