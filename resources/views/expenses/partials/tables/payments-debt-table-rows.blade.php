@forelse ($debts as $debt)
	<tr
		class="hover-link"
		data-values="{{ $debt }}"
	>
		<td>£{{ number_format($debt->amount) }}</td>
		<td>{{ $debt->date }}</td>
		<td class="btn-group defaultActions">
			<form
				method="POST"
				action="{{ $debt->is_paid ? route('expenses.payments.persons.debts.mark-unpaid', [$debt->person, $debt]) : route('expenses.payments.persons.debts.mark-paid', [$debt->person, $debt]) }}"
			>
				{{ csrf_field() }}
				<button
					type="submit"
					class="btn btn-sm btn-info"
					data-toggle="tooltip"
					title="Mark {{ $debt->is_paid ? "unpaid" : "paid" }}"
				>
					<i class="fa fa-{{ $debt->is_paid ? 'times' : 'check' }}"></i>
				</button>
			</form>
			<form method="POST" action="{{ route('expenses.payments.persons.debts.destroy', [$debt->person, $debt]) }}" class="ml-1">
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