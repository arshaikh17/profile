@extends("layouts.articles")

@section("meta")
<meta property="og:title" content="My Friend Aitashan Babu Bhaiyyan" />
<meta name="twitter:description" property="og:description" itemprop="description" content="He gone" />
<meta property="og:image" content="{{ asset("defaults/aitashan.png") }}">
<meta property="og:url" content="{{ route("articles.dummy") }}">
<meta name="twitter:title" content="My Friend Aitashan Babu Bhaiyyan">
<meta name="twitter:description" content="He gone">
<meta name="twitter:image" content="{{ asset("defaults/aitashan.png") }}">
<meta name="twitter:card" content="summary_large_image">
<link rel="icon" type="image/png" href="{{ asset("defaults/aitashan.png") }}" sizes="192x192" />
@endsection

@section("content")
<div class="p-4">
	<p class="display-4">My Friend Aitashan Babu Bhaiyyan</p>
	<p><em>By <a href="{{ route("index.index") }}" class="btn btn-link">Ali Rasheed</a></em></p>
	<p>Let me tell you about out friend <b>Aitashan Nadeem</b></p>
	<img src="{{ asset("defaults/aitashan.png") }}" class="mx-auto d-block img-fluid w-25" />
	<p class=""><em>He gone</em></p>
	<p>Some of his famous quotes.</p>
	<ul style="font-style: italic;">
		<li>"Pakhana"</li>
		<li>"Paaad"</li>
		<li>"Lassi pilaa"</li>
	</ul>
	<p class="text-center">His wife won't allow him - send prayers.</p>
</div>
@endsection