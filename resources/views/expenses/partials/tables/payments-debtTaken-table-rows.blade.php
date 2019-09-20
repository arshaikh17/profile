@forelse ($debtTakens as $debtTaken)
	<tr
		class="hover-link"
		data-values="{{ $debtTaken }}"
	>
		<td>£{{ number_format($debtTaken->amount) }}</td>
		<td>{{ $debtTaken->date }}</td>
		<td class="btn-group defaultActions">
			<form
				method="POST"
				action="{{ $debtTaken->is_paid ? route('expenses.payments.persons.debts.takens.mark-unpaid', [$debtTaken->person, $debtTaken]) : route('expenses.payments.persons.debts.takens.mark-paid', [$debtTaken->person, $debtTaken]) }}"
			>
				{{ csrf_field() }}
				<button
					type="submit"
					class="btn btn-sm btn-info"
					data-toggle="tooltip"
					title="Mark {{ $debtTaken->is_paid ? "unpaid" : "paid" }}"
				>
					<i class="fa fa-{{ $debtTaken->is_paid ? 'times' : 'check' }}"></i>
				</button>
			</form>
			<form method="POST" action="{{ route('expenses.payments.persons.debts.takens.destroy', [$debtTaken->person, $debtTaken]) }}" class="ml-1">
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