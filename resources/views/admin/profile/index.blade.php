@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<ul class="nav nav-tabs flex-column">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#social">My Socials</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-8 col-md-9">
			<div class="card" id="social">
				<div class="card-header" data-toggle="collapse" href="#socialMedias">
					Social Medias
				</div>
				<div id="socialMedias" class="collapse in">
					@include("admin.profile.partials.form.social-media-form", [
						"socialMedias"	 =>	$socialMedias,
						"socialTypes"	 =>	$socialTypes
					])
				</div>
			</div>
		</div>
	</div>
</div>

<div id="templates" class="invisible">
	<div id="socialMediaTemplate">
		@include("admin.profile.partials.form.social-media-row", [
			"key"						 =>	"__INDEX__",
			"socialTypes"				 =>	$socialTypes
		])
	</div>
</div>
@endsection