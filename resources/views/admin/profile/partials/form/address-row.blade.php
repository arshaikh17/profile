<div class="row address-row border pt-2 pb-2 mb-2" id="address_row_{{ $key }}">
	
	<input type="hidden" name="ids[]" value="{{ isset($address) ? $address->id : '' }}" />
	
	<div class="col-md-12">
		<label>Title</label>
		<input 
			type="text" 
			name="titles[]" 
			class="form-control form-control-sm" 
			value="{{ isset($address) ? $address->title : '' }}"
			required 
		/>
	</div>
	
	<div class="col-md-12">
		<label>Address</label>
		<input 
			type="text" 
			name="addresses[]" 
			class="form-control form-control-sm" 
			value="{{ isset($address) ? $address->address : '' }}"
			required 
		/>
	</div>
	<div class="col-md-6">
		<label>City</label>
		<input 
			type="text" 
			name="cities[]" 
			class="form-control form-control-sm" 
			value="{{ isset($address) ? $address->city : '' }}"
			required 
		/>
	</div>
	<div class="col-md-6">
		<label>State</label>
		<input 
			type="text" 
			name="states[]" 
			class="form-control form-control-sm" 
			value="{{ isset($address) ? $address->state : '' }}"
			required 
		/>
	</div>
	<div class="col-md-12">
		<label>Country</label>
		<input 
			type="text" 
			name="countries[]" 
			class="form-control form-control-sm" 
			value="{{ isset($address) ? $address->country : '' }}"
			required 
		/>
	</div>
	<div class="col-md-6">
		<label>Postcode</label>
		<input 
			type="text" 
			name="postcodes[]" 
			class="form-control form-control-sm" 
			value="{{ isset($address) ? $address->postcode : '' }}"
			required 
		/>
	</div>
	<div class="col-md-4">
		<label>Primary?
			<input 
				type="hidden" 
				class="form-control" 
				name="is_primary_checks[]" 
				value="{{ $key }}"
			>
			<input 
				type="radio" 
				class="form-control" 
				id="address_primary_check_{{ $key }}" 
				name="is_primary" 
				value="{{ $key }}"
				{{ isset($address) && $address->is_primary ? "checked" : "" }}
			>
		</label>
	</div>
	
	<div class="col-md-2">
		<label>Del?</label>
		<a
			class="float-right btn btn-sm btn-danger text-white remove-template"
			data-id="address_row_{{ $key }}"
		>
			<i class="fas fa-times-circle"></i>
		</a>
	</div>
</div>