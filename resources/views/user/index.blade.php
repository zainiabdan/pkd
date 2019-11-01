@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')


					

<div class="col-md-12 mx-auto my-5">	
		<div class="row">
			<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Tabel Data User</div>
						<div class="panel-body btn-margins">
							<div class="col-md-12">
										 
		
							<table  style='background: #F0FAFF'  id="table" class="display">       
					
								<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Instansi</th>
									
										<th>Foto</th>
										<th>KTP</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
									@foreach($users as $user)
										<tr>
											<td>{{ $loop->iteration }}</td>
											
											<td>{{ $user->name }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->instansi }}</td>
											<td>
												<a href="{{ Storage::url($user->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
													<img  width="100px"  src="{{ Storage::url($user->foto_profil) }}" class="img-fluid">
												</a>
											</td>
											<td>
												<a href="{{ Storage::url($user->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
													<img  width="100px"  src="{{ Storage::url($user->foto_ktp) }}" class="img-fluid">
												</a>
											</td>
											<td>
												<a class="btn btn-info" href="/user/edit/{{ $user->id_user }}">EDIT</a>
												<a class="btn btn-danger" href="/user/destroy/{{ $user->id_user }}">HAPUS</a>
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
@endsection


@section('dscript')

	<script>
		$(document).ready( function () {
			$("#table").dataTable({
			"responsive" : true,
			"columnDefs" : [
				{responsivePriority : 1, targets : 0},
				{responsivePriority : 2, targets : 1},
				{responsivePriority : 3, targets : 2},
				{responsivePriority : 4, targets : 3},
				{responsivePriority : 5, targets : 4},
				{responsivePriority : 6, targets : 5}
			]
			});
		});
	</script>

@endsection