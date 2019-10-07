<template>
	<div class="row">
		<div class="col-md-8">
			<p class="text-30">Issue</p>
			<div class="d-flex">
				<p class="text-30 mr-auto">{{ issue.title }}</p>
				<a :href="issueEditRoute">
					<i class="fas fa-edit fa-2x"></i>
				</a>
				
			</div>
			<p>
				{{ issue.description }}
			</p>
			<div class="border border-right-0 border-left-0 p-3 mt-5 d-flex">
				<span class="badge badge-primary p-2 mr-2">{{ issue.status_name }}</span>
				<a :href="moduleShowRoute">{{ module.name }}</a>
			</div>
		</div>
		<div class="col-md-4">
			<p class="text-20">Other issues</p>
			<ul class="list-group">
				<li
					v-for="otherIssue in otherIssues"
					class="list-group-item bg-hover-orange"
				>
					<a :href="issueShowLink(otherIssue.module.id, otherIssue.id)" class="p-20 d-block">
						<p>{{ otherIssue.title }}</p>
						<span class="badge badge-primary">{{ otherIssue.module.name }}</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</template>

<script>
	export default {
		
		data							 :	() => {
			
			return {
				issue					 :	false,
				module					 :	false,
				otherIssues				 :	[],
			};
			
		},
		props							 :	{
			
			issueJson					 :	String,
			moduleJson					 :	String,
			issueIndexRoute				 :	String,
			issueEditRoute				 :	String,
			issueShowRoute				 :	String,
			moduleShowRoute				 :	String,
			
		},
		created() {
			
			this.issue					 =	JSON.parse(this.issueJson);
			this.module					 =	JSON.parse(this.moduleJson);
			
			this.loadOtherIssues([this.issue.id]);
			
		},
		mounted() {
			
		},
		methods							 :	{
			
			loadOtherIssues(excluding = []) {
				
				axios
					.get(this.issueIndexRoute, {
						params			 :	{
							excluding	 :	JSON.stringify(excluding)
						}
					})
					.then((response) => {
						
						this.otherIssues =	response.data.issues;
						
					});
				
			},
			issueShowLink(module, issue) {
				
				return this.issueShowRoute.replace(-1, module).replace(-2, issue);
				
			},
			
		}
		
	}
</script>