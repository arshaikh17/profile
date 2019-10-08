<template>
	<div class="row">
		<div class="col-12">
			<p class="text-30">{{ currentStatus }} Issues</p>
			<div class="form-inline">
				<a
					class="btn btn-sm btn-primary mr-2"
					v-for="(status, statusKey) in statuses"
					href="#"
					@click.prevent="loadIssues(statusKey, $event)"
				>
					{{ status }}
				</a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Issue</th>
					</tr>
				</thead>
				<tbody>
					<tr v-if="!issues.length">
						<td>
							{{ emptyResult }}
						</td>
					</tr>
					<tr v-for="issue in issues">
						<td class="d-flex">
							<div class="mr-auto">
								<span class="badge bg-primary p-1">{{ issue.status_name }}</span>
								<a
									:href="createLink(moduleIssueShowRoute, [issue.module.id, issue.id])"
									class="text-20 d-block"
								>
									{{ issue.title }}
								</a>
								<span class="d-block">
									{{ issue.description.substr(1, 100) }}
								</span>
								<span class="mt-3 d-block">
									<a
										:href="createLink(moduleShowRoute, [issue.module.id])"
									>
										{{ issue.module.name }}
									</a>
								</span>
							</div>
							<div>
								<a
									:href="createLink(moduleIssueEditRoute, [issue.module.id, issue.id])"
								>
									<i class="fas fa-edit fa-2x"></i>
								</a>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			
		</div>
	</div>
</template>

<script>
	export default {
		
		data							 : () => {
			
			return {
				statuses				 :	[],
				issues					 :	[],
				emptyResult				 :	"",
				currentStatus			 :	"Open",
			};
			
		},
		props							 :	{
			
			statusesJson				 :	String,
			indexRoute					 :	String,
			moduleShowRoute				 :	String,
			moduleIssueShowRoute		 :	String,
			moduleIssueEditRoute		 :	String,
			
		},
		created() {
			
			this.statuses				 =	JSON.parse(this.statusesJson);
			this.loadIssues();
			
		},
		mounted() {
			
		},
		methods							 :	{
			
			createLink(route, values = []) {
				
				var replaceVal			 =	-1;
				
				for (var i in values) {
					
					route				 =	route.replace(replaceVal, values[i]);
					replaceVal--;
					
				}
				
				return route;
				
			},
			loadIssues(status = false, event = false) {
				
				this.emptyResult		 =	"Loading issues"
				
				if (event) this.currentStatus				 =	event.target.innerText;
				
				axios
					.get(this.indexRoute, {
						params			 :	{
							status		 :	status
						}
					})
					.then((response)	 =>	{
						
						if (!response.data.issues.length) {
							
							this.emptyResult				 =	"No issues found.";
							
						}
						
						this.issues		 =	response.data.issues;
						
					})
				;
				
			}
			
		},
		
	}
</script>