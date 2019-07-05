<div class="toast" style="position:absolute; bottom:0; right: 0;" data-autohide="false">
	<div class="toast-header">
		<strong class="mr-auto text-{{ $alertType == 'success' ? 'primary' : 'danger' }}">{{ $alertType == "success" ? "Success" : "Fail" }} Alert!</strong>
		<small class="text-muted"></small>
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
	</div>
	<div class="toast-body">
		{{ $message }}
	</div>
</div>