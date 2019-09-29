<template>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<h1>Modules</h1>
				<a class="btn btn-sm btn-danger text-white" @click="addModule($event)">Add New Module</a>
				<table class="table table-hover table-stripped table-border mt-2">
					<thead>
						<tr>
							<th>Name</th>
							<th>Issues</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="module in modules">
							<td>{{ module.name }}</td>
							<td>{{ module.issues.length }}</td>
							<td>
								<a
									class="btn btn-sm btn-secondary text-white"
									v-bind:href="createLink(showModuleLink, module.id)"
									@click.prevent="editModule(module.id)"
								>
									Edit
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div id="modulesFormModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{ modal.header }} Module</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form
						:action="modal.form.action"
						v-on:submit="submitForm"
						method="POST"
						:class="modal.form.errors ? 'was-validated' : 'needs-validation'"
					>
						<div class="modal-body">
							<p
								v-if="modal.form.messages.success"
								class="text-success"
							>{{ modal.form.messages.success }}</p>
							<p
								v-if="modal.form.messages.fail"
								class="text-danger"
							>{{ modal.form.messages.fail }}</p>
							<div class="form-group">
								<label>Name</label>
								<input
									type="text"
									name="name"
									:class="{'form-control': true, 'is-invalid' : modal.form.name && modal.form.errors.name}"
									v-model="modal.form.fields.name"
									required
								/>
								<div v-if="modal.form.errors && modal.form.errors.name" class="invalid-feedback">Name field is required.</div>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea
									name="description"
									:class="{'form-control': true, 'is-invalid' : modal.form.errors && modal.form.errors.description}"
									v-model="modal.form.fields.description"
									required
								></textarea>
								<div v-if="modal.form.errors && modal.form.errors.description" class="invalid-feedback">Description field is required.</div>
							</div>
						</div>
						<div class="modal-footer form-inline">
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button
								class="btn btn-sm btn-secondary"
								v-if="modal.header == 'Edit'"
								@click.prevent="deleteModule(modal.form.fields.id)"
							>
								Delete
							</button>
							<button type="submit" class="btn btn-sm btn-danger text-white">Save</button>
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
				modules					 :	[],
				modal					 :	{
					name				 :	"#modulesFormModal",
					header				 :	"Add",
					form				 :	{
						action			 :	"",
						fields			 :	{
							id			 :	"",
							name		 :	"",
							description	 :	"",
						},
						errors			 :	null,
						messages		 :	{
							success		 :	null,
							fail		 :	null,
						},
					},
				},
			};
			
		},
		props							 :	{
			indexModuleLink				 :	String,
			showModuleLink				 :	String,
			storeModuleLink				 :	String,
			updateModuleLink			 :	String,
			destroyModuleLink			 :	String,
		},
		created() {
			
			this.loadModules();
			
		},
		mounted() {
			
			this.modal.form.action		 =	this.storeModuleLink;
			
		},
		computed						 :	{
		},
		methods							 :	{
			
			loadModules() {
				
				axios
					.get(this.indexModuleLink)
					.then((response)	 =>	{
						
						this.modules	 =	response.data.modules.data;
						
					})
					.catch((error)		 =>	{
						
						console.log("Couldn't fetch data.");
						
					})
				;
				
			},
			createLink(link, id) {
				
				return link.replace(-1, id);
				
			},
			addModule($event) {
				
				this.modal.header		 =	"Add";
				this.modal.form.action	 =	this.storeModuleLink;
				this.modal.form.messages.success			 =	null;
				this.modal.form.fields.name					 =	"";
				this.modal.form.fields.description			 =	"";
				
				$(this.modal.name).modal("show");
				
			},
			editModule(id) {
				
				this.modal.header		 =	"Edit";
				this.modal.form.messages.success			 =	null;
				
				axios
					.get(this.createLink(this.showModuleLink, id))
					.then((response)	 =>	{
						
						this.modal.form.action				 =	this.createLink(this.updateModuleLink, id);
						this.modal.form.fields.id			 =	response.data.module.id;
						this.modal.form.fields.name			 =	response.data.module.name;
						this.modal.form.fields.description	 =	response.data.module.description;
						
						$(this.modal.name).modal("show");
						
					})
					.catch((error)		 =>	{
						
						console.log("Couldn't fetch data.");
						
					})
				;
				
			},
			deleteModule(id) {
				
				axios
					.post(this.createLink(this.destroyModuleLink, id))
					.then((response)	 =>	{
						
						this.loadModules();
						
						$(this.modal.name).modal("hide");
						
					})
					.catch((error)		 =>	{
						
						console.log("Couldn't fetch data.");
						
					})
				;
				
			},
			submitForm($event) {
				
				$event.preventDefault();
				
				axios
					.post(this.modal.form.action, {
						
						name			 :	this.modal.form.fields.name,
						description		 :	this.modal.form.fields.description,
						
					})
					.then((response)	 =>	{
						
						if (this.modal.header == "Add") {
							
							this.modal.form.fields.name							 =	"";
							this.modal.form.fields.description					 =	"";
							
						}
						
						this.loadModules();
						
						this.modal.form.errors				 =	null;
						this.modal.form.messages.success	 =	response.data.message;
						
					})
					.catch((error)		 =>	{
						
						this.modal.form.messages.success	 =	null;
						this.modal.form.errors				 =	error.response.data.errors;
						
					})
				;
				
			}
			
		},
	}
</script>
