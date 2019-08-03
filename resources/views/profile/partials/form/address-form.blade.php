<form
	method="POST"
	action="{{ route('profile.update', 'address') }}"
	>
	<div class="card-body">
		<div id="addressFields">
			{{ csrf_field() }}
			@forelse ($addresses as $addressKey => $address)
				@include("profile.partials.form.address-row", [
					"key"				 =>	$addressKey,
					"address"			 =>	$address
				])
			@empty
			@endforelse
		</div>
		<div class="row mt-2">
			<div class="col-12">
				<a
					href="#"
					class="btn btn-sm btn-primary float-right add-template"
					data-template="addressTemplate"
					data-append="addressFields"
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