<form
	method="POST"
	action="{{ route('admin.profile.updatePost', 'email') }}"
	>
	<div class="card-body">
		<div id="emailFields">
			{{ csrf_field() }}
			@forelse ($emails as $emailKey => $email)
				@include("admin.profile.partials.form.email-row", [
					"key"				 =>	$emailKey,
					"email"				 =>	$email
				])
			@empty
			@endforelse
		</div>
		<div class="row mt-2">
			<div class="col-12">
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="emailTemplate"
					data-append="emailFields"
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