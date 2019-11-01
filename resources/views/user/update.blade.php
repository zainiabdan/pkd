@extends('layouts.lumino')

@section('title', 'Penyewaan Mobil')

@section('container')

		<div class="col-lg-12">

			<div class="row">
				<div class="col-lg-2">
					<a href="{{ Storage::url($users->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
						<img  width="180px"  src="{{ Storage::url($users->foto_ktp) }}" class="img-fluid">
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
				
					
				  
					<form action="{{ url('user/update')}}" enctype="multipart/form-data" method="POST" >
						{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">
										<b>Email</b>
										<input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" value="{{ $users->email }}" name="email"  required placeholder="{{ __('E-Mail Address') }}" autocomplete="email">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<b>Alamat</b>
										<input id="alamat" type="text" class=" form-control @error('alamat') is-invalid @enderror" value="{{ $users->alamat }}" name="alamat" required placeholder="{{ __('Alamat Lengkap') }}" autocomplete="alamat">
										@error('alamat')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<b>Instansi</b>
										<input id="instansi" type="text" class=" form-control @error('instansi') is-invalid @enderror" value="{{ $users->instansi }}" name="instansi" required placeholder="{{ __('Instansi') }}" autocomplete="instansi">
										@error('instansi')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-md-12">
										<b>No Telepon</b>
										<input id="no_telp" type="text" class=" form-control @error('no_telp') is-invalid @enderror" value="{{ $users->no_telp }}" name="no_telp" required placeholder="{{ __('Nomor Telepon') }}" autocomplete="no_telp">
										@error('no_telp')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
						</div>
				
						<div class="col-md-6">
							
							<div class="form-group">
								<div class="col-md-12">
									{{-- @php dd($users) @endphp --}}
									<input  value='{{ $users->id_user }}' name="id_user" type="hidden">
									<input  value='{{ $users->id_role_user }}' name="id_role_user" type="hidden">
									
									<b>Nama</b>
									<input class="form-control" value='{{ $users->name }}' name="name" type="text">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<b>Foto Profil</b>
									<input id="foto_profil" type="file" name="foto_profil" accept="image/*" capture class=" form-control @error('foto_profil') is-invalid @enderror"  placeholder="{{ __('') }}" autocomplete="foto_profil">
									@error('foto_profil')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<b>Foto KTP</b>
									<input id="foto_ktp" type="file" name="foto_ktp" accept="image/*" capture class=" form-control @error('foto_ktp') is-invalid @enderror"  placeholder="{{ __('') }}" autocomplete="foto_ktp">
									@error('foto_ktp')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							
							 <div class="form-group">
								<div class="col-md-12">
									@if($users->id_user!=Auth::user()->id_user)
										<b>Role</b>
										<select class="form-control" name="id_role">
											<option selected>Open this select menu </option>
											@foreach($roles as $role)
												<option value="{{ $role->id_role }}" @php if($role->id_role==$users->id_role) echo 'selected="selected"' @endphp >{{ $role->name }}</option>
											@endforeach
										</select>
									@endif
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<input type="submit" value="Update" class="btn btn-primary">
								</div>		
							</div>		

						</div>		
					</div>		
					</form>
				
				</div>
			</div>
		</div>

@endsection