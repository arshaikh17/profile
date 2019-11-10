<template>
	<div class="row mt-5">
		<div class="col-12">
			<div class="px-4 py-5 bg-light-grey">
				<div class="clearfix">
					<div class="float-left">
						<h3>{{ organisation.name }}</h3>
						<span class="badge badge-dark p-3">{{ organisation.type }}</span>
					</div>
					<div class="float-right">
						<img :src="assetLink + '/' + organisation.logo" width="50" class="img-fluid" />
					</div>
				</div>
			</div>
			<div class="bg-light-blue-grey organisation-statistics p-4">
				<h3>Statistics</h3>
				<div class="row mt-5 text-center">
					<div class="col-md-4">
						<h4>Investments</h4>
						<div class="text-20">
							{{ organisation.investments.length }}
						</div>
					</div>
					<div class="col-md-4">
						<h4>ROIs</h4>
						<div class="text-20">
							{{ organisation.total_rois }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="bg-light-grey p-4">
				<h3>Investments</h3>
				<div class="row">
					<div class="col-md-4">
						<ul class="list-group">
							<li
								class="list-group-item hover-link"
								v-for="investment in organisation.investments"
								@click="getRois(investment, createLink(organisationsInvestmentsRoisRoute, [investment.id]))"
							>
								<sub>{{ investment.currency }}</sub>{{ investment.amount }}
								<div>
									<span class="badge badge-dark">{{ investment.roi_percentage }}%</span>
									<span class="badge badge-dark">{{ investment.return_type }}</span>
								</div>
							</li>
						</ul>
					</div>
					<div class="col-md-8" v-if="selected.investment">
						<div class="row text-center">
							<div class="col-md-4 bg-light-blue-grey p-2">
								<h5>Total</h5>
								<span>{{ rois.length }}</span>
							</div>
							<div class="col-md-4 bg-light-grey p-2">
								<h5>Estimated ROI</h5>
								<span><sub>{{ selected.investment.currency }}</sub>{{ selected.investment.roi_amount }}</span>
							</div>
							<div class="col-md-4 bg-light-blue-grey p-2">
								<h5>Total ROI</h5>
								<span><sub>{{ selected.investment.currency }}</sub>{{ selected.investment.total_roi_amount }}</span>
							</div>
						</div>
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>Amount</th>
									<th>Paid At</th>
								</tr>
							</thead>
							<tbody>
								<tr v-if="!rois.length">
									<td>No rois in this investment</td>
								</tr>
								<tr v-for="roi in rois">
									<td><sub>{{ selected.investment.currency }}</sub>{{ roi.amount }}</td>
									<td>{{ roi.paid_at }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style>
	.organisation-statistics {
	}
</style>
<script>
	export default {
		
		data : () => {
			return {
				organisation : false,
				selected : {
					
					investment : false,
				},
				rois : [],
			}
		},
		props :  {
			assetLink : String,
			
			organisationJson : String,
			
			organisationsInvestmentsRoisRoute : String,
		},
		created() {
			this.organisation = JSON.parse(this.organisationJson); 
		},
		mounted() {
			
		},
		methods :  {
			getRois(investment, url) {
				
				this.rois = [];
				this.selected.investment = investment;
				console.log(this.investment);
				axios
				.get(url)
				.then((response) => {
					this.rois = response.data.rois;
					//console.log(response.data.rois)
				})
				;
				
			},
			createLink(link, ids = []) {
				
				var idCount				 =	0;
				
				for (var i in ids) {
					
					--idCount;
					link					 =	link.replace(idCount, ids[i]);
					
				}
				
				return link;
				
			},
		}
		
	}
</script>