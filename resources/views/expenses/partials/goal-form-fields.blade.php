<div class="form-group">
	<label>Amount</label>
	<input type="text" class="form-control" name="amount" value="{{ $goal->amount ?? '' }}" required />
</div>
<div class="form-group">
	<label>Description</label>
	<textarea name="description" class="form-control">{{ $goal->description ?? "" }}</textarea>
</div>