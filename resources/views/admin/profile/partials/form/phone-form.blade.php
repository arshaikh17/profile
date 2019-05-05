<form
	method="POST"
	action="{{ route('admin.profile.updatePost', 'phone') }}"
	>
	<div class="card-body">
		<div id="phoneFields">
			{{ csrf_field() }}
			@forelse ($phones as $phoneKey => $phone)
				@include("admin.profile.partials.form.phone-row", [
					"key"				 =>	$phoneKey,
					"phone"				 =>	$phone
				])
			@empty
			@endforelse
		</div>
		<div class="row mt-2">
			<div class="col-12">
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="phoneTemplate"
					data-append="phoneFields"
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