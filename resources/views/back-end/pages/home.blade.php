@extends('back-end.layouts.main')

@section('title')
Bảng Tin
@endsection


@section('content')
<!-- HEADER POST -->
<div class="wrapper wrapper-content">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-content">
					<div>
						<span class="pull-right text-right">
							<small>Average value of sales in the past month in: <strong>United states</strong></small>
							<br/>
							All sales: 162,862
						</span>
						<h1 class="m-b-xs">$ 50,992</h1>
						<h3 class="font-bold no-margins">
							Half-year revenue margin
						</h3>
						<small>Sales marketing.</small>
					</div>

					<div>
						<canvas id="lineChart" height="70"></canvas>
					</div>

					<div class="m-t-md">
						<small class="pull-right">
							<i class="fa fa-clock-o"> </i>
							Update on 16.07.2015
						</small>
						<small>
							<strong>Analysis of sales:</strong> The value has been changed over time, and last month reached a level over $50,000.
						</small>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-primary pull-right">Today</span>
					<h5>visits</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">22 285,400</h1>
					<div class="stat-percent font-bold text-navy">20% <i class="fa fa-level-up"></i></div>
					<small>New orders</small>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-info pull-right">Monthly</span>
					<h5>Orders</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">60 420,600</h1>
					<div class="stat-percent font-bold text-info">40% <i class="fa fa-level-up"></i></div>
					<small>New orders</small>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-warning pull-right">Annual</span>
					<h5>Income</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">$ 120 430,800</h1>
					<div class="stat-percent font-bold text-warning">16% <i class="fa fa-level-up"></i></div>
					<small>New orders</small>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('backend/js/plugins/chartJs/Chart.min.js')}}"></script>
<script>
	$(document).ready(function() {

		var lineData = {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [
			{
				label: "Example dataset",
				backgroundColor: "rgba(26,179,148,0.5)",
				borderColor: "rgba(26,179,148,0.7)",
				pointBackgroundColor: "rgba(26,179,148,1)",
				pointBorderColor: "#fff",
				data: [28, 48, 40, 19, 86, 27, 90]
			},
			{
				label: "Example dataset",
				backgroundColor: "rgba(220,220,220,0.5)",
				borderColor: "rgba(220,220,220,1)",
				pointBackgroundColor: "rgba(220,220,220,1)",
				pointBorderColor: "#fff",
				data: [65, 59, 80, 81, 56, 55, 40]
			}
			]
		};

		var lineOptions = {
			responsive: true
		};


		var ctx = document.getElementById("lineChart").getContext("2d");
		new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

	});
</script>
@endsection
