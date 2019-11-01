@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')

	<div class="col-lg-12">

		<div class="row">
			<div class="col-lg-2">
				<a href="{{ Storage::url($user->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
					<img  width="180px"  src="{{ Storage::url($user->foto_ktp) }}" class="img-fluid">
				</a>
			</div>
				
			<div class="col-lg-10 mx-auto my-5">
				
					@if(count($errors) > 0)
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
						{{ $error }} <br/>
						@endforeach
					</div>
					@endif
				
					
				  
				{{-- <form action="{{ url('driver/store')}}"  method="POST" > --}}
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										{{-- @php dd($user) @endphp --}}
										<input readonly  value='{{ $user->id_user }}' name="id_user" type="hidden">
										
										<b>Nama</b>
										<input readonly class="form-control" value='{{ $user->name }}' name="name" type="text">
									</div>
								</div>
										

								<div class="form-group">
									<div class="col-md-12">
										<b>Email</b>
										<input readonly  id="email" type="email" class=" form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email"  required placeholder="{{ __('E-Mail Address') }}" autocomplete="email">
									
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<b>Alamat</b>
										<input readonly id="alamat" type="text" class=" form-control @error('alamat') is-invalid @enderror" value="{{ $user->alamat }}" name="alamat" required placeholder="{{ __('Alamat Lengkap') }}" autocomplete="alamat">
									
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<b>Instansi</b>
										<input readonly id="instansi" type="text" class=" form-control @error('instansi') is-invalid @enderror" value="{{ $user->nama_instansi }}" name="instansi" required placeholder="{{ __('Instansi') }}" autocomplete="instansi">
					
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<b>No Telepon</b>
										<input readonly id="no_telp" type="text" class=" form-control @error('no_telp') is-invalid @enderror" value="{{ $user->no_telp }}" name="no_telp" required placeholder="{{ __('Nomor Telepon') }}" autocomplete="no_telp">
									
									</div>
								</div>
						</div>
				
						<div class="col-md-6">
							
							
							 {{-- <div class="form-group">
								<div class="col-md-12">
									@if($user->id_user!=Auth::user()->id_user)
										<b>Role</b>
										<select class="form-control" name="id_role">
											<option selected>Open this select menu </option>
											@foreach($roles as $role)
												<option value="{{ $role->id_role }}" @php if($role->id_role==$user->id_role) echo 'selected="selected"'; @endphp >{{ $role->name }}</option>
											@endforeach
										</select>
									@endif
								</div>
							</div> --}}
							
							{{-- <div class="form-group">
								<div class="col-md-12">
									<input type="submit" value="Jadikan Sopir" class="btn btn-primary">
								</div>		
							</div>		 --}}

						</div>		
					</div>		
				{{-- </form> --}}
				
			</div>
		</div>
	</div>

@endsection