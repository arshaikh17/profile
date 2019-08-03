<form
	method="POST"
	action="{{ route('profile.details.store') }}"
	enctype="multipart/form-data"
>
	<div class="card-body">
		<div id="detailsFields">
			{{ csrf_field() }}
			
			<div class="row form-group">
				<div class="col-md-6">
					<label>First Name</label>
					<input
						type="text"
						class="form-control"
						name="details[first_name]"
						value="{{ $details->first_name ?? '' }}"
						required
					/>
				</div>
				<div class="col-md-6">
					<label>Surname</label>
					<input
						type="text"
						class="form-control"
						name="details[surname]"
						value="{{ $details->surname ?? '' }}"
						required
					/>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label>Work Title</label>
						<input
							type="text"
							class="form-control"
							name="details[work_title]"
							value="{{ $details->work_title ?? '' }}"
							required
						/>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label>Objective</label>
						<textarea
							class="form-control"
							name="details[objective]"
							required
						>{{ $details->objective ?? '' }}</textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label>Brief Description</label>
						<textarea
							class="form-control"
							placeholder="Briefly describe yourself"
							name="details[brief]"
							rows="6"
							required
						>{{ $details->brief ?? "" }}</textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group">
						<label>Responsibilities</label>
						<div id="responsibilitiesRows">
							@forelse(json_decode($details->responsibilities ?? "{}") as $responsibilityKey => $responsibility)
								@include("profile.partials.form.responsibility-row", [
									"key"					 =>	$responsibilityKey,
									"responsibility"		 =>	$responsibility,
									"inputName"				 =>	"details[responsibilities][]"
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
		@include("profile.partials.form.responsibility-row", [
			"key"						 =>	"__INDEX__",
			"inputName"					 =>	"details[responsibilities][]"
		])
	</div>
</div>