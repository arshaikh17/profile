@forelse ($loans as $loan)
	<tr
		class="hover-link"
		data-values="{{ $loan }}"
	>
		<td>£{{ number_format($loan->amount) }}</td>
		<td>{{ $loan->date }}</td>
		<td class="btn-group defaultActions">
			<form
				method="POST"
				action="{{ $loan->is_paid ? route('expenses.payments.persons.loans.mark-unpaid', [$loan->person, $loan]) : route('expenses.payments.persons.loans.mark-paid', [$loan->person, $loan]) }}"
			>
				{{ csrf_field() }}
				<button
					type="submit"
					class="btn btn-sm btn-info"
					data-toggle="tooltip"
					title="Mark {{ $loan->is_paid ? "unpaid" : "paid" }}"
				>
					<i class="fa fa-{{ $loan->is_paid ? 'times' : 'check' }}"></i>
				</button>
			</form>
			<form method="POST" action="{{ route('expenses.payments.persons.loans.destroy', [$loan->person, $loan]) }}" class="ml-1">
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