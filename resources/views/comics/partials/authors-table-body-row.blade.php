<tr>
	<td>
		<a
			href="{{ route('comics.authors.show', $author) }}"
			title="{{ $author->name }}"
		>
			{{ $author->name }}
		</a>
	</td>
	<td>{{ $author->issues->count() }}</td>
	<td>
		<a
			href="{{ route('comics.admin.authors.edit', [$author]) }}"
			class="btn btn-sm btn-light"
		>
			Edit
		</a>
	</td>
</tr>