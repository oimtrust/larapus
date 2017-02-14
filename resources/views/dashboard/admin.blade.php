@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Dashboard</h2>
					</div>

					<div class="panel-body">
						Selamat Datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang di inginkan.
						<hr>
						<h4>Statistik Penulis</h4>
						<canvas id="chartPenulis" width="400" height="150"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/js/Chart.min.js"></script>
<script>
	var data = {
		labels: {!! json_encode($authors) !!},
		datasets: [{
			label: 'Jumlah Buku',
			data: {!! json_encode($books) !!},
			backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
		}]
	};
	var options = {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true,
					stepSize: 1
				}
			}]
		}
	};

	var ctx = document.getElementById("chartPenulis").getContext("2d");

	var authorChart = new Chart(ctx, {
		type: 'bar',
		data: data,
		options: options
	});
</script>
@endsection