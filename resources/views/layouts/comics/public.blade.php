@extends("layouts.comics.comics")

@section("scripts")
<link rel="stylesheet" type="text/css" href="{{ asset('modules/comics/css/public.css') }}">
@endsection

@section("body")
<main class="mt-5">
	@yield("content")
</main>
@endsection