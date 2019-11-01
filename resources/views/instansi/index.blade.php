@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')

<div class="col-lg-12 mx-auto my-5">	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Instansi</div>
				<div class="panel-body btn-margins">
					<div class="col-md-12"> 
						@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
							{{ $error }} <br/>
							@endforeach
						</div>
						@endif
		
						<form action="{{ url('instansi/store') }}" method="POST" >
							{{ csrf_field() }}
							
							<div class="form-group">
								<b>Nama Instansi</b>
								<input class="form-control" name="nama_instansi">
							</div>
						
							<div class="form-group">
								<b>Alamat</b>
								<input class="form-control" name="alamat">
							</div>
		
							<input type="submit" value="Tambah" class="btn btn-primary">
						</form>
						
						<br>
						<h4 class="my-5">Data</h4>
						<table  id="table_id" class="responsive display nowrap dataTable no-footer dtr-inline" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th>Nama Instansi</th>
									<th>Alamat</th>
									<th width="200">OPSI</th>
								</tr>
							</thead>
							<tbody>
								@foreach($instansi as $i)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$i->nama_instansi}}</td>
									<td>{{$i->alamat}}</td>
									<td>
										<a class="btn btn-info" href="{{ url('instansi/edit').'/'.$i->id_instansi }}">EDIT</a>
										<button class="btn btn-danger deleteInstansi" id="instansi_{{ $i->id_instansi }}"">HAPUS</button>
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
			$('#table_id').on("click", ".deleteInstansi", function(){  //editAkun == class button
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
				url: 'instansi-modal-destroy', // file php proses 
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
				{responsivePriority : 3, targets : 3}
			]
			});
		});
	</script>




@endsection