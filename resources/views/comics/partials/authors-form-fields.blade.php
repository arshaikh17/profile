<div class="form-group">
	<label>First Name</label>
	<input
		type="text"
		class="form-control"
		name="{{ isset($subForm) && $subForm ? 'authors[__INDEX__][first_name]' : 'first_name' }}"
		value="{{ isset($new) && $new ? "" : $author->first_name }}"
		required
	/>
</div>
<div class="form-group">
	<label>Surname</label>
	<input
		type="text"
		class="form-control"
		name="{{ isset($subForm) && $subForm ? 'authors[__INDEX__][surname]' : 'surname' }}"
		value="{{isset($new) && $new ? "" : $author->surname }}"
		required
	/>
</div>