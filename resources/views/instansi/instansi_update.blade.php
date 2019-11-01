@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')
	<div class="row">
		<div class="container">
 
			
			<div class="col-lg-8 mx-auto my-5">	
 
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

                @foreach($instansi as $i)
				<form action="{{ url('instansi/update') }}" method="POST" >
					{{ csrf_field() }}
					
					
					<input name="id_instansi" value="{{ $i->id_instansi }}" type="hidden">
					
					<div class="form-group">
						<b>Nama Instansi</b>
						<input class="form-control" value='{{ $i->nama_instansi }}' name="nama_instansi">
					</div>
				
					<div class="form-group">
						<b>Alamat</b>
						<input class="form-control" value="{{ $i->alamat }}" name="alamat">
					</div>
 
 
					<input type="submit" value="Update" class="btn btn-primary">
				</form>
                @endforeach
                

			</div>
		</div>
	</div>
@endsection