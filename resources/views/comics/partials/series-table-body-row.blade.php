<tr>
	<td>
		<a
			href="{{ route('comics.series.show', $series) }}"
			title="{{ $series->title }}"
		>
			{{ $series->title }}
		</a>
	</td>
	<td>
		<span class="badge badge-{{ $series->is_completed ? 'primary' : 'danger' }}">{{ $series->is_completed ? "Complete" : "Incomplete" }}</span>
	</td>
	<td>
		<a
			href="{{ route('comics.series.edit', [$series]) }}"
			class="btn btn-sm btn-light"
		>
			Edit
		</a>
		<a
			href="{{ route('comics.arcs.create', [$series]) }}"
			class="btn btn-sm btn-secondary"
		>
			Add Arc
		</a>
		<a
			href="{{ route('comics.issues.createWithSeriesAndArc', [$series]) }}"
			class="btn btn-sm btn-dark"
		>
			Add Issue
		</a>
	</td>
</tr>