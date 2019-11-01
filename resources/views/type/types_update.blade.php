@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')

			
			<div class="col-lg-8 mx-auto my-5">	
 
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

                @foreach($types as $t)
				<form action="{{ url('types/update') }}" method="POST" >
					{{ csrf_field() }}
					
					<div class="form-group">
						<b>Tipe Kendaraan</b>

                    <input  value='{{ $t->id_type }}' name="id_type" type="hidden">
                    <input class="form-control" value='{{ $t->name }}' name="name">
					</div>
 
					<input type="submit" value="Update" class="btn btn-primary">
				</form>
                @endforeach
                
{{--  				<h4 class="my-5">Data</h4>

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">No</th>
							<th>Tipe</th>
							<th width="1%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach($type as $g)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$g->type}}</td>
							<td><a class="btn btn-danger" href="/types/destroy/{{ $g->id_type }}">HAPUS</a></td>
						</tr>
						@endforeach
					</tbody>
				</table> --}}
			</div>
@endsection