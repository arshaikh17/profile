<div class="form-group" id="responsibility_row_{{ $key }}">
	<div class="row">
		<div class="col-11">
			<input
				type="text"
				name="responsibilities[]"
				value="{{ $experience->end_date }}"
				class="form-control"
				placeholder="Briefly write about your responsibility"
				required
			/>
		</div>
		<div class="col-1">
			<a
				class="float-right btn btn-sm btn-danger text-white remove-template"
				data-id="responsibility_row_{{ $key }}"
			>
				<i class="fas fa-times-circle"></i>
			</a>
		</div>
	</div>
</div>