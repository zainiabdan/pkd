@extends('layouts.main')

@section('container')

  
    <!--== 404 Page Page Content Start ==-->
    <section id="page-404-wrap" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="page-404-content">
                    	<div class="number">
							<div class="four">4</div>
							<div class="four">
							0	{{-- <img src="assets/img/404.png" alt="JSOFT"> --}}
							</div>
							<div class="four">4</div>
                    	</div>
                    	<h4>Halaman Tidak Ditemukan</h4>
                    	<p>Maaf, kami tidak dapat menemukan<br>halaman yang anda maksud.</p>
                    	<a href="/" class="btn-404-home"><i class="fa fa-home"></i>ke Beranda</a>
                    </div>
                </div>
        	</div>
        </div>
    </section>
    <!--== 404 Page Page Content End ==-->


@endsection