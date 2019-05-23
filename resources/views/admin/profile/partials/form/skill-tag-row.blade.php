<div class="col-sm-6 col-md-4 form-group" id="skill_tag_row_{{ $key }}">
	@if (isset($skillTag))
		<input
			type="hidden"
			value="{{ $skillTag->id }}"
			name="existing_skill_tags[]"
			required
		/>
	@endif
	<div class="row">
		<div class="col-10">
			<select
				name="skill_tags[]"
				class="form-control"
				required
			>
				@forelse ($skills as $skill)
					<option
						value="{{ $skill->id }}"
						{{ isset($skillTag) && $skill->id == $skillTag->skill_id ? "selected" : "" }}
					>
						{{ $skill->title . " - " . $skill->category_name }}
					</option>
				@empty
				@endforelse
			</select>
		</div>
		<div class="col-2">
			<a
				class="float-right btn btn-sm btn-danger text-white remove-template"
				data-id="skill_tag_row_{{ $key }}"
			>
				<i class="fas fa-times-circle"></i>
			</a>
		</div>
	</div>
</div>