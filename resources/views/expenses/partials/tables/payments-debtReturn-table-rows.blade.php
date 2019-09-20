@forelse ($debtReturns as $debtReturn)
	<tr
		class="hover-link"
		data-values="{{ $debtReturn }}"
	>
		<td>£{{ number_format($debtReturn->amount) }}</td>
		<td>{{ $debtReturn->date }}</td>
		<td class="btn-group defaultActions">
			<form
				method="POST"
				action="{{ $debtReturn->is_paid ? route('expenses.payments.persons.debts.returns.mark-unpaid', [$debtReturn->person, $debtReturn]) : route('expenses.payments.persons.debts.returns.mark-paid', [$debtReturn->person, $debtReturn]) }}"
			>
				{{ csrf_field() }}
				<button
					type="submit"
					class="btn btn-sm btn-info"
					data-toggle="tooltip"
					title="Mark {{ $debtReturn->is_paid ? "unpaid" : "paid" }}"
				>
					<i class="fa fa-{{ $debtReturn->is_paid ? 'times' : 'check' }}"></i>
				</button>
			</form>
			<form method="POST" action="{{ route('expenses.payments.persons.debts.returns.destroy', [$debtReturn->person, $debtReturn]) }}" class="ml-1">
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