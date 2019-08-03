<form
	method="POST"
	action="{{ route('profile.update', 'skill') }}"
	>
	<div class="card-body">
		<div id="skillFields">
			{{ csrf_field() }}
			@forelse ($skills as $skillKey => $skill)
				@include("profile.partials.form.skill-row", [
					"key"				 =>	$skillKey,
					"skillCategories"	 =>	$skillCategories,
					"skillLevels"		 =>	$skillLevels
				])
			@empty
			@endforelse
			
		</div>
		<div class="row mt-2">
			<div class="col-12">
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="skillTemplate"
					data-append="skillFields"
					>
					add
				</a>
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