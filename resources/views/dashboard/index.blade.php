@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')
<div class="col-md-12 mx-auto my-5">

		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Filter Tanggal</div>
					<div class="panel-body btn-margins">
						<div class="col-md-12">
							<form id="form_order" action="{{url('dashboard')}}" method="post" autocomplete="off" >
								{{ csrf_field() }}
								<div class="form-group">
									<b>Mulai</b>
									<input type="text" name="start" placeholder="Dari Tanggal" class=" form-control" required="required" id="startDate">
								</div>
								<div class="form-group">
									<b>Sampai</b>
									<input type="text" name="end" placeholder="Sampai Tanggal" class=" form-control" required="required" id="endDate">
								</div>
									<input type="submit" value="Cari" class="btn btn-primary">
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.panel-->
		</div>

		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Banyak Transaksi Perhari
						{{-- <ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>  --}}
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas   id="perHari" width="400" height="200" ></canvas>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Jumlah Transaksi Perbulan
						<!-- <ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul> -->
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas   id="perBulan" width="400" height="300" ></canvas>

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Jumlah Transaksi Pertahun
						<!-- <ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 1
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 2
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Settings 3
											</a></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul> -->
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas   id="perTahun" width="400" height="300" ></canvas>

						</div>
					</div>
				</div>
			</div>
		</div>


</div>
@endsection


@section('dscript')



<script>
	var ctx = document.getElementById("perHari");
	var coloR = [];
	var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
	};

	var getRandomColor = function(j) {
		 for (var i = 0; i <j ; i++ ) {
			coloR.push(dynamicColors());
		 };
		 return coloR;
	};
	var myChart = new Chart(ctx, {
		type: 'line',
		data:
		{
			labels: [
						<?php	
								$arrSize=count($trs);
								$first=true;
								$temp='';
								$count=0;
								$color=0;

								foreach($trs as $row)
								{
									if ($first)
									{
										$first=false;
										$temp=substr($row->created_at, 0, 10);
										echo  '"' . substr($row->created_at, 0, 10) . '",';
									}
									else//loop diatas 0
									{
										if($temp!=substr($row->created_at, 0, 10))//apabila ada kesamaan tanggal
										{
											echo '"' . substr($row->created_at, 0, 10) . '",';
											$temp=substr($row->created_at, 0, 10);
										}
									}
								}
						?>
					],
			datasets:
			[
				{
					label: 'Jumlah Transaksi',
					data:
					[
						<?php
								$iterasi=0;
								$temp='';
								$count=0;
								foreach($trs as $row)
								{
									if($iterasi==0)
									{
										$first=false;
										$temp=substr($row->created_at, 0, 10);
										$count++;
										if($arrSize==1)
										echo '"' . $count . '",'; $color++;
									}
								
									else{
										$dateNow=substr($row->created_at, 0, 10);
										if($temp == $dateNow)//apabila ada kesamaan tanggal
										{
											$count++;
										}
										else//apabila tgl sdh tidak sama
										{
										// dd($dateNow);
											// if($count==0)//
											// {
											// 	$count=1;
											// }
											echo '"' . $count . '",'; $color++;
											$temp=substr($row->created_at, 0, 10);
											$count=1;//pada saat $dateNow merupakan tgl yang baru
										}
									}

									$iterasi++;
								}
									if($iterasi==$arrSize)//loop diatas 0
									{
										//$count++;
										echo '"' . $count . '",'; $color++;
										//  dd($arrSize.$iterasi.$count);
									}
								//dd($arrSize);
						?>
					],
					pointBackgroundColor : getRandomColor(<?php echo $color ?>),
					borderWidth: 1
				}
			]
		},

		options:
		{
			scales:
			{
				yAxes:
				[
					{
						ticks:
						{
							beginAtZero: true
						}
					}
				]
			}
		}
	});
</script>

<script>
	var ctx = document.getElementById("perBulan");
	var coloR = [];
	var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
	};

	var getRandomColor = function(j) {
		 for (var i = 0; i <j ; i++ ) {
			coloR.push(dynamicColors());
		 };
		 return coloR;
	};

	var myChart = new Chart(ctx, {
		type: 'bar',
		data:
		{
			labels: [
						<?php	
								
								$first=true;
								$temp='';
								$count=0;
								$color=0;
								$arrBulan	=array(
										"01"	=>	"Januari",
										"02"	=>	"Februari",
										"03"	=>	"Maret",
										"04"	=>	"April",
										"05"	=>	"Mei",
										"06"	=>	"Juni",
										"07"	=>	"Juli",
										"08"	=>	"Agustus",
										"09"	=>	"September",
										"10"	=>	"Oktober",
										"11"	=>	"November",
										"12"	=>	"Desember"
									);
								foreach($arrBulan as $key => $value)
								{
									echo '"' . $value . '",';
								}
						?>
					],
			datasets:
			[
				{
					label: 'Jumlah Transaksi',
					data:
					[
						<?php
								$arrSize=count($trs);
								foreach($arrBulan as $key => $value)//perbulan
								{
									$iterasi=0;
									$temp='';
									$count=0;

									foreach($trs as $row)//per tanggal
									{
										$monthNow=substr($row->created_at, 5, 2);
										if($key==$monthNow)//jika angka bulan $arrBulan sama dengan tanggal yang di foreach
										{
											if($iterasi==0)
											{
												$first=false;
												$temp=substr($row->created_at, 5, 2);
												$count++;

												if($arrSize==1)
												echo '"' . $count . '",'; $color++;
											}
										
											else{
												
												if($temp==$monthNow)//apabila ada kesamaan bulan
												{
													$count++;
												}
												else//apabila tgl sdh tidak sama
												{
												// dd($monthNow);
													// if($count==0)
													// {
													// 	$count=1;
													// }
													//echo '"' . $count . '"  ,';
													$temp=substr($row->created_at, 5, 2);
													$count=1;//pada saat $monthNow merupakan tgl yang baru
												}
											}

										}
										$iterasi++;
									}

									if($iterasi==$arrSize && $arrSize>1)//loop diatas 0
									{
										//$count++;
										echo '"' . $count . '"         ,'; $color++;
										//  dd($arrSize.$iterasi.$count);
									}else{
										echo '"0"      ,'; $color++;
									}
									//dd($arrSize);
								}
						?>
					],
					backgroundColor: getRandomColor(<?php echo $color ?>),
					borderWidth: 1
				}
			]
		},

		options:
		{
			scales:
			{
				yAxes:
				[
					{
						ticks:
						{
							beginAtZero: true
						}
					}
				]
			}
		}
	});
</script>

<script>
	var ctx = document.getElementById("perTahun");
	
	var coloR = [];
	var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            return "rgb(" + r + "," + g + "," + b + ")";
	};

	var getRandomColor = function(j) {
		 for (var i = 0; i <j ; i++ ) {
			coloR.push(dynamicColors());
		 };
		 return coloR;
	};

	var myChart = new Chart(ctx, {
		type: 'bar',
		data:
		{
			labels: [
						<?php	
								$arrSize=count($trs);
								$first=true;
								$temp='';
								$count=0;
								$color=0;
								foreach($trs as $row)
								{
									if ($first)
									{
										$first=false;
										$temp=substr($row->created_at, 0, 4);
										echo  '"' . substr($row->created_at, 0, 4) . '",';
									}
									else//loop diatas 0
									{
										if($temp!=substr($row->created_at, 0, 4))//apabila ada kesamaan tanggal
										{
											echo '"' . substr($row->created_at, 0, 4) . '",';
											$temp=substr($row->created_at, 0, 4);
										}
									}
								}
						?>
					],
			datasets:
			[
				{
					label: 'Jumlah Transaksi',
					data:
					[
						<?php
								$iterasi=0;
								$temp='';
								$count=0;
								$color=0;

								foreach($trs as $row)
								{

						           
									if($iterasi==0)
									{
										$first=false;
										$temp=substr($row->created_at, 0, 4);
										$count++;
										if($arrSize==1)
										echo '"' . $count . '",'; $color++;
									}
								
									else{
										$yearNow=substr($row->created_at, 0, 4);
										if($temp==$yearNow)//apabila ada kesamaan tanggal
										{
											$count++;
										}
										else//apabila tgl sdh tidak sama
										{
										// dd($yearNow);
											// if($count==0)//
											// {
											// 	$count=1;
											// }
											echo '"' . $count . '",'; $color++;
											$temp=substr($row->created_at, 0, 4);
											$count=1;//pada saat $yearNow merupakan tgl yang baru
										}
									}

									$iterasi++;
								}
									if($iterasi==$arrSize)//loop diatas 0
									{
										//$count++;
										echo '"' . $count . '",'; $color++;
										//  dd($arrSize.$iterasi.$count);
									}
								//dd($arrSize);
						?>
					],

					backgroundColor: getRandomColor(<?php echo $color ?>),
					borderWidth: 1
				}
			]
		},

		options:
		{
			scales:
			{
				yAxes:
				[
					{
						ticks:
						{
							beginAtZero: true
						}
					}
				]
			}
		}
	});
</script>


{{-- <script>
  $(document).ready(function() {
        // page is now ready, initialize the calendar...
		var calHeight = 1000;
        $('#calendar').fullCalendar({
			height:calHeight,
			contentHeight:calHeight,
            // put your options and callbacks here
            defaultView: 'agendaWeek',
            events : [
                 @foreach($agenda as $agn)
                {
                    title : '{{'Kendaraan : '.$agn->kendaraan.' Peminjam : '.$agn->peminjam}}',
                    start : '{{ $agn->tgl_pinjam}}',
						end: '{{ $agn->tgl_kembali }}',

                },
                @endforeach
            ],
        });
    });
</script> --}}


	<script>
		$(document).ready( function () {
			$("#table_id").dataTable({
			"responsive" : true,
			"columnDefs" : [
				{responsivePriority : 1, targets : 0},
				{responsivePriority : 2, targets : 1},
				{responsivePriority : 3, targets : 2}
			]
			});
		});
	</script>




@endsection