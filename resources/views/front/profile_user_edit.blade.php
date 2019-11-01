@extends('layouts.main')

@section('title', 'Penyewaan Mobil')

@section('container')


<section id="page-title-area" class="section-padding overlay">
	<div class="container">
		<div class="row">
			<!-- Page Title Start -->
			<div class="col-lg-12">
				<div class="section-title  text-center">
					<h2>Profil</h2>
					<span class="title-line"><i class="fa fa-car"></i></span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</div>
			</div>
			<!-- Page Title End -->
		</div>
	</div>
</section>
<!--== Page Title Area End ==-->

<section  class="section-padding">
	<div class="container">
		<div class="row">
			<div class="offset-lg-2 col-lg-10">
				<div class="row">
					<div class="col-lg-2">
						<b>Foto Profil</b>
						<a href="{{ Storage::url($users->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
							<img  width="100px"  src="{{ Storage::url($users->foto_profil) }}" class="img-fluid">
						</a>
					</div>
					
					<div class="col-lg-2">
						<b>Foto KTP</b>
						<a href="{{ Storage::url($users->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
							<img  width="100px"  src="{{ Storage::url($users->foto_ktp) }}" class="img-fluid">
						</a>
					</div>
					
				</div>

				<br>
				<div class="row">
					<div class="col-lg-10">	
					
						@if(count($errors) > 0)
						<div class="alert alert-danger">
							@foreach ($errors->all() as $error)
							{{ $error }} <br/>
							@endforeach
						</div>
						@endif
					
						<form action="{{ url('profile/update')}}" enctype="multipart/form-data" method="POST" >
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
												<select name="id_instansi" class="form-control required @error('id_instansi') is-invalid @enderror" id="id_instansi">

													<option value="">Pilih Instansi</option>
													@foreach($instansi as $i)
													<option <?php  if($i->id_instansi==$users->id_instansi) echo 'selected="selected"'; ?> value="{{$i->id_instansi}}">{{$i->nama_instansi}}</option>
													@endforeach
												</select>
												
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

		</div>
	</div>
</section>

@endsection