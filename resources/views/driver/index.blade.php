@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')

	<div class="col-lg-12 mx-auto my-5">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data user</div>
					<div class="panel-body btn-margins">
						<div class="col-md-12">
							<table  id="" class="responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Instansi</th>
										<th>Foto</th>
										<th>KTP</th>
										<th width="200">OPSI</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $g)
									<tr>
										<td>{{ $loop->iteration }}</td>
																
										<td>{{ $g->name }}</td>
										<td>{{ $g->email }}</td>
										<td>{{ $g->nama_instansi }}</td>
										<td>
											<a href="{{ Storage::url($g->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
												<img  width="50px"  src="{{ Storage::url($g->foto_profil) }}" class="img-fluid">
											</a>
										</td>
										<td>
											<a href="{{ Storage::url($g->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
												<img  width="50px"  src="{{ Storage::url($g->foto_ktp) }}" class="img-fluid">
											</a>
										</td>
										<td>
											<a class="btn btn-info" href="/driver/show/user/{{ $g->id_user }}">Pilih</a>
											{{-- <button class="btn btn-danger deleteDriver" id="driver_{{ $g->id_user }}"">HAPUS</button> --}}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Sopir</div>
					<div class="panel-body btn-margins">
						<div class="col-md-12">
							<table  id="table_id" class="responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Instansi</th>
										<th>Foto</th>
										<th>KTP</th>
										<th width="200">OPSI</th>
									</tr>
								</thead>
								<tbody>
									@foreach($drivers as $h)
									<tr>
										<td>{{ $loop->iteration }}</td>
																
										<td>{{ $h->name }}</td>
										<td>{{ $h->email }}</td>
										<td>{{ $h->nama_instansi }}</td>
										<td>
											<a href="{{ Storage::url($h->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
												<img  width="50px"  src="{{ Storage::url($h->foto_profil) }}" class="img-fluid">
											</a>
										</td>
										<td>
											<a href="{{ Storage::url($h->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
												<img  width="50px"  src="{{ Storage::url($h->foto_ktp) }}" class="img-fluid">
											</a>
										</td>
										<td>
											{{-- <a class="btn btn-info" href="/driver/show/user/{{ $h->id_driver }}">DETAIL</a> --}}
											<button class="btn btn-danger deleteDriver" id="driver_{{ $h->id_driver }}"">HAPUS</button>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

<!-- -----------------------------------------------  modal  --------------------------------------------------------- -->
	<div class="modal fade" id="mdlDel" role="dialog" >
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
			$('#table_id').on("click", ".deleteDriver", function(){  //editAkun == class button
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
					$('#mdlDel').modal('show'); //id modal-fade
				}
			});
			});
		});
	</script>



	<script>
		$(document).ready( function () {
			$("#table_id").dataTable({
			"responsive" : true,
			"columnDefs" : [
				{responsivePriority : 0, targets : 0},
				{responsivePriority : 1, targets : 1},
				{responsivePriority : 2, targets : 2},
				{responsivePriority : 3, targets : 3},
				{responsivePriority : 4, targets : 4},
				{responsivePriority : 5, targets : 5},
				{responsivePriority : 6, targets : 6},
			]
			});
		});
	</script>




@endsection