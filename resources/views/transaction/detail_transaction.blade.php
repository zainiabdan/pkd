@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')

	<div class="col-lg-12 mx-auto my-5">
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Transaksi</div>
					<div class="panel-body btn-margins">
						<div class="col-md-12">

							<div class="row">
								
								<div class="col-md-2">
									<b> Foto Profil </b>
									<a href="{{ Storage::url($trs->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
										<img  style="witdh:100px; height:100px; object-fit: cover;"  src="{{ Storage::url($trs->foto_profil) }}" class="img-fluid">
									</a>
								</div>
								<div class="col-md-2">
									<b> Foto KTP </b>
									<a href="{{ Storage::url($trs->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
										<img  style="witdh:100px; height:100px; object-fit: cover;"  src="{{ Storage::url($trs->foto_ktp) }}" class="img-fluid">
									</a>
								</div>
								<div class="col-md-4">
									<div class="form-group"> <b> Peminjam </b>
										<div  class="" >
											<a href="{{ url('user/show').'/'.$trs->id_user }}">
												{{$trs->peminjam}}
											</a>
											
										</div>
									</div>
									
									<div class="form-group"> <b> Nama Instansi </b>
										<div  class=""  >{{$trs->nama_instansi}}</div>
									</div>
									
									<div class="form-group"> <b> Keperluan </b>
										<div  class=""  >{{$trs->keperluan}}</div>
									</div>
									
									<div class="form-group"> <b> Tujuan </b>	
										<div  class=""  >{{$trs->tujuan}}</div>
									</div>
									
									
								</div>


								
								<div class="col-md-4">
									
									<div class="form-group"> <b> Tanggal Pesan </b>	
										<div  class=""  >{{$trs->created_at}}</div>
									</div>
									
									<div class="form-group"> <b> Mulai Tanggal </b>
										<div  class=""  >{{$trs->tgl_pinjam}}</div>
									</div>
									
									<div class="form-group"> <b> Sampai Tanggal </b>
										<div  class=""  >{{$trs->tgl_kembali}}</div> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Kendaraan</div>
					<div class="panel-body btn-margins">
						<div class="col-md-12">
							<table  id="table_vehicle" class="responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Foto</th>
										<th>Nama Kendaraan</th>
										<th>Nomor Plat</th>
									
										<th>kursi</th>
										<th>Transmisi</th>
										<th>AC</th>
										<th>Nama Sopir</th>
										<th width="200">OPSI</th>
									</tr>
								</thead>
								<tbody>
									@foreach($vehicles as $v)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>
											<a href="{{ Storage::url($v->file) }}" data-toggle="lightbox" data-title=" " data-footer="">
												<img  width="100px"  src="{{ Storage::url($v->file) }}" class="img-fluid">
											</a>
										</td>
										<td>{{$v->name}}</td>
										<td>{{$v->nopol}}</td>
									
										<td>{{$v->seats}}</td>
										<td>{{$v->transmission}}</td>
										<td>{{$v->ac == '1' ? "Ya" : 'Tidak' }}</td>
										<td>
											@foreach($drivers as $d)
												@if($d->id_driver==$v->id_driver)
													<a href="{{ url('user/show').'/'.$d->id_user }}">
														{{ $d->name }}
													</a>
												@endif
											@endforeach
										</td>
										<td >
											{{-- <a class="btn btn-info" href="/vehicles/edit/{{ $v->id_vehicle }}">EDIT</a> --}}
											@if($v->id_driver==''||$v->id_driver==null)
												<button class="btn btn-info selectDriver" id="vehicle_{{ $v->id_detail_transaction }}">Pilih Sopir</button>
											@elseif($trs->status!='4')
												<button class="btn btn-warning selectDriver" id="vehicle_{{ $v->id_detail_transaction }}">Ganti Sopir</button>
											@else
											
											@endif
											{{-- <button class="btn btn-info deleteDriver" id="vehicle_{{ $v->id_detail_transaction }}">hapus Sopir</button> --}}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
		</div>
	
	</div>

	

<!-- -----------------------------------------------  modal  --------------------------------------------------------- -->
	<div class="modal fade" id="modal-detail" role="dialog" >
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
		$(document).ready(function(){
			$('#table_vehicle').on("click", ".selectDriver", function(){  //editAkun == class button
				// $('#modal-detail').modal('show'); //id modal-fade
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var id = this.id;
				var splitid = id.split('_');
				var idDetail = splitid[1];//var yg dilempar
            	//	console.log(err);
				
				// AJAX request
				$.ajax({
				url: "{{ url('transactions-select-driver') }}", // file php proses 
				type: 'post',
				data: {id: idDetail},//var yg dilempar
				success: function(response){ 
					// Add response in Modal body
					$('#modal-section').html(response);
					$('#modal-detail').modal('show'); //id modal-fade
					// Display Modal
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
			$('#table_vehicle').on("click", ".deleteDriver", function(){  //editAkun == class button
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
				url: 'driver-modal-destroy', // file php proses 
				type: 'post',
				data: {id: deleteId},//var yg dilempar
				success: function(response){ 
					// Add response in Modal body
					$('#modal-section').html(response);
					// Display Modal
					$('#modal-detail').modal('show'); //id modal-fade
				}
				,
				 error: function(err){
            		console.log(err)
        		}
			});
			});
		});
	</script>



	<script>
		$(document).ready( function () {
			$("#table_vehicle").dataTable({
			"responsive" : true,
			"columnDefs" : [
				{responsivePriority : 0, targets : 0},
				{responsivePriority : 1, targets : 1},
				{responsivePriority : 2, targets : 2},
				{responsivePriority : 3, targets : 3},
				{responsivePriority : 4, targets : 4},
				{responsivePriority : 5, targets : 5},
				{responsivePriority : 6, targets : 6},
				{responsivePriority : 7, targets : 7},
				{responsivePriority : 8, targets : 8}
			]
			});
		});
	</script>




@endsection