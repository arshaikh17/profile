<tr>
	<td>
		<a
			href="{{ route('comics.characters.show', $character) }}"
			title="{{ $character->name }}"
		>
			{{ $character->name }}
		</a>
	</td>
	<td>
		{{ count($character->series ?: []) }}
	</td>
	<td>
		{{ count($character->arcs() ?: []) }}
	</td>
	<td>
		{{ count($character->issues() ?: []) }}
	</td>
	<td>
		<a
			href="{{ route('comics.characters.edit', [$character]) }}"
			class="btn btn-sm btn-light"
		>
			Edit
		</a>
	</td>
</tr>