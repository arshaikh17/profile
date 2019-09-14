@forelse ($owes as $owe)
	<tr
		class="hover-link"
		data-values="{{ $owe }}"
	>
		<td>£{{ number_format($owe->amount) }}</td>
		<td>{{ $owe->date }}</td>
		<td class="btn-group defaultActions">
			<form
				method="POST"
				action="{{ $owe->is_paid ? route('expenses.payments.persons.owes.mark-unpaid', [$owe->person, $owe]) : route('expenses.payments.persons.owes.mark-paid', [$owe->person, $owe]) }}"
			>
				{{ csrf_field() }}
				<button
					type="submit"
					class="btn btn-sm btn-info"
					data-toggle="tooltip"
					title="Mark {{ $owe->is_paid ? "unpaid" : "paid" }}"
				>
					<i class="fa fa-{{ $owe->is_paid ? 'times' : 'check' }}"></i>
				</button>
			</form>
			<form method="POST" action="{{ route('expenses.payments.persons.owes.destroy', [$owe->person, $owe]) }}" class="ml-1">
				{{ csrf_field() }}
				<button
					type="submit"
					class="btn btn-sm btn-danger"
					data-toggle="tooltip"
					title="Delete this payment"
				>
					<i class="fas fa-trash"></i>
				</button>
			</form>
		</td>
	</tr>
@empty
@endforelse