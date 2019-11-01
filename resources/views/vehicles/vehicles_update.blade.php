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
	
	@foreach($vehicle as $v)
	
	<div class='row'>
		<div class='col-md-12'>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">Edit Kendaraan</div>
						<div class="panel-body btn-margins">
							<div class="col-md-12">
								<form action="{{url('vehicles/update')}}" method="POST" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="hidden" required name="id" value="{{ $v->id_vehicle }}">
									<div class='row'>
										<div class='col-md-12'> 
											<div class="form-group">
												<br/>
												<a href="{{ Storage::url($v->file) }}" data-toggle="lightbox"  data-title=" " data-footer="">
													<img  width="250px"  src="{{ Storage::url($v->file) }}" class="img-fluid">
												</a>
											</div>
										</div> 
									</div>
									
									<div class='row'>
										<div class='col-md-12'>
											<div class="form-group">
												<b>File Gambar</b><br/>
												<input type="file" name="file">
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class='col-md-6'>
											<div class="form-group">
												<b>Nama Kendaraan</b>
												<input required class="form-control" name="name" value="{{$v->name}}">
											</div>
											<div class="form-group">
												<b>Nomor Plat Kendaraan</b>
												<input required class="form-control" name="nopol" value="{{$v->nopol}}">
											</div>
											<div class="form-group">
												<b>Transmisi</b>
												<input required class="form-control" name="transmission" value="{{$v->transmission}}">
											</div>
											
										</div>

										<div class='col-md-6'>
										
											<div class="form-group">
												<b>Jumlah Kursi</b>
												<input required class="form-control" name="seats" value="{{$v->seats}}">
											</div>
											<div class="form-group">
												<b>Tipe</b>
												<select required class="form-control" name="id_type">
													<option selected>Open this select menu</option>
													@foreach($types as $type)
													<option value="{{ $type->id_type }}" <?php if($type->id_type==$v->id_type) echo 'selected="selected"' ?>>{{ $type->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<b>AC</b>
												<select required class="form-control" name="ac" id="">
														<option value="1" <?php if($v->ac=='1') echo 'selected="selected"' ?>>Ya</option>
														<option value="0" <?php if($v->ac=='0') echo 'selected="selected"' ?>>Tidak</option>
												</select>
											</div>
										</div>
									</div> 
									
									<input type="submit" value="Update" class="btn btn-primary">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	@endforeach
	

	{{-- <table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="1%">File</th>
				<th>Keterangan</th>
				<th width="200">OPSI</th>
			</tr>
		</thead>
		<tbody>
			@foreach($vehicle as $g)
			<tr>
				<td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
				<td>{{$g->keterangan}}</td>
				<td >
					<a class="btn btn-info" href="/vehicles/update/{{ $g->id }}">EDIT</a>
					<a class="btn btn-danger" href="/vehicles/destroy/{{ $g->id }}">HAPUS</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table> --}}
</div>
@endsection

@section('dscript')

<script>

</script>

@endsection

