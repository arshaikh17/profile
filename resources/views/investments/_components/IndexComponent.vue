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
					@click.prevent="investmentForm()"
				>
					Add Investment
				</a>
				<a
					href="#"
					class="btn btn-sm btn-primary"
					v-if="selected.organisation && selected.investment"
					@click.prevent="roiForm()"
				>
					Add ROI
				</a>
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
						:class="{'hover-link': true, 'list-group-item': true, 'active': selected.organisation && selected.organisation.id == organisation.id}"
						v-for="organisation in organisations"
						@click.prevent="getOrganisationInvestments(organisation, createLink(organisationInvestmentsRoute, [organisation.id]))"
						
					>
						<div class="row">
							<div class="col-4">
								<img class="img-fluid" :src="showImage('organisation', organisation.logo)" />
							</div>
							<div class="col-8">
								<div class="flex">
									<span>
										{{ organisation.name }}
									</span>
									<a href="#" class="float-right organisation-action" @click.prevent="organisationForm(organisation)"><i class="fas fa-edit"></i></a>
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
					<li
						:class="{'hover-link': true, 'list-group-item': true, 'active': selected.investment && selected.investment.id == investment.id}"
						v-for="investment in investments"
						@click.prevent="getInvestmentsReturns(investment, createLink(organisationInvestmentsReturnsRoute, [selected.organisation.id, investment.id]))"
					>
						<div class="flex">
							<p class="text-20">Investment: {{ investment.currency }}{{ investment.amount }}</p>
							<a href="#" class="float-right investment-action" @click.prevent="investmentForm(investment)"><i class="fas fa-edit"></i></a>
						</div>
						<div>
							<span class="d-block">ROI Percentage: {{ investment.roi_percentage }}%</span>
							<span class="d-block">ROI Return Type: {{ investment.return_type_name }}</span>
							<span class="d-block">ROI Return Amount (approx): {{ investment.currency }}{{ investment.roi_return_amount }}</span>
							<span class="d-block">Made On: {{ investment.created_at }}</span>
						</div>
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
					<li
						class="hover-link list-group-item"
						v-for="roi in rois"
					>
						<div class="flex">
							<p class="text-20">ROI: {{ selected.investment.currency }}{{ roi.amount }}</p>
							<a href="#" class="float-right roi-action" @click.prevent="roiForm(roi)"><i class="fas fa-edit"></i></a>
						</div>
						<div>
							<span class="d-block">Paid On: {{ roi.paid_at }}</span>
						</div>
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
		<div class="modal" id="investmentModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Investments</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form
						method="POST"
						:action="modals.investment.form.action"
						v-on:submit.prevent="submitInvestmentForm"
					>
						<div class="modal-body">
							<div class="form-group">
								<label>Amount</label>
								<input
									type="text"
									class="form-control"
									name="amount"
									placeholder="Enter amount"
									v-model="modals.investment.form.fields.amount"
									required
								/>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Return Type</label>
										<select
											type="text"
											class="form-control"
											name="amount"
											v-model="modals.investment.form.fields.return_type"
											required
										>
											<option
												v-for="(returnType, returnTypeIndex) in modals.investment.return_types"
												:value="returnTypeIndex"
											>
												{{ returnType }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>ROI Percentage</label>
										<input
											type="text"
											class="form-control"
											name="roi_percentage"
											placeholder="Enter ROI percentage"
											v-model="modals.investment.form.fields.roi_percentage"
											required
										/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Investment Type</label>
										<select
											type="text"
											class="form-control"
											name="type"
											v-model="modals.investment.form.fields.type"
											required
										>
											<option
												v-for="(investmentType, investmentTypeIndex) in modals.investment.types"
												:value="investmentTypeIndex"
											>
												{{ investmentType }}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Type Category</label>
										<input
											type="text"
											class="form-control"
											name="type_category"
											placeholder="Enter Type Category"
											v-model="modals.investment.form.fields.type_category"
											required
										/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Currency</label>
								<select
									type="text"
									class="form-control"
									name="currency_id"
									v-model="modals.investment.form.fields.currency_id"
									required
								>
									<option
										v-for="(currency, currencyKey) in currencies"
										:value="currencyKey"
									>
										{{ currency }}
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
		<div class="modal" id="roiModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">ROI</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form
						method="POST"
						:action="modals.roi.form.action"
						v-on:submit.prevent="submitROIForm"
					>
						<div class="modal-body">
							<div class="form-group">
								<label>Amount</label>
								<input
									type="text"
									class="form-control"
									name="amount"
									placeholder="Enter ROI amount"
									v-model="modals.roi.form.fields.amount"
									required
								/>
							</div>
							<div class="form-group">
								<label>Paid At</label>
								<datetime
									format="YYYY-MM-DD"
									name="date"
									v-model="modals.roi.form.fields.paid_at"
								></datetime>
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

<style>
	.list-group-item.active .organisation-action {
		color: white !important;
	}
	.list-group-item.active .investment-action {
		color: white !important;
	}
</style>
<script>
	import datetime from "vuejs-datetimepicker";
	
	export default {
		data							 :	() => {
			
			return {
				organisations			 :	[],
				investments				 :	[],
				rois					 :	[],
				currencies				 :	[],
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
							},
							action		 :	"",
						},
						types			 :	[],
						return_types	 :	[],
					},
					roi										 :	{
						name								 :	"#roiModal",
						form								 : 	{
							fields							 :	{
								amount						 :	"",
								paid_at						 :	"",
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
			currenciesJson				 :	String,
			investmentTypesJson			 :	String,
			investmentReturnTypesJson	 :	String,
			
			organisationIndexRoute		 :	String,
			organisationStoreRoute		 :	String,
			organisationShowRoute		 :	String,
			organisationInvestmentsRoute :	String,
			organisationUpdateRoute		 :	String,
			
			organisationInvestmentsStoreRoute				 :	String,
			organisationInvestmentsUpdateRoute				 :	String,
			organisationInvestmentsReturnsRoute				 :	String,
			
			organisationInvestmentsRoisStoreRoute			 :	String,
			organisationInvestmentsRoisUpdateRoute			 :	String,
			
		},
		components						 :	{
			datetime
		},
		created() {
			
			this.modals.organisation.types					 =	JSON.parse(this.typesJson);
			this.modals.investment.types					 =	JSON.parse(this.investmentTypesJson);
			this.modals.investment.return_types				 =	JSON.parse(this.investmentReturnTypesJson);
			
			this.currencies				 =	JSON.parse(this.currenciesJson);
			
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
				;
				
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
				this.investments		 =	[];
				
				axios
					.get(url)
					.then((response) => {
						
						this.investments =	response.data.investments;
						
					})
				;
				
			},
			investmentForm(investment = false) {
				
				this.modals.investment.form.fields.amount						 =	investment ? investment.amount : "";
				this.modals.investment.form.fields.return_type					 =	investment ? investment.return_type : "";
				this.modals.investment.form.fields.roi_percentage				 =	investment ? investment.roi_percentage : "";
				this.modals.investment.form.fields.type							 =	investment ? investment.type : "";
				this.modals.investment.form.fields.type_category				 =	investment ? investment.type_category : "";
				this.modals.investment.form.fields.currency_id					 =	investment ? investment.currency_id : "";
				this.modals.investment.form.fields.name							 =	investment ? investment.name : "";
				this.modals.investment.form.action								 =	investment ? this.createLink(this.organisationInvestmentsUpdateRoute, [this.selected.organisation.id, investment.id]) : this.createLink(this.organisationInvestmentsStoreRoute, [this.selected.organisation.id]);
				
				$(this.modals.investment.name).modal("show");
				
			},
			submitInvestmentForm() {
				
				axios
					.post(this.modals.investment.form.action, this.modals.investment.form.fields)
					.then((response) => {
						
						this.getOrganisationInvestments(this.selected.organisation, this.createLink(this.organisationInvestmentsRoute, [this.selected.organisation.id]));
						
						this.modals.investment.form.fields.amount				 =	"";
						this.modals.investment.form.fields.return_type			 =	"";
						this.modals.investment.form.fields.roi_percentage		 =	"";
						this.modals.investment.form.fields.type					 =	"";
						this.modals.investment.form.fields.type_category		 =	"";
						this.modals.investment.form.fields.currency_id			 =	"";
						this.modals.investment.form.action						 =	this.organisationInvestmentsStoreRoute;
							
						this.selected.investment			 =	false;
						
						$(this.modals.investment.name).modal("hide");
						
					})
				;
				
			},
			getInvestmentsReturns(investment, url) {
				
				this.selected.investment =	investment;
				this.rois				 =	[];
				
				axios
					.get(url)
					.then((response) => {
						
						this.rois		 =	response.data.rois;
						
					})
				;
				
			},
			roiForm(roi = false) {
				
				this.modals.roi.form.fields.amount			 =	roi ? roi.amount : "";
				this.modals.roi.form.fields.paid_at			 =	roi ? roi.paid_at : "";
				this.modals.roi.form.action					 =	roi
																	?	this.createLink(this.organisationInvestmentsRoisUpdateRoute, [this.selected.organisation.id, this.selected.investment.id, roi.id])
																	:	this.createLink(this.organisationInvestmentsRoisStoreRoute, [this.selected.organisation.id, this.selected.investment.id])
																;
				console.log(this.modals.roi.form.action);
				$(this.modals.roi.name).modal("show");
				
			},
			submitROIForm() {
				
				axios
					.post(this.modals.roi.form.action, this.modals.roi.form.fields)
					.then((response) => {
						
						this.getInvestmentsReturns(this.selected.investment, this.createLink(this.organisationInvestmentsReturnsRoute, [this.selected.organisation.id, this.selected.investment.id]));
						
						this.modals.roi.form.fields.amount				 =	"";
						this.modals.roi.form.fields.paid_at				 =	"";
						
						$(this.modals.roi.name).modal("hide");
						
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
				
				var idCount				 =	0;
				
				for (var i in ids) {
					
					--idCount;
					link					 =	link.replace(idCount, ids[i]);
					
				}
				
				return link;
				
			}
			
		}
	}
</script>