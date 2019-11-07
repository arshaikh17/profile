<template>
	<div class="container">
		<h1>Investments</h1>
		<div class="row">
			<div class="col-12 flex mb-3">
				<a href="#" class="btn btn-sm btn-primary" @click.prevent="organisationForm()">Add Organisation</a>
				<a
					href="#"
					class="btn btn-sm btn-primary"
					v-if="selected.organisation"
				>
					Add Investment
				</a>
				<a href="#" class="btn btn-sm btn-primary">Add ROI</a>
			</div>
			<div class="col-md-4">
				<p class="display-5">Organisations</p>
				<ul class="list-group organisations-list">
					<li
						class="list-group-item"
						v-if="!organisations.length"
					>
						No organisations
					</li>
					<li
						:class="{'list-group-item': true, 'active': selected.organisation && selected.organisation.id == organisation.id}"
						v-for="organisation in organisations"
					>
						<div class="row">
							<div class="col-4">
								<img class="img-fluid" :src="showImage('organisation', organisation.logo)" />
							</div>
							<div class="col-8">
								<div class="flex">
									<a
										href="#"
										@click.prevent="getOrganisationInvestments(organisation, createLink(organisationShowRoute, [organisation.id]))"
									>
										{{ organisation.name }}
									</a>
									<a href="#" class="float-right" @click.prevent="organisationForm(organisation)"><i class="fas fa-edit"></i></a>
								</div>
								<p><span class="badge badge-dark">{{ organisation.type }}</span></p>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<p class="display-5">Investments</p>
				<ul class="list-group">
					<li
						class="list-group-item"
						v-if="!investments.length"
					>
						No investments or select organisation
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<p class="display-5">ROIs</p>
				<ul class="list-group">
					<li
						class="list-group-item"
						v-if="!rois.length"
					>
						No rois or select investment
					</li>
				</ul>
			</div>
		</div>
		<div class="modal" id="organisationModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Organisation</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form
						method="POST"
						:action="modals.organisation.form.action"
						v-on:submit.prevent="submitOrganisationForm"
						enctype="multipart/form-data"
					>
						<div class="modal-body">
							<div class="form-group">
								<label>Name</label>
								<input
									type="text"
									class="form-control"
									name="name"
									placeholder="Enter organisation name"
									v-model="modals.organisation.form.fields.name"
									required
								/>
							</div>
							<div class="form-group">
								<label>Logo</label>
								<input
									type="file"
									class="form-control"
									name="organisation_logo"
									v-on:change="updateImage($event, 'organisation')"
								/>
								<img v-if="modals.organisation.form.fields.image" :src="modals.organisation.form.fields.image" class="img-fluid" width="200" />
							</div>
							<div class="form-group">
								<label>Type</label>
								<select
									type="text"
									class="form-control"
									name="type_id"
									v-model="modals.organisation.form.fields.type_id"
									required
								>
									<option disabled selected>Select type</option>
									<option v-if="!modals.organisation.types">No types</option>
									<option
										v-for="(type, typeKey) in modals.organisation.types"
										:value="typeKey"
										:selected="typeKey == modals.organisation.form.fields.type_id"
									>
										{{ type }}
									</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</template>

<script>
	export default {
		data							 :	() => {
			
			return {
				organisations			 :	[],
				investments				 :	[],
				rois					 :	[],
				modals					 :	{
					organisation		 :	{
						name			 :	"#organisationModal",
						form			 :	{
							fields		 :	{
								name	 :	"",
								logo	 :	false,
								image	 :	false,
								type_id	 :	null,
							},
							action		 :	"",
						},
						types			 :	[],
					},
					investment								 :	{
						name								 :	"#investmentModal",
						form								 :	{
							fields							 :	{
								amount						 :	"",
								return_type					 :	"",
								roi_percentage				 :	"",
								type						 :	"",
								type_category				 :	"",
								currency_id					 :	"",
								organisation_id				 :	"",
							},
						},
					},
					roi										 :	{
						name								 :	"#roiModal",
						form								 : 	{
							fields							 :	{
								amount						 :	"",
								paid_at						 :	"",
								investment_id				 :	"",
							},
						}
					},
				},
				selected				 :	{
					organisation		 :	false,
					investment			 :	false,
				},
				
			};
			
		},
		props							 :	{
			
			typesJson					 :	String,
			assetLink					 :	String,
			organisationIndexRoute		 :	String,
			organisationStoreRoute		 :	String,
			organisationShowRoute		 :	String,
			organisationUpdateRoute		 :	String,
			
		},
		created() {
			
			this.modals.organisation.types					 =	JSON.parse(this.typesJson);
			this.loadOrganisations();
			
		},
		mounted() {
			
		},
		computed						 :	{
			
		},
		methods							 :	{
			
			loadOrganisations() {
				
				axios
					.get(this.organisationIndexRoute)
					.then((response) => {
						
						this.organisations					 =	response.data.organisations;
						
					})
				
			},
			organisationForm(organisation = false) {
				
				this.modals.organisation.form.fields.name	 =	organisation ? organisation.name : "";
				this.modals.organisation.form.fields.logo	 =	"";
				this.modals.organisation.form.fields.type_id =	organisation ? organisation.type_id : null;
				this.modals.organisation.form.action		 =	organisation ? this.createLink(this.organisationUpdateRoute, [organisation.id]) : this.organisationStoreRoute;
				
				$(this.modals.organisation.name).modal("show");
				
			},
			submitOrganisationForm() {
				
				let formData			 =	new FormData();
				formData.append("name", this.modals.organisation.form.fields.name);
				formData.append("type_id", this.modals.organisation.form.fields.type_id);
				formData.append("organisation_logo", this.modals.organisation.form.fields.logo);
				
				axios
					.post(this.modals.organisation.form.action, formData, {
						headers								 :	{
							"Content-Type"					 :	"multipart/form-data"
						}
					})
					.then((response) => {
						
						this.loadOrganisations();
						
						this.modals.organisation.form.fields.name				 =	"";
						this.modals.organisation.form.fields.logo				 =	false;
						this.modals.organisation.form.fields.type_id			 =	null;
						this.modals.organisation.form.action					 =	this.organisationStoreRoute;
						
						this.selected.organisation			 =	false;
						this.selected.investment			 =	false;
						
						$(this.modals.organisation.name).modal("hide");
						
					})
				;
				
			},
			getOrganisationInvestments(organisation, url) {
				
				this.selected.organisation					 =	organisation;
				
				axios
					.get(url)
					.then((response) => {
						
						this.investments =	response.data.investments;
						
					})
				;
				
			},
			updateImage($event, type) {
				
				const file				 =	$event.target.files[0];
				
				if (type == "organisation") {
					
					this.modals.organisation.form.fields.logo	 =	file;
					this.modals.organisation.form.fields.image	 =	URL.createObjectURL(file);
					
				}
				
			},
			showImage(type, src) {
				
				return this.assetLink + "/" + src;
				
			},
			createLink(link, ids = []) {
				
				var url					 =	"";
				var idCount				 =	0;
				
				for (var i in ids) {
					
					--idCount;
					
					url					 +=	link.replace(idCount, ids[i]);
					
				}
				
				return url;
				
			}
			
		}
	}
</script>