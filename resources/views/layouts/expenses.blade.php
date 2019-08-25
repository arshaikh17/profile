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
</head>
<body>
	<main id="app">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1><span class="text-info">August</span>, 2019</h1>
				</div>
				<div class="col-md-6 mt-3">
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
							<h1 class="card-text">£{{ number_format(100) }}</h1>
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
								<p>Returned</p>
								<p class="text-30">£101</p>
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
									<tr>
										<td>Comics</td>
										<td>£10</td>
									</tr>
									<tr>
										<td>Food</td>
										<td>£25</td>
									</tr>
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
								@foreach (array_fill(0, 6, 1) as $a)
									<div class="col-12 col-md-4">
										<div class="chip">
											<div class="chip-content">Comics</div>
											<div class="chip-head">£1100</div>
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
				<form>
					<div class="modal-body">
						<h6
							class="hover-link"
							data-toggle="collapse"
							data-target="#tagForm"
						>
							Tag Form
						</h6>
						<div class="collapse" id="tagForm">
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
						</div>
						<div>
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th>Tag</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Comics</td>
									</tr>
									<tr>
										<td>Food</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
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
				<form>
					<div class="modal-body row">
						<div class="form-group col-md-6">
							<label>Amount</label>
							<input type="text" name="amount" class="form-control form-control-sm" required />
						</div>
						<div class="form-group col-md-6">
							<label>Tag</label>
							<select name="tag" class="form-control form-control-sm">
								<option value="">No tag</option>
								<option value="1">Comics</option>
								<option value="2">Food</option>
							</select>
						</div>
						<div class="form-group col-12">
							<label>Description</label>
							<textarea name="description" class="form-control form-control-sm"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-info" value="Save" />
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
				<form>
					<div class="modal-body">
						<div>
							<table class="table table-sm table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th>Tag</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Comics</td>
										<td>£51</td>
									</tr>
									<tr>
										<td>Food</td>
										<td>£12</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>