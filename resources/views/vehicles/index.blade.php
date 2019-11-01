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

		<div class='row'>
			<div class='col-md-12'>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">Form Kendaraan</div>
							<div class="panel-body btn-margins">
								<div class="col-md-12">
									<form action="{{ url('vehicles/store') }}" method="POST" enctype="multipart/form-data">
										{{ csrf_field() }}
									
										<div class='row'> 
											<div class='col-md-6'>
												<div class="form-group">
													<b>Nama</b>
													<input required class="form-control" name="name">
												</div>
												<div class="form-group">
													<b>Nomor Plat Kendaraan</b>
													<input required class="form-control" name="nopol">
												</div>
											
												<div class="form-group">
													<b>Jumlah Kursi</b>
													<input required class="form-control" name="seats">
												</div>
											</div>
											
											
											<div class='col-md-6'>
												<div class="form-group">
													<b>Tipe</b>
													<select required class="form-control" name="id_type">
														<option selected>Silakan Pilih</option>
														@foreach($types as $type)
														<option value="{{ $type->id_type }}">{{ $type->name }}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group">
													<b>Transmisi</b>
													<input required class="form-control" name="transmission">
												</div>
												<div class="form-group">
													<b>AC</b>
													<select required class="form-control" name="ac" id="">
														<option selected value="">Silakan Pilih</option>
														<option value="1">Ya</option>
														<option value="0">Tidak</option>
													</select>
												</div>
											</div>
										</div> 
										<div class='row'>
											<div class='col-md-12'>
												<div class="form-group">
													<b>File Gambar</b><br/>
													<input type="file" required name="file">
												</div>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" value="Upload" class="btn btn-primary">
										</div>
									
									</form>
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
							<table  id="table_id" class="responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Foto</th>
										<th>Nama Kendaraan</th>
										<th>Nomor Plat</th>
									
										<th>kursi</th>
										<th>Transmisi</th>
										<th>AC</th>
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
										<td >
											<a class="btn btn-info" href="/vehicles/edit/{{ $v->id_vehicle }}">EDIT</a>
											<button class="btn btn-danger deleteVehicle" id="vehicle_{{ $v->id_vehicle }}"">HAPUS</button>
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
<!-- employ  id            -->
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
			$('#table_id').on("click", ".deleteVehicle", function(){  //editAkun == class button
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
				url: 'vehicle-modal-destroy', // file php proses 
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
				{responsivePriority : 1, targets : 0},
				{responsivePriority : 2, targets : 2},
				{responsivePriority : 3, targets : 1},
				{responsivePriority : 4, targets : 3},
				{responsivePriority : 5, targets : 4},
				{responsivePriority : 6, targets : 5},
				{responsivePriority : 7, targets : 6},
				{responsivePriority : 8, targets : 7},
			]
			});
		});
	</script>




@endsection