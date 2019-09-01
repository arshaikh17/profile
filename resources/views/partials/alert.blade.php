<div class="alert alert-{{ $alertType == 'success' ? 'primary' : 'danger' }} alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>{{ $alertType == "success" ? "Success" : "Fail" }}!</strong> {{ $message }}
</div>
