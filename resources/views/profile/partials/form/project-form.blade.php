<form
	method="POST"
	action="{{ $project->id ? route('profile.projects.update', [$project]) : route('profile.projects.store') }}"
	enctype="multipart/form-data"
>
	{{ csrf_field() }}
	<input
		type="hidden"
		name="id"
		value="{{ $project->id }}"
	/>
	<div class="row">
		<div class="col-12">
			<div class="form-group">
				<label>Project Title</label>
				<input
					type="text"
					name="title"
					value="{{ $project->title }}"
					class="form-control"
					placeholder="Project Title"
					required
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
					placeholder="Briefly describe your project"
					rows="6"
					required
				>{{ $project->description }}</textarea>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Repository Link</label>
				<input
					type="text"
					name="repository"
					value="{{ $project->repository }}"
					placeholder="Repository link e.g. GitHub or BitBucket"
					class="form-control"
				/>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Project Website Link</label>
				<input
					type="text"
					name="link"
					value="{{ $project->link }}"
					placeholder="Project Website link"
					class="form-control"
				/>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Responsibilities</label>
				<div id="responsibilitiesRows">
					@forelse($project->responsibilities ?? [] as $responsibilityKey => $responsibility)
						@include("profile.partials.form.responsibility-row", [
							"key"							 =>	$responsibilityKey,
							"responsibility"				 =>	$responsibility
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
					@forelse($project->skill_tags as $skillTagKey => $skillTag)
						@include("profile.partials.form.skill-tag-row", [
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
		<div class="col-12 col-md-6">
			<div class="form-group">
				<label>Affiliated to Any Experience?</label>
				<select
					name="company_id"
					class="form-control"
				>
					<option value="" selected>None</option>
					@forelse ($experiences as $experience)
						<option
							value="{{ $experience->id }}"
							{{ $project->company_id == $experience->id ? "selected" : "" }}
						>
							{{ $experience->company }}
						</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="form-group">
				<img
					src="{{ $project->cover ? asset('uploads/profile/project_covers/' . $project->cover) : asset('defaults/no_image.png') }}"
					class="img-responsive"
					width="250"
				/>
			</div>
			<div class="form-group">
				<label>Upload Cover</label>
				<input
					type="file"
					class="form-control"
					name="cover"
					{{ $project->id ? "" : "required" }}
				/>
			</div>
		</div>
		<div class="col-12">
			<div class="form-group">
				<label>Gallery</label>
				<div class="row" id="galleryItemRows">
					@forelse($project->gallery as $gallery)
						@include("profile.partials.form.gallery-item-row", [
							"key"		 =>	$gallery->id,
							"gallery"	 =>	$gallery
						])
					@empty
					@endforelse
				</div>
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="galleryItemRowTemplate"
					data-append="galleryItemRows"
				>
					Add
				</a>
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
		@include("profile.partials.form.responsibility-row", [
			"key"						 =>	"__INDEX__"
		])
	</div>
	<div id="skillTagRowTemplate">
		@include("profile.partials.form.skill-tag-row", [
			"key"						 =>	"__INDEX__",
			"skills"					 =>	$skills
		])
	</div>
	<div id="galleryItemRowTemplate">
		@include("profile.partials.form.gallery-item-row", [
			"key"						 =>	"__INDEX__",
			"gallery"					 =>	null
		])
	</div>
</div>