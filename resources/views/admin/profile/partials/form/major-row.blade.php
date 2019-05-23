<div class="form-group" id="major_row_{{ $key }}">
	<div class="row">
		<div class="col-11">
			<input
				type="text"
				name="majors[]"
				value="{{ isset($major) ? $major : '' }}"
				class="form-control"
				placeholder="Name of your major"
				required
			/>
		</div>
		<div class="col-1">
			<a
				class="float-right btn btn-sm btn-danger text-white remove-template"
				data-id="major_row_{{ $key }}"
			>
				<i class="fas fa-times-circle"></i>
			</a>
		</div>
	</div>
</div>