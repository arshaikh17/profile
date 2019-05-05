<div class="row email-row border pt-2 pb-2 mb-2" id="{{ $key }}">
	
	<input type="hidden" name="ids[]" value="{{ isset($email) ? $email->id : '' }}" />
	
	<div class="col-md-4">
		<label>Title</label>
		<input 
			type="text" 
			name="titles[]" 
			class="form-control form-control-sm" 
			value="{{ isset($email) ? $email->title : '' }}"
			required 
		/>
	</div>
	
	<div class="col-md-5">
		<label>Email</label>
		<input 
			type="text" 
			name="emails[]" 
			class="form-control form-control-sm" 
			value="{{ isset($email) ? $email->email : '' }}"
			required 
		/>
	</div>
	
	<div class="col-md-2">
		<label>Primary?</label>
		<input 
			type="hidden" 
			class="form-control" 
			name="is_primary_checks[]" 
			value="{{ $key }}"
		>
		<input 
			type="radio" 
			class="form-control" 
			id="email_primary_check_{{ $key }}" 
			name="is_primary" 
			value="{{ $key }}"
			{{ isset($email) && $email->is_primary ? "checked" : "" }}
		>
	</div>
	
	<div class="col-md-1">
		<label>Del?</label>
		<a
			class="float-right btn btn-sm btn-danger text-white remove-template"
			data-id="{{ $key }}"
		>
			<i class="fas fa-times-circle"></i>
		</a>
	</div>
</div>