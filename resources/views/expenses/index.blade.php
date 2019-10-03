@extends("layouts.expenses")

@section("content")
<div class="container">
	<div class="row pb-3">
		<div class="col-md-6">
			<p class="text-30 font-weight-400">
				<i class="far fa-calendar-alt text-info shadow p-3"></i>
				<span>{{ $date->format("M, Y") }}</span>
			</p>
		</div>
		<div class="col-md-6 mt-3">
			<a
				href="#"
				class="btn btn-sm btn-outline-info"
				data-toggle="modal"
				data-target="#budgetModal"
			>
				Budget
			</a>
			<a
				href="#"
				class="btn btn-sm btn-outline-info"
				data-toggle="modal"
				data-target="#expenseModal"
			>
				Expense
			</a>
			<a
				href="#"
				class="btn btn-sm btn-outline-info"
				data-toggle="modal"
				data-target="#tagsModal"
			>
				Tags
			</a>
			<a
				href="#"
				class="btn btn-sm btn-outline-info"
				data-toggle="modal"
				data-target="#billsModal"
			>
				Pay Bill
			</a>
			<a
				href="#"
				class="btn btn-sm btn-outline-info"
				data-toggle="modal"
				data-target="#personModal"
			>
				Add Person
			</a>
		</div>
	</div>
	
	<!-- THIS MONTH -->
	<div class="card mt-3 shadow">
		<div class="card-header hover-link text-center">
			<h5
				data-toggle="collapse"
				data-target="#statisticsStrip"
			>
				This Month
			</h5>
		</div>
		<div class="collapse show" id="statisticsStrip">
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-md-4 statistics-card">
						<div class="p-4 form-inline text-center justify-content-center">
							<i class="fas fa-chart-bar text-30 mr-2"></i>
							<div>
								<span>Budget</span>
								<p class="text-30 font-weight-800">
									<sub>£</sub><span>{{ $budget ? number_format($budget->amount) : "Not set" }}</span>
								</p>
							</div>
						</div>
					</div>
					<div
						class="col-12 col-md-4 statistics-card hover-link"
						data-toggle="modal"
						data-target="#allExpensesModal"
					>
						<div class="p-4 form-inline justify-content-center">
							<i class="fas fa-shopping-cart text-30 mr-2"></i>
							<div>
								<span>Spent</span>
								<p class="text-30 font-weight-800">
									<sub>£</sub><span>{{ number_format($totalAmountSpent) }}</span>
								</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 statistics-card">
						<div class="p-4 form-inline justify-content-center">
							<i class="fas fa-chart-bar text-30 mr-2"></i>
							<div>
								<span>Remaining</span>
								<p class="text-30 font-weight-800">
									<sub>£</sub><span class="text-info">{{ number_format($remaining) }}</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body text-center">
				<div class="col-12">
					<div class="row">
						<div
							class="col-md-4 hover-link"
							data-toggle="modal"
							data-target="#savingModal"
						>
							<div class="statistics-strip">
								<p>Savings</p>
								<p class="text-30"><sub>£</sub>{{ $saving ? $saving->amount : 0 }}</p>
							</div>
						</div>
						<div
							class="col-md-4 hover-link"
							data-toggle="modal"
							data-target="#billsModal"
						>
							<div class="statistics-strip">
								<p>Bill Paid</p>
								<p class="text-30"><sub>£</sub>{{ number_format($totalBillsPaid) }}</p>
							</div>
						</div>
						<div
							class="col-md-4 hover-link"
							data-toggle="modal"
							data-target="#allowancesModal"
						>
							<div class="statistics-strip">
								<p>Allowances</p>
								<p class="text-30"><sub>£</sub>{{ number_format($totalAllowances) }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- WHERE I SPENT -->
	<div class="card mt-3 shadow">
		<div class="card-header hover-link text-center">
			<h5
				data-toggle="collapse"
				data-target="#expensesTable"
			>
				Where I Spent
			</h5>
		</div>
		<div class="collapse show" id="expensesTable">
			<div class="card-body">
				<table class="table table-sm table-hover table-striped datatables">
					<thead class="bg-info text-white">
						<tr>
							<th>Tag</th>
							<th>Amount</th>
							<th>Spent At</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($expenditures as $expenditure)
							<tr
								class="hover-link"
								data-values="{{ $expenditure }}"
							>
								<td>
									{{ $expenditure->tag ? $expenditure->tag->name : "Else" }}
								</td>
								<td>£{{ $expenditure->amount }}</td>
								<td>{{ \Carbon\Carbon::parse($expenditure->date)->format("M dS, Y") }}</td>
								<td class="text-center">
									<form method="POST" action="{{ route('expenses.expenditures.destroy', [$expenditure]) }}">
										{{ csrf_field() }}
										<button
											type="submit"
											class="btn btn-sm btn-danger"
											data-toggle="tooltip"
											title="Delete this expenditure"
										>
											<i class="fas fa-trash"></i>
										</button>
									</form>
								</td>
							</tr>
						@empty
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<!-- EXPENSES BY TAGS -->
	<div class="card mt-3 shadow">
		<div class="card-header hover-link text-center">
			<h5
				data-toggle="collapse"
				data-target="#spendingByTags"
			>
				Spending By Tags
			</h5>
		</div>
		<div class="collapse show" id="spendingByTags">
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<canvas
							class="chart"
							data-datasets="{{ json_encode($charts["byTags"]) }}"
							data-type="pie"
						></canvas>
					</div>
					<div class="col-md-6">
						@foreach ($expendituresByTags as $expendituresByTag)
							<div class="chip mr-1">
								<div class="chip-content">{{ $expendituresByTag->name }}</div>
								<div class="chip-head">£{{ number_format($expendituresByTag->total) }}</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- EXPENSES BY DAYS -->
	<div class="card mt-3 shadow">
		<div class="card-header hover-link text-center">
			<h5
				data-toggle="collapse"
				data-target="#spendingByDays"
			>
				Spending By Days
			</h5>
		</div>
		<div class="collapse show" id="spendingByDays">
			<div class="card-body">
				<canvas
					class="chart"
					data-datasets="{{ json_encode($charts["allExpenses"]) }}"
					data-type="bar"
				></canvas>
			</div>
		</div>
	</div>
	
	<!-- MONEY TO RETURN -->
	<div class="card mt-3 shadow">
		<div class="card-header hover-link text-center">
			<h5
				data-toggle="collapse"
				data-target="#paymentReturnStatistics"
			>
				Money to Return
			</h5>
		</div>
		<div class="collapse show" id="paymentReturnStatistics">
			<div class="card-body">
				<table class="table table-sm table-hover table-striped datatables">
					<thead class="bg-info text-white">
						<tr>
							<th>Person</th>
							<th>Amount</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse ($persons as $person)
							<tr>
								<td>
									<a
										href="{{ route("generals.persons.show", [$person]) }}"
										title="{{ $person->name }}"
									>
										{{ $person->name }}
									</a>
								</td>
								<td>£{{ number_format($person->debt) }}</td>
								<td>
									<a
										class="btn btn-sm btn-info text-white hover-link paymentDebt"
										data-person="{{ $person }}"
										data-url="{{ route("expenses.payments.persons.debts.history", $person) }}"
									>
										debt
									</a>
									<a
										class="btn btn-sm btn-info text-white hover-link paymentDebtReturn"
										data-person="{{ $person }}"
										data-url="{{ route("expenses.payments.persons.loans.history", $person) }}"
									>
										loan
									</a>
								</td>
							</tr>
						@empty
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@include("expenses.partials.modals.tags-modal")
@include("expenses.partials.modals.budget-modal")
@include("expenses.partials.modals.expense-modal")
@include("expenses.partials.modals.bills-modal")
@include("expenses.partials.modals.allowances-modal")
@include("expenses.partials.modals.saving-modal")
@include("expenses.partials.modals.payment-debt-modal")
@include("expenses.partials.modals.payment-loan-modal")
@include("generals.partials.modals.person-form-modal")

@endsection