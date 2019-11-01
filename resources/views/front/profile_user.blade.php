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
			<div class="offset-lg-2 col-lg-8">

				<div class="row">
					<div class="col-lg-2">
						<b>Foto Profil</b>
						<a href="{{ Storage::url($users->foto_profil) }}" data-toggle="lightbox" data-title=" " data-footer="">
							<img  width="180px"  src="{{ Storage::url($users->foto_profil) }}" class="img-fluid">
						</a>
					</div>
					<div class="col-lg-2">
						<b>Foto KTP</b>
						<a href="{{ Storage::url($users->foto_ktp) }}" data-toggle="lightbox" data-title=" " data-footer="">
							<img  width="180px"  src="{{ Storage::url($users->foto_ktp) }}" class="img-fluid">
						</a>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					
					
					<div class="col-lg-10">	
							<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<b>Email</b>
												<input readonly id="email" type="email" class=" form-control @error('email') is-invalid @enderror" value="{{ $users->email }}" name="email"  required placeholder="{{ __('E-Mail Address') }}" autocomplete="email">
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
												<input readonly id="alamat" type="text" class=" form-control @error('alamat') is-invalid @enderror" value="{{ $users->alamat }}" name="alamat" required placeholder="{{ __('Alamat Lengkap') }}" autocomplete="alamat">
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
												<input readonly id="instansi" type="text" class=" form-control " value="{{ $users->nama_instansi }}" name="instansi" required  autocomplete="instansi">
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
												<input readonly id="no_telp" type="text" class=" form-control " value="{{ $users->no_telp }}" name="no_telp" required placeholder="{{ __('Nomor Telepon') }}" autocomplete="no_telp">
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
											<input readonly class="form-control" value='{{ $users->name }}' name="name" type="text">
										</div>
									</div>
									
									
									
									<div class="form-group">
										<div class="col-md-12">
											<a href="{{ url('/profile/edit') }}" class="btn btn-primary"> Edit </a>
										</div>		
									</div>		

								</div>		
							</div>		
					
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

@endsection