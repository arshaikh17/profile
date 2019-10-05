<template>
	<form
		method="POST"
		@submit.prevent="submitForm"
	>
		<div class="row">
			<div class="col-12">
				<p class="text-30 mt-2">{{ issue.id ? "Edit" : "Add" }} Issue</p>
				<p
					v-if="form.success"
					:class="form.success ? 'text-success' : 'text-danger'"
				>
					Issue saved
				</p>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label>Title</label>
					<input
						type="text"
						name="title"
						class="form-control"
						v-model="form.fields.title"
						required
					/>
				</div>
			</div>
			<div class="col-12">
				<div class="form-group">
					<label>Descriptipn</label>
					<textarea
						class="form-control"
						name="description"
						v-model="form.fields.description"
						required
					></textarea>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label>URL/Path</label>
					<input
						type="text"
						name="url"
						class="form-control"
						v-model="form.fields.url"
					/>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label>Progress Status</label>
					<select
						class="form-control"
						name="status"
						required
						v-model="form.fields.status"
					>
						<option selected value="0">Select Status</option>
						<option v-for="(status, statusKey) in statuses" :value="statusKey">{{ status }}</option>
					</select>
				</div>
			</div>
			<div class="col-12 text-right">
				<div class="form-group">
					<input type="submit" class="btn btn-sm btn-primary" value="Save" />
				</div>
			</div>
		</div>
	</form>
</template>

<script>
	export default {
		
		data							 :	() => {
			
			return {
				module					 :	[],
				issue					 :	[],
				statuses				 :	[],
				form					 :	{
					fields				 :	{
						title			 :	"",
						description		 :	"",
						url				 :	"",
						status			 :	"0",
					},
					success				 :	false,
				},
			};
			
		},
		props							 :	{
			
			moduleJson					 :	String,
			issueJson					 :	String,
			statusesJson				 :	String,
			indexRoute					 :	String,
			submitRoute					 :	String,
			
		},
		created() {
			
			this.module					 =	JSON.parse(this.moduleJson);
			this.issue					 =	JSON.parse(this.issueJson);
			this.statuses				 =	JSON.parse(this.statusesJson);
			
		},
		mounted() {
			
		},
		methods							 :	{
			
			submitForm() {
				
				axios
					.post(this.submitRoute, this.form.fields)
					.then((response)	 =>	{
						
						this.form.success					 =	true;
						this.form.fields.title				 =	"";
						this.form.fields.description		 =	"";
						this.form.fields.url				 =	"";
						this.form.fields.status				 =	"0";
						
					})
				;
				
			}
			
		}
		
	}
</script>