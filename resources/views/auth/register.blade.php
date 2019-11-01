@extends('layouts.main')

@section('container')

   <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Registrasi</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


<section id="lgoin-page-wrap" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 m-auto">
                    <div class="login-page-content">
                        <div class="login-form ">
                            <h3>Registrasi</h3>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="{{ __('Nama Lengkap') }}" autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}" autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="alamat" type="text" class=" @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required placeholder="{{ __('Alamat Lengkap') }}" autocomplete="alamat">

                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <div class="col-md-12 ">
                                      <div class="">
                                            <select name="id_instansi" class="custom-select @error('id_instansi') is-invalid @enderror" id="id_instansi">
                                                <option value="">Pilih Instansi</option>
                                                @foreach($instansi as $i)
                                                <option value="{{$i->id_instansi}}">{{$i->nama_instansi}}</option>
                                                @endforeach
                                            </select>
                                      </div>
                                        {{-- <input id="instansi" type="text" class=" @error('instansi') is-invalid @enderror" name="instansi" value="{{ old('instansi') }}" required placeholder="{{ __('Instansi') }}" autocomplete="instansi"> --}}

                                        @error('id_instansi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="no_telp" type="text" class=" @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" required placeholder="{{ __('Nomor Telepon') }}" autocomplete="no_telp">

                                        @error('no_telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="foto_ktp" type="file" accept="image/*" capture class=" @error('foto_ktp') is-invalid @enderror" name="foto_ktp" value="{{ old('foto_ktp') }}" required placeholder="{{ __('Foto KTP') }}" autocomplete="foto_ktp">

                                        @error('foto_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Password') }}" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="" name="password_confirmation" required placeholder="{{ __('Konfirmasi Password') }}" autocomplete="new-password">
                                    </div>
                                </div>

                                    <div class="log-btn">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Registerasi') }}
                                        </button>
                                    </div>


                            </form>

                        </div>
                		
                		{{-- <div class="login-other">
                			<span class="or">or</span>
                			<a href="#" class="login-with-btn facebook"><i class="fa fa-facebook"></i> Signup With Facebook</a>
                			<a href="#" class="login-with-btn google"><i class="fa fa-google"></i> Signup With Google</a>
                		</div> --}}
                		<div class="create-ac">
                			<p>Have an account? <a href="login.html">Sign In</a></p>
                		</div>
                		<div class="login-menu">
                			<a href="about.html">About</a>
                			<span>|</span>
                			<a href="contact.html">Contact</a>
                		</div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
