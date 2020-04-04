<template>
	<h1>This is collectible index vue</h1>
</template>

<script>
	
	export default {
		data							 :	() => {
			
			return {
				
			};
			
		},
		props							 :	{
			
			assetLink					 :	String,
			
		},
		components						 :	{
			
		},
		created() {
			
		},
		mounted() {
			
		},
		computed						 :	{
			
		},
		methods							 :	{
			
			showImage(type, src) {
				
				return this.assetLink + "/" + src;
				
			},
			createLink(link, ids = []) {
				
				var idCount				 =	0;
				
				for (var i in ids) {
					
					--idCount;
					link					 =	link.replace(idCount, ids[i]);
					
				}
				
				return link;
				
			},
			redirect(url) {
				
				window.location.href	 =	url;
				
			}
			
		}
	}
</script>