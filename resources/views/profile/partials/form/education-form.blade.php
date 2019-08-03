<form
	method="POST"
	action="{{ $education->id ? route('profile.educations.update', [$education]) : route('profile.educations.store') }}"
	enctype="multipart/form-data"
>
	{{ csrf_field() }}
	<input
		type="hidden"
		name="id"
		value="{{ $education->id }}"
	/>
	<div class="row">
		<div class="col-12 col-md-10">
			<div class="form-group">
				<label>Title</label>
				<input
					type="text"
					name="title"
					value="{{ $education->title }}"
					class="form-control"
					placeholder="Title of course"
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
					{{ $education->is_active ? "checked" : "" }}
				/>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<div class="form-group">
				<label>Institute Name</label>
				<input
					type="text"
					name="institute"
					value="{{ $education->institute }}"
					class="form-control"
					placeholder="Name of Institute"
					required
				/>
			</div>
		</div>
		<div class="col-12 col-md-4">
			<div class="form-group">
				<label>Degree Type</label>
				<select
					name="degree_type_id"
					class="form-control"
					required
				>
					@forelse ($degreeTypes as $degreeTypeKey => $degreeType)
						<option
							value="{{ $degreeTypeKey }}"
							{{ $degreeTypeKey == $education->degree_type_id ? "selected" : "" }}
						>
							{{ $degreeType }}
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
					value="{{ $education->city }}"
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
					value="{{ $education->country }}"
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
					value="{{ $education->start_date }}"
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
					value="{{ $education->end_date }}"
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
				>{{ $education->description }}</textarea>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Majors</label>
				<div id="majorsRows">
					@forelse(($education->majors ?? []) as $majorKey => $major)
						@include("profile.partials.form.major-row", [
							"key"		 =>	$majorKey,
							"major"		 =>	$major
						])
					@empty
					@endforelse
				</div>
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="majorsRowTemplate"
					data-append="majorsRows"
				>
					Add
				</a>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<img
					src="{{ $education->institute_logo ? asset('uploads/profile/educations/' . $education->institute_logo) : asset('defaults/no_image.png') }}"
					class="img-responsive"
					width="250"
				/>
			</div>
			<div class="form-group">
				<label>Upload Logo</label>
				<input
					type="file"
					class="form-control"
					name="institute_logo"
					{{ $education->id ? "" : "required" }}
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
	<div id="majorsRowTemplate">
		@include("profile.partials.form.major-row", [
			"key"						 =>	"__INDEX__"
		])
	</div>
</div>