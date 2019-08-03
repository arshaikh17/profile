<div class="form-group col-6" id="gallery_item_row_{{ $key }}">
	<div class="row">
		<div class="col-10">
			<input
				type="text"
				name="gallery_titles[]"
				value="{{ isset($gallery) ? $gallery->title : '' }}"
				class="form-control"
				placeholder="Title of this image"
				required
			/>
		</div>
		<div class="col-2">
			<a
				class="float-right btn btn-sm btn-danger text-white remove-template"
				data-id="gallery_item_row_{{ $key }}"
			>
				<i class="fas fa-times-circle"></i>
			</a>
		</div>
		<div class="col-12">
			@if (isset($gallery))
				<input
					type="hidden"
					value="{{ $gallery->id }}"
					name="existing_gallery_ids[]"
					required
				/>
				<img
					src="{{ $gallery->image ? asset('uploads/profile/galleries/' . $gallery->image) : asset('defaults/no_image.png') }}"
					class="img-responsive"
					width="250"
				/>
				<input
					type="hidden"
					name="gallery_image_names[]"
					value="{{ $gallery->image }}"
					required
				/>
			@endif
			<input
				type="file"
				name="gallery_images[]"
				value="Upload image"
				{{ isset($gallery) ? "style='display: none;'" : "required" }}
			/>
		</div>
	</div>
</div>