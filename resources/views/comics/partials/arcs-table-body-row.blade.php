<tr>
	<td>
		<a
			href="{{ route('comics.admin.arcs.show', $arc) }}"
			title="{{ $arc->title }}"
		>
			{{ $arc->title }}
		</a>
	</td>
	<td>
		<span class="badge badge-{{ $arc->is_completed ? 'primary' : 'danger' }}">{{ $arc->is_completed ? "Complete" : "Incomplete" }}</span>
	</td>
	<td>
		{{ $arc->series ? $arc->series->title : "" }}
	</td>
	<td>
		<a
			href="{{ route('comics.admin.arcs.edit', [$arc]) }}"
			class="btn btn-sm btn-light"
		>
			Edit
		</a>
		<a
			href="{{ route('comics.issues.createWithSeriesAndArc', [$arc->series, $arc]) }}"
			class="btn btn-sm btn-dark"
		>
			Add Issue
		</a>
	</td>
</tr>