@extends("layouts.comics")

@section("content")
<div class="row">
	<div class="col-12">
		<h1>
			Viewing Comic Issue.
			<a href="{{ route('comics.issues.edit', $issue) }}" class="btn btn-dark btn-sm">Edit</a>
		</h1>
	</div>
	<div class="col-5 mt-3">
		<img
			src="{{ $issue->cover ? asset('uploads/comics/issues/' . $issue->cover) : asset('defaults/no_images.png')}}"
			class="img-fluid"
		/>
	</div>
	<div class="col-7">
		<h1>#{{ $issue->issue }}</h1>
		<div>
			<table class="table table-hover table-condensed">
				<tbody>
					<tr>
						<td>Title</td>
						<td>{{ $issue->title }}</td>
					</tr>
					<tr>
						<td>Arc</td>
						<td>{{ $issue->arc ? $issue->arc->title : "" }}</td>
					</tr>
					<tr>
						<td>Series</td>
						<td>{{ $issue->series ? $issue->series->title : "" }}</td>
					</tr>
					<tr>
						<td>Character</td>
						<td>
							<a
								href="{{ route('comics.characters.show', $issue->series->character) }}"
							>
								{{ $issue->series ? $issue->series->character->name : "" }}
							</a>
						</td>
					</tr>
					<tr>
						<td>Wislist</td>
						<td>{{ $issue->is_wishlist ? "Yes" : "NO" }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection