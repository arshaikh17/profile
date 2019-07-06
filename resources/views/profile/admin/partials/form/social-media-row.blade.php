<div class="row social-row border pt-2 pb-2 mb-2" id="social_row_{{ $key }}">
	
	<input type="hidden" name="ids[]" value="{{ isset($socialMedia) ? $socialMedia->id : '' }}" />
	
	<div class="col-md-5">
		<label>URL</label>
		<input 
			type="text" 
			name="urls[]" 
			class="form-control form-control-sm" 
			value="{{ isset($socialMedia) ? $socialMedia->url : '' }}"
			required 
		/>
	</div>
	
	<div class="col-md-3">
		<label>Icon</label>
		<input 
			type="text" 
			name="icons[]" 
			class="form-control form-control-sm" 
			value="{{ isset($socialMedia) ? $socialMedia->icon : '' }}"
			required 
		/>
	</div>
	
	<div class="col-md-3">
		<label>Type</label>
		<select name="type_ids[]" class="form-control form-control-sm" required>
			<option disabled selected>Select Type</option>
			@forelse ($socialTypes as $socialTypeKey => $socialType)
			<option 
				value="{{ $socialTypeKey }}"
				{{ isset($socialMedia) && $socialMedia->type_id == $socialTypeKey ? "selected" : "" }}
			>{{ $socialType }}</option>
			@empty
			@endforelse
		</select>
	</div>
	
	<div class="col-md-1">
		<label>Del?</label>
		<a
			class="float-right btn btn-sm btn-danger text-white remove-template"
			data-id="social_row_{{ $key }}"
		>
			<i class="fas fa-times-circle"></i>
		</a>
	</div>
</div>