<div class="item-grid">
	<div class="item-image">
		<a href="#">
			<img class="pic-1" src="{{ $image }}">
		</a>
		<ul class="actions">
			<li>
				@if (isset($ownedAction))
					<form
						method="POST"
						action="{{ $ownedAction }}"
					>
						{{ csrf_field() }}
						<button
							type="submit"
							data-toggle="tooltip"
							data-placement="bottom"
							title="Owned?"
						>
							<i class="fa fa-check"></i>
						</button>
					</form>
				@endif
			</li>
		</ul>
	</div>
	<div class="item-content">
		@if (isset($subtitle))<h3 class="title">{!! $subtitle !!}</h3>@endif
		<div class="price">
			{{ $title }}
		</div>
	</div>
</div>