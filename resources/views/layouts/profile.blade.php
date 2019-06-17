<!DOCTYPE html>
<html>
<head>
	<title>Ali Rasheed - @yield("title")</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Ali Rasheed Portfolio">
	<meta name="author" content="Ali Rasheed">
	<meta name="csrf-token" content="<?= csrf_token(); ?>">
	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<link href="{{ asset('profile/css/profile.css') }}" rel="stylesheet" />
	<link href="{{ asset('profile/css/profile.media.css') }}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
	
	<script src="{{ asset('js/app.js') }}"></script>
	

</head>
<body data-spy="scroll" data-target=".menu-list" data-offset="50">
	<main>
		<div class="top-layer">
			<div class="container-fluid pt-3">
				<div class="row">
					<div class="col-md-6" id="downloadCV">
						<a href="{{ route('index.downloadCV', [$cv]) }}" class="btn btn-primary border" id="downloadCVButton"> <i class="fas fa-download"></i> Download CV</a>
					</div>
					<div class="col-md-6" id="socialLinkDiv">
						<ul class="social-links inline-list top-social-links">
							@forelse ($socialMedias as $socialMedia)
								<li><a href="{{ $socialMedia->url }}" target="_blank">{!! $socialMedia->icon ?: ($socialMedia->type)[0] !!}</a></li>
							@empty
							@endforelse
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="second-layer">
			<div class="container text-center pt-5">
				<div class="row">
					<div class="col-md-7 offset-md-3">
						<div class="heading">
							<h1 class="name">{{ $details->first_name . " " . $details->surname }}</h1>
							<h3 class="title">{{ $details->work_title }}</h3>
							<p class="objective">
								{{ $details->objective }}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="third-layer">
			<div class="container text-center">
				<div class="row contact">
					<div class="col-md-4 item">
						<i class="fas fa-envelope"></i> {{ $email->email }}
					</div>
					<div class="col-md-4 item">
						<i class="fas fa-phone"></i> {{ $phone->phone }}
					</div>
					<div class="col-md-4 item">
						<i class="fas fa-home"></i> {{ $address->city . ", " . $address->country }}
					</div>
				</div>
			</div>
		</div>
		<div class="fourth-layer sticky-top">
			<div class="container text-center">
				<ul class="menu-list inline-list">
					<li class="">
						<a class="" href="#experiences">Experiences</a>
					</li>
					<li class="">
						<a class="" href="#education">Education</a>
					</li>
					<li class="">
						<a class="" href="#skills">Skills</a>
					</li>
					<li class="">
						<a class="" href="#portfolio">Portfolio</a>
					</li>
					<li class="">
						<a class="" href="#contact">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="fifth-layer">
			<div class="container">
				<div class="content-area border" id="experiences">
					<h2 class="content-title text-center">Work Experience</h2>
					<div class="row">
						<div class="col-md-12">
							@forelse ($experiences as $experience)
							<div class="experience-item">
								<div class="experience-title">
									<p>{{ $experience->company }}</p>
								</div>
								<div class="experience-location">
									<p class="job">{{ $experience->title }}</p>
									<p class="location"><i class="fas fa-map-marker-alt"></i> {{ $experience->city . ", " . $experience->country }}</p>
									<p class="dates">{{ $experience->start_date }} - {{ $experience->is_active ? "Present" : $experience->end_date }}</p>
								</div>
								<div class="experience-description">
									<p>
										{{ $experience->description }}
									</p>
										<ul>
											@forelse ($experience->responsibilities as $responsibility)
												<li>{{ $responsibility }}</li>
											@empty
											@endforelse
										</ul>
								</div>
							</div>
							@empty
							@endforelse
						</div>
					</div>
				</div>
				<div class="content-area border" id="education">
					<h2 class="content-title text-center">Education</h2>
					<div class="row">
						@forelse ($educations as $education)
						<div class="col-md-6">
							<div class="education-item">
								<div class="education-title">{{ $education->degree_acronym }} {{ $education->title }}</div>
								<div class="education-location">{{ $education->institute }}</div>
								<div class="education-dates">{{ $education->start_date }} - {{ $education->is_active ? "Present" : $education->end_date }}</div>
								<div class="education-description">
									<p>
										{{ $education->description }}
									</p>
								</div>
							</div>
						</div>
						@empty
						@endforelse
					</div>
				</div>
				<div class="content-area border" id="skills">
					<h2 class="content-title text-center">Professional Skills</h2>
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">Major Skills</div>
						@forelse ($skills["Major"] as $majorSkill)
						<div class="col-md-3 skillset-item">
							<h4 class="skillset-title">{{ $majorSkill->title }}</h4>
							<span class="skillset-level">{{ $majorSkill->experience_name }}{{ $majorSkill->experience ? ", " . $majorSkill->experience : "" }}</span>
						</div>
						@empty
						@endforelse
					</div>
					@forelse ($skills as $skillKey => $skillItems)
					@php if ($skillKey == "Major") continue; @endphp
					<div class="row text-center skillset-row">
						<div class="col-12 skillset-heading">{{ $skillKey }}</div>
						<div class="col-12">
							@forelse ($skillItems as $skill)
							<span class="skillset-tag">{{ $skill->title }}</span>
							@empty
							@endforelse
						</div>
					</div>
					@empty
					@endforelse
				</div>
				<div class="content-area border" id="portfolio">
					<h2 class="content-title text-center">Portfolio</h2>
					<div class="row">
						@forelse ($projects as $project)
						<div class="col-sm-6 col-md-3 portfolio-column">
							<div class="portfolio-item">
								<figure class="text-center">
									<img src="{{ $project->cover ? asset('uploads/project_cover/' . $project->cover) : asset('img/index.png') }}" class="img-fluid" />
								</figure>
								
								<div class="portfolio-description">
									<h3 class="portfolio-heading">{{ $project->title }}</h3>
									@php
										$skillTags			 =	[];
									@endphp
									@forelse ($project->skill_tags as $skillTag) 
										@php $skillTags[]		 =	$skillTag->skill->title @endphp
									@empty 
									@endforelse
									<span class="protfolio-sub-text">{{ implode(", ", $skillTags) }}</span>
									
									@if ($project->repository)
									<div class="protfolio-action">
										<a
											href="{{ $project->repository }}"
											title="{{ $project->title }}"
											class="text-white"
											target="_blank"
										>
											View Repository
										</a>
									</div>
									@endif
								</div>
								
							</div>
						</div>
						@empty
						@endforelse
					</div>
				</div>
				<div class="content-area border" id="contact">
					<h2 class="content-title text-center">Get in Touch</h2>
					<div class="row">
						<div class="col-md-3 text-center">
							<img
								src="{{ asset('defaults/no_image.png') }}"
								class="img-fluid img-circle"
							/>
						</div>
						<div class="col-md-9">
							<div class="contact-description">
								<p class="contact-introduction">
									{{ $details->brief }}
								</p>
								<p>
									<b>I can help with the following:</b>
								</p>
								<ul class="contact-keys">
									@forelse (json_decode($details->responsibilities ?? "{}") as $responsibility)
									<li>
										<i class="fas fa-check"></i>
										{{ $responsibility }}
									</li>
									@empty
									@endforelse
								</ul>
								<p>
									Drop me a line at <a href="mailto:arshaikh_17@hotmail.com">{{ $email->email }}</a> or call me at <a href="tel:{{ $phone->phone }}">{{ $phone->phone }}</a>
								</p>
								<ul class="inline-list bottom-social-list">
									@forelse ($socialMedias as $socialMedia)
									<li><a href="{{ $socialMedia->url }}" target="_blank">{!! $socialMedia->icon !!}</a></li>
									@empty
									@endforelse
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="text-center">
			<p>
				Copyright @ <a href="https://ialirasheed.com">Ali Rasheed</a>
			</p>
		</footer>
	</main>
	
</body>
</html>