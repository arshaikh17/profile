<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Expenses</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	@include("partials.modules.jquery3-4-1")
	@include("partials.modules.bootstrap4")
	@include("partials.modules.fontawesome-5-8-1")
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	@include("partials.modules.nprogress")
	@yield("scripts")
	@include("partials.modules.shared")
	<script src="{{ asset('modules/expenses/js/app.js') }}"></script>
	<link href="{{ asset('modules/expenses/css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
	<main id="app">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><span class="text-info">{{ $date->format("F") }}</span>, {{ $date->format("Y") }}</h1>
				</div>
				<div class="text-right col-md-6 mt-3">
					<span class="text-info text-20">
						£{{ number_format(($budget ? $budget->amount : 0) - $totalAmountSpent - $totalBillsPaid) }}
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
						id="addExpense"
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
				<div class="col-12 col-sm-6 statistics-card">
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
						<div class="col-md-4">
							<div class="bg-info text-white statistics-strip">
								<p>Savings</p>
								<p class="text-30">£100</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="bg-info text-white statistics-strip">
								<p>Bill Paid</p>
								<p class="text-30">£{{ number_format($totalBillsPaid) }}</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="bg-info text-white statistics-strip">
								<p>Savings</p>
								<p class="text-30">£100</p>
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
										$count				 =	0;
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
						data-target="#otherStatistics"
					>
						Other Statistics
					</h5>
				</div>
				<div class="col-12">
					<div class="row collapse show" id="otherStatistics">
						<div class="col-4">
							<span class="text-20">Owned</span>
							<p class="text-info text-30">
								£4000
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<div class="modal" id="tagsModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tags</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h6
						class="hover-link"
						data-toggle="collapse"
						data-target="#tagForm"
					>
						Tag Form
					</h6>
					<div class="collapse" id="tagForm">
						<form method="POST" action="{{ route('expenses.tags.store') }}">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control form-control-sm" required />
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control form-control-sm" required></textarea>
							</div>
							<div class="form-group float-right">
								<input type="submit" class="btn btn-sm btn-info" value="Save" />
							</div>
						</form>
					</div>
					<div>
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>Tag</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($tags as $tag)
									<tr class="hover-link">
										<td>{{ $tag->name }}</td>
									</tr>
								@empty
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" id="budgetModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Month's Budget</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					
					<div>
						@if ($budget)
							<p>
								Budget you've set for this month.
							</p>
							<h3 class="text-info">£{{ number_format($budget->amount) }}</h3>
						@else
							<p>
								Budget not set, yet?
							</p>
						@endif
					</div>
					<div>
						<p class="hover-link" data-toggle="collapse" data-target="#editBudgetForm">It's okay if you wish to update it.</p>
						<div class="collapse" id="editBudgetForm">
							<form action="{{ $budget ? route('expenses.budgets.update', $budget) : route('expenses.budgets.store') }}" method="POST">
								{{ csrf_field() }}
								
								@include("expenses.partials.budget-form-fields", [
									"budget"			 =>	$budget,
								])
								
								<div class="form-group text-right">
									<input type="submit" class="btn btn-info" value="Save" />
								</div>
							</form>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" id="expenseModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Expense</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form
					method="POST"
					data-action-add="{{ route('expenses.expenditures.store') }}"
					data-action-edit="{{ route('expenses.expenditures.update', -1) }}"
				>
					{{ csrf_field() }}
					
					<div class="modal-body row">
						<div class="form-group col-md-6">
							<label>Amount</label>
							<input type="text" name="amount" class="form-control form-control-sm" required />
						</div>
						<div class="form-group col-md-6">
							<label>Tag</label>
							<select name="tag_id" class="form-control form-control-sm">
								<option value="">No tag</option>
								@forelse ($tags as $tag)
									<option value="{{ $tag->id }}">{{ $tag->name }}</option>
								@empty
								@endforelse
							</select>
						</div>
						<div class="form-group col-12">
							<label>Description</label>
							<textarea name="description" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-info" value="Save" />
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="modal" id="allExpensesModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">All Expenses</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div>
						<table class="table table-sm table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>Tag</th>
									<th>Amount</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($expenditures as $expenditure)
									<tr>
										<td
											class="hover-link expenditureRow"
											data-data="{{ $expenditure }}"
										>
											{{ $expenditure->tag ? $expenditure->tag->name : "Else" }}
										</td>
										<td>£{{ $expenditure->amount }}</td>
										<td class="text-center">
											<form method="POST" action="{{ route('expenses.expenditures.destroy', [$expenditure]) }}">
												{{ csrf_field() }}
												<input
													type="submit"
													class="btn btn-sm btn-danger"
													value="X"
												/>
											</form>
										</td>
									</tr>
								@empty
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" id="billsModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Bills of this Month</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<h6
						class="hover-link"
						data-toggle="collapse"
						data-target="#billsForm"
					>
						Bills Form
					</h6>
					<div class="collapse" id="billsForm">
						<form method="POST" action="{{ route('expenses.bills.store') }}">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-4">
									<div class="form-group">
										<label>Amount</label>
										<input type="text" name="amount" class="form-control form-control-sm" required />
									</div>
								</div>
								<div class="col-8">
									<div class="form-group">
										<label>Bill Of</label>
										<select name="bill_of" class="form-control form-control-sm" required>
											<option>Select bill</option>
											@forelse ($billNames as $billKey => $billName)
												<option value="{{ $billKey }}">{{ $billName }}</option>
											@empty
											@endforelse
										</select>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control form-control-sm" required></textarea>
							</div>
							
							<div class="form-group float-right">
								<input type="submit" class="btn btn-sm btn-info" value="Save" />
							</div>
						</form>
					</div>
					<div>
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>Bills paid this month</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($bills as $bill)
									<tr class="hover-link">
										<td>{{ $bill->bill }}, <span class="text-info">£{{ $bill->amount }}</span></td>
									</tr>
								@empty
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>