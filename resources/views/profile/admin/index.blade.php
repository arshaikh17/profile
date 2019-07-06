@extends("layouts.app")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<ul class="nav nav-tabs flex-column">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#social">My Socials</a>
					<a class="nav-link" data-toggle="tab" href="#email">My Emails</a>
					<a class="nav-link" data-toggle="tab" href="#phone">My Phones</a>
					<a class="nav-link" data-toggle="tab" href="#address">My Addresses</a>
					<a class="nav-link" data-toggle="tab" href="#skill">My Skills</a>
					<a class="nav-link" href="{{ route('profile.admin.details.index') }}">My Details</a>
					<a class="nav-link" href="{{ route('profile.admin.experiences.index') }}">My Experiences</a>
					<a class="nav-link" href="{{ route('profile.admin.educations.index') }}">My Educations</a>
					<a class="nav-link" href="{{ route('profile.admin.projects.index') }}">My Projects</a>
					<a class="nav-link" href="{{ route('profile.admin.cvs.index') }}">My CVs</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-8 col-md-9 tab-content">
			<div class="card tab-pane active" id="social">
				<div class="card-header" data-toggle="collapse" href="#socialMedias">
					Social Medias
				</div>
				<div id="socialMedias" class="collapse show">
					@include("profile.admin.partials.form.social-media-form", [
						"socialMedias"	 =>	$socialMedias,
						"socialTypes"	 =>	$socialTypes
					])
				</div>
			</div>
			<div class="card tab-pane" id="email">
				<div class="card-header" data-toggle="collapse" href="#emails">
					My Emails
				</div>
				<div id="emails" class="collapse show">
					@include("profile.admin.partials.form.email-form", [
						"emails"		 =>	$emails
					])
				</div>
			</div>
			<div class="card tab-pane" id="phone">
				<div class="card-header" data-toggle="collapse" href="#phones">
					My Phones
				</div>
				<div id="phones" class="collapse show">
					@include("profile.admin.partials.form.phone-form", [
						"phones"		 =>	$phones
					])
				</div>
			</div>
			<div class="card tab-pane" id="address">
				<div class="card-header" data-toggle="collapse" href="#addresses">
					My Addresses
				</div>
				<div id="addresses" class="collapse show">
					@include("profile.admin.partials.form.address-form", [
						"addresses"		 =>	$addresses
					])
				</div>
			</div>
			<div class="card tab-pane" id="skill">
				<div class="card-header" data-toggle="collapse" href="#skills">
					My Skills
				</div>
				<div id="skills" class="collapse show">
					@include("profile.admin.partials.form.skill-form", [
						"skills"							 =>	$skills,
						"skillCategories"					 =>	$skillCategories,
						"skillLevels"						 =>	$skillLevels
					])
				</div>
			</div>
		</div>
	</div>
</div>

<div id="templates" class="invisible">
	<div id="socialMediaTemplate">
		@include("profile.admin.partials.form.social-media-row", [
			"key"						 =>	"__INDEX__",
			"socialTypes"				 =>	$socialTypes
		])
	</div>
	<div id="emailTemplate">
		@include("profile.admin.partials.form.email-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
	<div id="phoneTemplate">
		@include("profile.admin.partials.form.phone-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
	<div id="addressTemplate">
		@include("profile.admin.partials.form.address-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
	<div id="skillTemplate">
		@include("profile.admin.partials.form.skill-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
</div>
@endsection