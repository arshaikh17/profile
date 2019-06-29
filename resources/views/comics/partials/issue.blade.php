<div class="issue">
	<div class="image">
		<img
			src="{{ file_exists('uploads/comics/issues/' . $issue->cover) ? asset('uploads/comics/issues/' . $issue->cover) : asset('defaults/no_image.png') }}"
			class="img img-fluid"
			title="{{ $issue->title }}"
		/>
	</div>
	<div class="details">
		<p class="name">{{ $issue->title }}</p>
		<p class="issue-number">#{{ $issue->issue }}</p>
	</div>
	<div class="action">
		<a
			href="{{ route('comics.admin.issues.edit', $issue) }}"
			title="{{ $issue->title }}"
			class="btn btn-sm btn-primary"
		>
			Edit
		</a>
	</div>
</div>