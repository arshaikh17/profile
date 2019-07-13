@extends("layouts.comics.comics")

@section("scripts")
<link rel="stylesheet" type="text/css" href="{{ asset('modules/comics/css/public.css') }}">
@include("partials.modules.masonry")
<script>
	$(".arcs-row").masonry({
  // options...
  itemSelector: ".arc",
  
});
</script>
@endsection

@section("body")
<main class="mt-5">
	@yield("content")
</main>
@endsection