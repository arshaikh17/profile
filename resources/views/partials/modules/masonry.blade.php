<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script type="text/javascript">
	/**
	 * Fixes bootstrap tabs
	 */
	$(".masonry-link").on("click", function () {
		
		setTimeout(function () {
			$($(this).data("masonry-parent")).masonry({
				itemSelector			 :	$(this).data("masonry-child"),
			})
		}, 500);
		
	});
</script>