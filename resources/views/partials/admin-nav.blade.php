<nav class="navbar navbar-expand-md sticky-top bg-dark">
	<button
		class="navbar-toggler text-white"
		type="button"
		data-toggle="collapse"
		data-target="#collapsibleNavbar"
	>
		<i class="fas fa-angle-double-down"></i>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link btn btn-sm btn-primary" href="{{ route('profile.index') }}">Profile Management</a>
			</li>
			<li class="nav-item ml-2">
				<a class="nav-link btn btn-sm btn-secondary" href="{{ route('comics.index') }}">Comics Area</a>
			</li>
			<li class="nav-item ml-2">
				<a class="nav-link btn btn-sm btn-info text-white" href="{{ route('expenses.index') }}">Expenses</a>
			</li>
			<li class="nav-item ml-2">
				<a class="nav-link btn btn-sm btn-success text-white" href="{{ route('generals.index') }}">Generals</a>
			</li>
			<li class="nav-item ml-2">
				<a class="nav-link btn btn-sm btn-light" href="{{ route('wishlists.index') }}">Wishlists</a>
			</li>
			<li class="nav-item ml-2">
				<a class="nav-link btn btn-sm btn-orange text-white" href="{{ route('tracker.index') }}">Tracker</a>
			</li>
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a
					class="nav-link btn btn-sm btn-light"
					href="{{ route('logout') }}"
					onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
				>
					<i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</div>
</nav>