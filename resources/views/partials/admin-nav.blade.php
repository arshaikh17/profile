<nav class="navbar navbar-expand-sm sticky-top bg-dark">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link btn btn-sm btn-primary" href="{{ route('profile.admin.index') }}">Profile Management</a>
		</li>
		<li class="nav-item ml-2">
			<a class="nav-link btn btn-sm btn-secondary" href="{{ route('comics.admin.index') }}">Comics Area</a>
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
</nav>