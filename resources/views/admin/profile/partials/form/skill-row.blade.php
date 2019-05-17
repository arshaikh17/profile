<div class="row social-row border pt-2 pb-2 mb-2" id="skill_row_{{ $key }}">
	
	<input type="hidden" name="ids[]" value="{{ isset($skill) ? $skill->id : '' }}" />
	
	<div class="col-md-8">
		<label>Title</label>
		<input 
			type="text" 
			name="titles[]" 
			class="form-control form-control-sm" 
			value="{{ isset($skill) ? $skill->title : '' }}"
			required 
		/>
	</div>
	
	<div class="col-md-4">
		<label>Experience</label>
		<input 
			type="text" 
			name="experiences[]" 
			class="form-control form-control-sm" 
			value="{{ isset($skill) ? $skill->experience : '' }}" 
		/>
	</div>
	
	<div class="col-md-5">
		<label>Experience Level</label>
		<select name="experience_level_ids[]" class="form-control form-control-sm">
			<option disabled selected>Select Level</option>
			@forelse ($skillLevels as $skillLevelKey => $skillLevel)
			<option 
				value="{{ $skillLevelKey }}"
				{{ isset($skill) && $skill->experience_level_id == $skillLevelKey ? "selected" : "" }}
			>{{ $skillLevel }}</option>
			@empty
			@endforelse
		</select>
	</div>
	
	<div class="col-md-5">
		<label>Skill Category</label>
		<select name="skill_category_ids[]" class="form-control form-control-sm" required>
			<option disabled selected>Select Level</option>
			@forelse ($skillCategories as $skillCategoryKey => $skillCategory)
			<option 
				value="{{ $skillCategoryKey }}"
				{{ isset($skill) && $skill->skill_category_id == $skillCategoryKey ? "selected" : "" }}
			>{{ $skillCategory }}</option>
			@empty
			@endforelse
		</select>
	</div>
	
	<div class="col-md-1">
		<label>Del?</label>
		<a
			class="float-right btn btn-sm btn-danger text-white remove-template"
			data-id="skill_row_{{ $key }}"
		>
			<i class="fas fa-times-circle"></i>
		</a>
	</div>
</div>