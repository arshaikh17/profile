<div class="form-group">
	<label>Title</label>
	<input type="text" class="form-control" name="title" value="{{ $budget->title ?? '' }}" required />
</div>
<div class="form-group">
	<label>Amount</label>
	<input type="text" class="form-control" name="amount" value="{{ $budget->amount ?? '' }}" required />
</div>
<div class="form-group">
	<label>Description</label>
	<textarea name="description" class="form-control">{{ $budget->description ?? "" }}</textarea>
</div>