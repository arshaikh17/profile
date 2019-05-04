@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<a
				href="{{ route('admin.profile.index') }}"
				class="btn btn-default border"
			>
				Profile Management
			</a>
		</div>
		<div class="col-md-12 fixed-bottom">
		<img 
			src="{{ asset('img/bat/batman.png') }}"
			class="img-fluid float-right"
		>
		</div>
	</div>
</div>
@endsection