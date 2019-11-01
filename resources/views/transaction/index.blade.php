@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')
<div class="col-md-12 mx-auto my-5">	

		@if(count($errors) > 0)
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
			{{ $error }} <br/>
			@endforeach
		</div>
		@endif

		@php
			$title = array( "Belum disetujui", "Ditolak", "Telah disetujui", "Telah dipinjamkan", "Dikembalikan"); 
			$cnd = 0;
		@endphp
		
		


		@foreach($title as $arr)
			
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">{{ $arr }}</div>
						<div class="panel-body btn-margins">
							<div class="col-md-12">
								<table  class="table_id responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th>Peminjam</th>
											<th>Instansi</th>
											<th>Keperluan</th>
											<th>Tujuan</th>
											{{-- <th>Kendaraan</th>
											<th>Plat</th> --}}
											<th>Tanggal Pesan</th>
											{{-- <th>Mulai Tanggal</th>
											<th>Sampai Tanggal</th> --}}
											{{-- <th>Gambar</th> --}}
											{{-- <th>KTP</th> --}}
											<th width="200">OPSI</th>
										</tr>
									</thead>
									<tbody>
										
										@php $i=0; @endphp
										@foreach($trs as $tr)
										@if($tr->status==$cnd)
											@php $i++; @endphp
											<tr>
												<td>{{$i}}</td>
												<td>
													<a href="{{ url('user/show').'/'.$tr->id_user }}">
														{{$tr->peminjam}}
													</a>
												</td>
												<td>{{$tr->nama_instansi}}</td>
												<td>{{$tr->keperluan}}</td>
												<td>{{$tr->tujuan}}</td>
												{{-- <td>{{$tr->kendaraan}}</td>
												<td>{{$tr->nopol}}</td> --}}
												<td>{{$tr->created_at}}</td>
												{{-- <td>{{$tr->tgl_pinjam}}</td>
												<td>{{$tr->tgl_kembali}}</td> --}}
												{{-- <td>
													<a href="{{ Storage::url($tr->file) }}" data-toggle="lightbox" data-title=" " data-footer="">
														<img style="witdh:100px; height:100px; object-fit: cover;" src="{{ Storage::url($tr->file) }}" class="img-fluid">
													</a>
												</td> 
												<td>
													<a href="{{ Storage::url($tr->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
														<img  style="witdh:100px; height:100px; object-fit: cover;"  src="{{ Storage::url($tr->foto_ktp) }}" class="img-fluid">
													</a>
												</td>--}}
												<td >
													@if($tr->status=="0")
													<a href='{{ url('transactions/detail').'/'.$tr->id_transaction }}' class='btn-info btn-xs btn'>Setujui</a>
													<button id='dec_{{$tr->id_transaction}}' class='btn btn-danger btn-xs declineTransaction'>Tolak</button>
													@else
													<a href='{{ url('transactions/detail').'/'.$tr->id_transaction }}' class='btn-info btn-xs btn'>Selengkapnya</a>
													@endif
													
													<button id='set_{{$tr->id_transaction}}' class='btn btn-warning btn-xs setTransaction'>Atur</button>
													<button id='del_{{$tr->id_transaction}}' class='btn btn-danger btn-xs deleteTransaction'>Hapus</button>

													
												</td>
											</tr>
											@endif
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div><!-- /.panel-->
				</div>
			</div>
			@php $cnd++; @endphp
		@endforeach


</div>


<!-- -----------------------------------------------  modal  --------------------------------------------------------- -->
<!-- employ  id            -->
	<div class="modal fade" id="mdlTrs" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
					<div id='modal-section'>
						
					</div>
			</div>
		</div>
	</div> <!-- myModalLabel -->
<!-- -----------------------------------------------end  modal --------------------------------------------------------- -->


@endsection


@section('dscript')

	<script>
		$(document).ready( function () {
			$(".table_id").dataTable({
			"responsive" : true,
			"columnDefs" : [

				{responsivePriority : 0, targets : 0},
				{responsivePriority : 1, targets : 2},
				{responsivePriority : 2, targets : 1},
				{responsivePriority : 3, targets : 4},
				{responsivePriority : 4, targets : 5},
				{responsivePriority : 5, targets : 3},
				{responsivePriority : 6, targets : 6},
			]
			});
		});
	</script>

	
	<script>
			$(document).ready(function(){
				$('.table_id').on("click", ".setTransaction", function(){ //editAkun == class button
					//$('#mdlTrs').modal('show'); //id modal-fade
					$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});

					var id = this.id;
					var splitid = id.split('_');
					var  idTrs = splitid[1];//var yg dilempar
					// AJAX request
					$.ajax({
					url: '{{ url("transactions-modal-set-status") }}', // file php proses 
					type: 'post',
					data: {id: idTrs},//var yg dilempar
					success: function(response){ 
						// Add response in Modal body
						$('#modal-section').html(response);
						// Display Modal
						$('#mdlTrs').modal('show'); //id modal-fade
					}
					,
					 error: function(err){
						console.log(err);
					}
				});
				});
			});
	</script>


	<script>
		$(document).ready(function(){
			$('.table_id').on("click", ".declineTransaction", function(){  //editAkun == class button
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var id = this.id;
				var splitid = id.split('_');
				var declineId = splitid[1];//var yg dilempar
				
				// AJAX request
				$.ajax({
				url: '{{ url("transactions-modal-decline") }}', // file php proses 
				type: 'post',
				data: {id: declineId},//var yg dilempar
				success: function(response){ 
					// Add response in Modal body
					$('#modal-section').html(response);
					// Display Modal
					$('#mdlTrs').modal('show'); //id modal-fade
				},
				 error: function(err){
						console.log(err);
					}
			});
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('.table_id').on("click", ".deleteTransaction", function(){  //editAkun == class button
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var id = this.id;
				var splitid = id.split('_');
				var deleteId = splitid[1];//var yg dilempar
				
				// AJAX request
				$.ajax({
				url: '{{ url("transactions-modal-destroy") }}', // file php proses 
				type: 'post',
				data: {id: deleteId},//var yg dilempar
				success: function(response){ 
					// Add response in Modal body
					$('#modal-section').html(response);
					// Display Modal
					$('#mdlTrs').modal('show'); //id modal-fade
				}
			});
			});
		});
	</script>


@endsection