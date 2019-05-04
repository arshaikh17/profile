<form
	method="POST"
	action="{{ route('admin.profile.updatePost', 'social') }}"
	>
	<div class="card-body">
		<div id="socialMediaFields">
			{{ csrf_field() }}
			@forelse ($socialMedias as $socialMediaKey => $socialMedia)
				@include("admin.profile.partials.form.social-media-row", [
					"key"				 =>	$socialMediaKey,
					"socialTypes"		 =>	$socialTypes,
					"socialMedia"		 =>	$socialMedia
				])
			@empty
			@endforelse
			
		</div>
		<div class="row mt-2">
			<div class="col-12">
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="socialMediaTemplate"
					data-append="socialMediaFields"
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