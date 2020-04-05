<template>
	<div id="component">
		<h1>Collectibles</h1>
		<div id="collectibleLayouts">
			<!--<div class="clearfix mt-2 mb-2">
				<a href="#" @click.prevent="layoutForm()" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Add Layout</a>
			</div>-->
			<div class="collectible-layout" id="collectibleLayout" v-masonry="collectibleLayouts" transition-duration="0.3s" item-selector=".collectible">
				<div
					class="collectible"
					@click.prevent="showCollectible"
					v-for="collectible in collectibles"
				>
					<div :style="collectible.css_values">
						<img class="img-fluid"  :src="collectible.image" />
					</div>
				</div>
			</div>
		</div>
		
		<!-- The Collectibles Modal -->
		<div class="modal fade" id="showCollectibleModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Batman Title</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-5">
								<img class="img-fluid" src="https://www.sideshow.com/storage/product-images/9045511/batman-incorporated-suit_dc-comics_silo.png" />
							</div>
							<div class="col-md-7">
								<h3>Batman Incorporated</h3>
								<p>
									<span class="badge badge-dark p-2">DC Comics</span>
									<span class="badge badge-dark p-2">Prime 1 Studio</span>
									<span class="badge badge-dark p-2">1:5 Scale</span>
								</p>
								<p>
									<span class="text-secondary">Ordered from </span>
									<a class="text-dark" href="https://sideshow.com" target="_blank">Sideshow</a>
								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="layoutFormModal">
			<div class="modal-dialog">
				
				<form method="POST" :action="modals.layoutFormModal.form.action" @submit.prevent="saveLayout()">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">{{ modals.layoutFormModal.title }} Layout</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<div class="alert alert-danger alert-dismissible" v-if="modals.layoutFormModal.form.errors">
  								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<ul>
									<li v-for="error in modals.layoutFormModal.form.errors">{{ error.join(", ") }}</li>
								</ul>
							</div>
							<div class="alert alert-danger alert-dismissible" v-if="modals.layoutFormModal.form.success">
  								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<ul>
									<li v-for="error in modals.layoutFormModal.form.errors">{{ error.join(", ") }}</li>
								</ul>
							</div>
							<div class="form-group">
								<label>Name</label>
								<input class="form-control" type="text" v-model="modals.layoutFormModal.form.fields.name" placeholder="Layout name"  />
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea placeholder="Layout description" class="form-control" v-model="modals.layoutFormModal.form.fields.description">{{ modals.layoutFormModal.form.fields.description }}</textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-dark" value="Save" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</template>

<style>
	.collectible {
		border: 2px solid #EEE;
		padding: 10px;
		text-align: center;
		transition: 0.5s;
		cursor: pointer;
	}
	.collectible:hover {
		-webkit-box-shadow: 0px 0px 6px -1px #6C757D;
		-moz-box-shadow: 0px 0px 6px -1px #6C757D;
		box-shadow: 0px 0px 6px -1px #6C757D;
	}
	
	#showCollectibleModal .badge {
		border-radius: 0px;
	}
	.h-250 {
		max-height: 300px;
	}
</style>

<script>
	import {VueMasonryPlugin} from 'vue-masonry';
	
	export default {
		data							 :	() => {
			
			return {
				collectibles			 :	[],
				modals					 :	{
					showCollectibleModal :	"#showCollectibleModal",
					layoutFormModal		 :	{
						name			 :	"#layoutFormModal",
						title			 :	"Create",
						form			 :	{
							action		 :	"",
							fields		 :	{
								name	 :	"",
								description					 :	"",
							},
							errors		 :	false,
							success		 :	false,
						},
					},
				},
			};
			
		},
		props							 :	{
			
			assetLink					 :	String,
			
			comicsCollectiblesIndexRoute :	String,
			
		},
		components						 :	{
			VueMasonryPlugin
		},
		created() {
			
			this.loadCollectibles();
			
		},
		mounted() {
			
		},
		computed						 :	{
			
		},
		methods							 :	{
			
			loadCollectibles() {
				
				axios
					.get(this.comicsCollectiblesIndexRoute)
					.then(data => {
						//console.log(data)
						this.collectibles					 =	data.data;
				console.log(this.collectibles);
						console.log('triggerMasonry');
            var grid = document.getElementById('#collectibleLayouts');
            var msnry = new Masonry( grid, {
                itemSelector: '.collectible',
            });
					})
				;
				
            
				
			},
			/*layoutForm(data = false) {
				
				this.modals.layoutFormModal.title			 =	data ? "Update" : "Create";
				this.modals.layoutFormModal.form.action		 =	data ? this.createLink(this.layoutUpdateRoute, [data.id]) : this.layoutStoreRoute;
				
				if (data) {
					this.modals.layoutFormModal.form.fields.name				 =	data.name;
					this.modals.layoutFormModal.form.fields.description			 =	data.description;
				}
				
				$(this.modals.layoutFormModal.name).modal("show");
				
			},
			saveLayout() {
				
				this.modals.layoutFormModal.form.errors		 =	false;
				this.modals.layoutFormModal.form.success	 =	false;
				
				axios
					.post(this.modals.layoutFormModal.form.action, {
						"name"			 :	this.modals.layoutFormModal.form.fields.name,
						"description"	 :	this.modals.layoutFormModal.form.fields.description,
						
					})
					.then(function(data) {
						this.modals.layoutFormModal.form.success				 =	"Layout saved.";
					})
					.catch(error => {
						this.modals.layoutFormModal.form.errors					 =	error.response.data.errors;
					})
				;
				
			},*/
			showCollectible() {
				
				$(this.modals.showCollectibleModal).modal("show");
				
			},
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