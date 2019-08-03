@extends("layouts.profile")

@section("content")
<div class="container">
	<div class="row">
		<div class="col-12 col-sm-4 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Details</h4>
						<h1 class="card-text">{{ $profile->details()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-4 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Social Medias</h4>
						<h1 class="card-text">{{ $profile->socialMedias()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-4 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">CVs</h4>
						<h1 class="card-text">{{ $profile->cvs()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-4 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Emails</h4>
						<h1 class="card-text">{{ $profile->emails()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-4 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Phones</h4>
						<h1 class="card-text">{{ $profile->phones()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-4 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Address</h4>
						<h1 class="card-text">{{ $profile->addresses()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-6 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Educations</h4>
						<h1 class="card-text">{{ $profile->educations()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 col-sm-6 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Experiences</h4>
						<h1 class="card-text">{{ $profile->experiences()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
		<div class="col-12 statistics-card">
			<a href="">
				<div class="card">
					<div class="card-body bg-primary text-white">
						<h4 class="card-title">Projects</h4>
						<h1 class="card-text">{{ $profile->projects()->count() }}</h1>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-md-3">
			<ul class="nav nav-tabs flex-column">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#social">My Socials</a>
					<a class="nav-link" data-toggle="tab" href="#email">My Emails</a>
					<a class="nav-link" data-toggle="tab" href="#phone">My Phones</a>
					<a class="nav-link" data-toggle="tab" href="#address">My Addresses</a>
					<a class="nav-link" data-toggle="tab" href="#skill">My Skills</a>
					<a class="nav-link" href="{{ route('profile.details.index') }}">My Details</a>
					<a class="nav-link" href="{{ route('profile.experiences.index') }}">My Experiences</a>
					<a class="nav-link" href="{{ route('profile.educations.index') }}">My Educations</a>
					<a class="nav-link" href="{{ route('profile.projects.index') }}">My Projects</a>
					<a class="nav-link" href="{{ route('profile.cvs.index') }}">My CVs</a>
				</li>
			</ul>
		</div>
		<div class="col-sm-8 col-md-9 tab-content">
			<div class="card tab-pane active" id="social">
				<div class="card-header" data-toggle="collapse" href="#socialMedias">
					Social Medias
				</div>
				<div id="socialMedias" class="collapse show">
					@include("profile.partials.form.social-media-form", [
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
					@include("profile.partials.form.email-form", [
						"emails"		 =>	$emails
					])
				</div>
			</div>
			<div class="card tab-pane" id="phone">
				<div class="card-header" data-toggle="collapse" href="#phones">
					My Phones
				</div>
				<div id="phones" class="collapse show">
					@include("profile.partials.form.phone-form", [
						"phones"		 =>	$phones
					])
				</div>
			</div>
			<div class="card tab-pane" id="address">
				<div class="card-header" data-toggle="collapse" href="#addresses">
					My Addresses
				</div>
				<div id="addresses" class="collapse show">
					@include("profile.partials.form.address-form", [
						"addresses"		 =>	$addresses
					])
				</div>
			</div>
			<div class="card tab-pane" id="skill">
				<div class="card-header" data-toggle="collapse" href="#skills">
					My Skills
				</div>
				<div id="skills" class="collapse show">
					@include("profile.partials.form.skill-form", [
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
		@include("profile.partials.form.social-media-row", [
			"key"						 =>	"__INDEX__",
			"socialTypes"				 =>	$socialTypes
		])
	</div>
	<div id="emailTemplate">
		@include("profile.partials.form.email-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
	<div id="phoneTemplate">
		@include("profile.partials.form.phone-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
	<div id="addressTemplate">
		@include("profile.partials.form.address-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
	<div id="skillTemplate">
		@include("profile.partials.form.skill-row", [
			"key"						 =>	"__INDEX__",
		])
	</div>
</div>
@endsection