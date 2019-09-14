@extends("layouts.expenses")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1><span class="text-info">{{ $date->format("F") }}</span>, {{ $date->format("Y") }}</h1>
		</div>
		<div class="text-right col-md-6 mt-3">
			<span class="text-info text-20">
				£{{ number_format($remaining) }}
			</span>
			<a
				href="#"
				class="btn btn-sm btn-info"
				data-toggle="modal"
				data-target="#budgetModal"
			>
				Budget
			</a>
			<a
				href="#"
				class="btn btn-sm btn-info"
				data-toggle="modal"
				data-target="#expenseModal"
			>
				Expense
			</a>
			<a
				href="#"
				class="btn btn-sm btn-info"
				data-toggle="modal"
				data-target="#tagsModal"
			>
				Tags
			</a>
			<a
				href="#"
				class="btn btn-sm btn-info"
				data-toggle="modal"
				data-target="#billsModal"
			>
				Pay Bill
			</a>
			<a
				href="#"
				class="btn btn-sm btn-info"
				data-toggle="modal"
				data-target="#personModal"
			>
				Add Person
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-sm-6 statistics-card">
			<div class="card">
				<div class="card-body text-info">
					<h4 class="card-title">Budget</h4>
					<h1 class="card-text">
						@if ($budget)
							£{{ number_format($budget->amount) }}
						@else
							Not set.
						@endif
					</h1>
				</div>
			</div>
		</div>
		<div
			class="col-12 col-sm-6 statistics-card hover-link"
			data-toggle="modal"
			data-target="#allExpensesModal"
		>
			<div class="card">
				<div class="card-body bg-info text-white">
					<h4 class="card-title">Spent</h4>
					<h1 class="card-text">£{{ number_format($totalAmountSpent) }}</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-12 hover-link">
			<h5
				data-toggle="collapse"
				data-target="#statisticsStrip"
			>
				Monthly Allocations
			</h5>
		</div>
		<div class="col-12">
			<div class="row collapse show" id="statisticsStrip">
				<div
					class="col-md-4 hover-link"
					data-toggle="modal"
					data-target="#savingModal"
				>
					<div class="bg-info text-white statistics-strip">
						<p>Savings</p>
						<p class="text-30">£{{ $saving ? $saving->amount : 0 }}</p>
					</div>
				</div>
				<div
					class="col-md-4 hover-link"
					data-toggle="modal"
					data-target="#billsModal"
				>
					<div class="bg-info text-white statistics-strip">
						<p>Bill Paid</p>
						<p class="text-30">£{{ number_format($totalBillsPaid) }}</p>
					</div>
				</div>
				<div
					class="col-md-4 hover-link"
					data-toggle="modal"
					data-target="#allowancesModal"
				>
					<div class="bg-info text-white statistics-strip">
						<p>Allowances</p>
						<p class="text-30">£{{ number_format($totalAllowances) }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-4">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-10">
							<h5
								class="hover-link"
								data-toggle="collapse"
								data-target="#lastExpenditures"
							>
								Last 10 Expenditures
							</h5>
						</div>
						<div class="col-2">
							<a
								href="#"
								class="float-right btn btn-sm btn-info"
								data-toggle="modal"
								data-target="#allExpensesModal"
							>
								All
							</a>
						</div>
					</div>
				</div>
				<div class="col-12 collapse show" id="lastExpenditures">
					<table
						class="table table-sm table-hover table-striped table-bordered"
					>
						<thead>
							<tr>
								<th>Spent On</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							@php
								$count	 =	0;
							@endphp
							
							@forelse ($expenditures as $expenditure2)
								@if ($count == 10) @break @endif
								
								<tr>
									<td>{{ $expenditure2->tag ? $expenditure2->tag->name : "Else" }}</td>
									<td>£{{ $expenditure2->amount }}</td>
								</tr>
								
								@php
									$count++;
								@endphp
							@empty
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-12">
					<h5
						class="hover-link"
						data-toggle="collapse"
						data-target="#expendituresByTags"
					>
						Expenditures by Tags
					</h5>
				</div>
				<div class="col-12 collapse show" id="expendituresByTags">
					<div class="row mt-3">
						@foreach ($expendituresByTags as $expendituresByTag)
							<div class="col-12 col-md-4">
								<div class="chip">
									<div class="chip-content">{{ $expendituresByTag->name }}</div>
									<div class="chip-head">£{{ number_format($expendituresByTag->total) }}</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-12">
			<h5
				class="hover-link"
				data-toggle="collapse"
				data-target="#paymentReturnStatistics"
			>
				Money to Return
			</h5>
		</div>
		<div class="col-12">
			<div class="row collapse show" id="paymentReturnStatistics">
				@forelse ($persons as $person)
					<div class="col-6 col-md-3">
						<div class="statistics-strip border shadow h-auto">
							<p class="text-20">
								{{ $person->name }}
								<a
									class="btn btn-sm btn-info text-white hover-link paymentDebt"
									data-person="{{ $person }}"
									data-url="{{ route("expenses.payments.persons.history", $person) }}"
								>
									<i class="fas fa-plus"></i>
								</a>
							</p>
							<p class="text-info text-30">£{{ number_format($person->debt) }}</p>
						</div>
					</div>
				@empty
				@endforelse
			</div>
		</div>
	</div>
</div>

@include("expenses.partials.modals.tags-modal")
@include("expenses.partials.modals.budget-modal")
@include("expenses.partials.modals.expense-modal")
@include("expenses.partials.modals.all-expenses-modal")
@include("expenses.partials.modals.bills-modal")
@include("expenses.partials.modals.allowances-modal")
@include("expenses.partials.modals.saving-modal")
@include("expenses.partials.modals.payment-debt-modal")
@include("generals.partials.modals.person-form-modal")

@endsection