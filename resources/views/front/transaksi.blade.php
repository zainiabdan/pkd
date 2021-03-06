@extends('layouts.main')

@section('title', 'Penyewaan Mobil')

@section('container')

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Our Cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->
   
    
    <!--== Choose Car Area Start ==-->
    <section id="choose-car" class="section-padding">
        <div class="container">

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                        <!-- Choose Area Tab Menu -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#tersedia" role="tab" aria-selected="false">
                                    Transaksi Saat Ini
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="home-tab" data-toggle="tab" href="#semua_kendaraan" role="tab" aria-selected="true">
                                    Histori Transaksi
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#office_map" role="tab" aria-selected="false">Our Office</a>
                            </li> --}}
                        </ul>
                        <!-- Choose Area Tab Menu -->

                        <!-- Choose Area Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Popular Cars Tab Start -->
                            <div class="tab-pane fade show active" id="tersedia" role="tabpanel" aria-labelledby="home-tab">
                                <!-- Popular Cars Content Wrapper Start -->
                                   
                                <!--== Car List Area Start ==-->
                                <section id="car-list-area" class="section-padding">
                                    <div class="container">
                                        <div class="row">
                                            {{-- <!-- Sidebar Area Start -->
                                            <div class="col-lg-4">
                                                <div class="sidebar-content-wrap">
                                                    <!-- Single Sidebar Start -->
                                                    <div class="single-sidebar">
                                                        <h3>For More Informations</h3>

                                                        <div class="sidebar-body">
                                                            <p><i class="fa fa-mobile"></i> +8801816 277 243</p>
                                                            <p><i class="fa fa-clock-o"></i> Mon - Sat 8.00 - 18.00</p>
                                                        </div>
                                                    </div>
                                                    <!-- Single Sidebar End -->

                                                    <!-- Single Sidebar Start -->
                                                    <div class="single-sidebar">
                                                        <h3>Rental Tips</h3>

                                                        <div class="sidebar-body">
                                                            <ul class="recent-tips">
                                                                <li class="single-recent-tips">
                                                                    <div class="recent-tip-thum">
                                                                        <a href="#"><img src="assets/img/we-do/service1-img.png" alt="JSOFT"></a>
                                                                    </div>
                                                                    <div class="recent-tip-body">
                                                                        <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                        <span class="date">February 5, 2018</span>
                                                                    </div>
                                                                </li>

                                                                <li class="single-recent-tips">
                                                                    <div class="recent-tip-thum">
                                                                        <a href="#"><img src="assets/img/we-do/service3-img.png" alt="JSOFT"></a>
                                                                    </div>
                                                                    <div class="recent-tip-body">
                                                                        <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                        <span class="date">February 5, 2018</span>
                                                                    </div>
                                                                </li>

                                                                <li class="single-recent-tips">
                                                                    <div class="recent-tip-thum">
                                                                        <a href="#"><img src="assets/img/we-do/service2-img.png" alt="JSOFT"></a>
                                                                    </div>
                                                                    <div class="recent-tip-body">
                                                                        <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                        <span class="date">February 5, 2018</span>
                                                                    </div>
                                                                </li>

                                                                <li class="single-recent-tips">
                                                                    <div class="recent-tip-thum">
                                                                        <a href="#"><img src="assets/img/we-do/service3-img.png" alt="JSOFT"></a>
                                                                    </div>
                                                                    <div class="recent-tip-body">
                                                                        <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                        <span class="date">February 5, 2018</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Single Sidebar End -->

                                                    <!-- Single Sidebar Start -->
                                                    <div class="single-sidebar">
                                                        <h3>Connect with Us</h3>

                                                        <div class="sidebar-body">
                                                            <div class="social-icons text-center">
                                                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                                <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Single Sidebar End -->
                                                </div>
                                            </div>
                                            <!-- Sidebar Area End --> --}}

                                            <!-- Car List Content Start -->
                                            <div class="col-lg-12">
                                                <div class="car-list-content m-t-50">
                                                    <!-- Single Car Start -->
                                                    @php
                                                        $count=0;
                                                    foreach($transaksi as $t)
                                                        {    
                                                            if($t->status!='4'&&$t->status!='1')
                                                            {
                                                                $count++;
                                                            }
                                                        }
                                                    @endphp

                                                    @if($count==0)
                                                    <div class="row">
                                                        <!-- Section Title Start -->
                                                        <div class="col-lg-12">
                                                            <div class="section-title  text-center">
                                                                <h2>Kosong</h2>
                                                                <span class="title-line">
                                                                    <i class="fa "></i>
                                                                </span>
                                                                <p>Anda belum memesan kendaraan</p>
                                                            </div>
                                                        </div>
                                                        <!-- Section Title End -->
                                                    </div>
                                                    @else
                                                    @foreach ($transaksi as $trs)
                                                        @if($trs->status!='4'&&$trs->status!='1') 
                                                           <div class="single-car-parent-wrap ">
                                                               <center>
                                                                   <h2>{{ $trs->keperluan }}</h2>
                                                                   <div class="single-cars-wrap">
                                                                       <table>
                                                                           <tr>
                                                                               <td>Keperluan</td>
                                                                               <td> : </td>
                                                                               <td>{{ $trs->keperluan }}</td>
                                                                           </tr>
                                                                           <tr>
                                                                               <td>Tujuan</td>
                                                                               <td> : </td>
                                                                               <td>{{ $trs->tujuan }}</td>
                                                                           </tr>
                                                                           <tr>
                                                                               <td>Mulai</td>
                                                                               <td> : </td>
                                                                               <td>{{ $trs->tgl_pinjam }}</td>
                                                                           </tr>
                                                                           <tr>
                                                                               <td>Sampai</td>
                                                                               <td> : </td>
                                                                               <td>{{ $trs->tgl_kembali }}</td>
                                                                           </tr>
                                                                       </table>
                                                                   </div>
                                                               </center>
                                                               
                                                               @foreach($vehicles as $v)
                                                                    @if($v->id_transaction==$trs->id_transaction)
                                                                        <div class="single-cars-wrap">
                                                                            <div class="row">
                                                                                <!-- Single Car Thumbnail -->
                                                                                <div class="col-lg-5">
                                                                                    <div class="p-car-thumbnails-order">
                                                                                        <a class="car-hover" href="{{ Storage::url($v->file) }}">
                                                                                            {{-- <img src="{{ Storage::url($v->file) }}" style="width:400px; height:200px; object-fit: cover;" alt="JSOFT"> --}}
                                                                                            <img src="{{ Storage::url($v->file) }}"  alt="JSOFT">
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Single Car Thumbnail -->
                                                                                
                                                                                <!-- Single Car Info -->
                                                                                <div class="col-lg-7">
                                                                                    <div class="display-table">
                                                                                        <div class="display-table-cell">
                                                                                            <div class="car-list-info">
                                                                                                <h2><a href="{{ url('/detail').'/'.$v->id_vehicle}}">{{ $v->name }}</a></h2>
                                                                    
                                                                                                <h5>
                                                                                                    @if($trs->status=='1')
                                                                                                        Ditolak
                                                                                                    @else
                                                                                                    @switch($v->available)
                                                                                                        @case(0)
                                                                                                        Belum Disetujui
                                                                                                        @break
                                                                                                    
                                                                                                        @case(2)
                                                                                                        Disetujui
                                                                                                        @break
                                                                                                    @endswitch
                                                                                                    @endif
                                                                                                </h5>
                                                                                                <div class="ourcar-info text-center">
                                                                                                    {{-- <h2><span>Detail</span></h2> --}}
                                                                                                    <table class="our-table table_id">
                                                                                                        <tr>
                                                                                                            <td>Tipe</td>
                                                                                                            <td>{{ $v->type }}</td>
                                                                                                        </tr>
                                                                                                    
                                                                                                        <tr>
                                                                                                            <td>Kapasitas Penumpang</td>
                                                                                                            <td>{{ $v->seats }}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>Transmisi</td>
                                                                                                            <td>{{ $v->transmission }}</td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>AC</td>
                                                                                                            <td>{{ $v->ac }}</td>
                                                                                                        </tr>
                                                                                                    </table>
                                                                                                    <br>
                                                                                                     @if($trs->status=='0')
                                                                                                        <div class="form-group">
                                                                                                            <button id='del_{{ $v->id_detail_transaction }}' class='form-control btn btn-danger btn-sm deleteDtlTransaction'>Hapus Kendaraan</button>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                </div>
                                                                                                
                                                                                                {{-- <ul class="car-info-list">
                                                                                                    <li>Air Condition</li>
                                                                                                    <li>Diesel</li>
                                                                                                    <li>Auto</li>
                                                                                                </ul> --}}
                                                                                                {{-- <p class="rating">
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star"></i>
                                                                                                    <i class="fa fa-star unmark"></i>
                                                                                                </p> --}}
                                                                                                {{-- <a href="#" class="rent-btn">Book It</a> --}}
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Single Car info -->
                                                                            </div>
                                                                        </div>
                                                                      
                                                                       
                                                                    @endif
                                                                @endforeach
                                                                    @if($trs->status=='0')
                                                                    <div class="form-group">
                                                                            <a href="{{ url('/add-vehicle').'/'.$v->id_transaction}}" id='del_' class='form-control btn btn-secondary btn-sm'>Tambah Kendaraan</a>
                                                                    </div>
                                                                    <div class="form-group">
                                                                            <button id='del_{{ $v->id_transaction }}' class='form-control btn btn-danger btn-sm deleteTransaction'>Batalkan Peminjaman</button>
                                                                    </div>
                                                                    @endif
                                                           </div>

                                                            <!-- Single Car End -->
                                                        @endif
                                                        
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Car List Content End -->
                                        </div>
                                    </div>
                                </section>
                                <!--== Car List Area End ==-->

                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Popular Cars Tab End -->

                            <!-- Newest Cars Tab Start -->
                            <div class="tab-pane fade" id="semua_kendaraan" role="tabpanel" aria-labelledby="profile-tab">
                               <!-- Popular Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                    <!-- Filtering Menu -->
                                    {{-- <div class="newcar-menu text-center">
                                        <a href=" {{ url('#') }} " data-filter="*" class="active">Semua Tipe</a>
                                        @foreach($types as $type)
                                        <a href=" {{ url('#') }} " data-filter=".{{ $type->id_type }}">{{ $type->name }}</a>
                                        @endforeach 
                                        <a href=" {{ url('#') }} " data-filter=".hat">Truck</a>
                                        <a href=" {{ url('#') }} " data-filter=".mpv">MPV</a>
                                        <a href=" {{ url('#') }} " data-filter=".sedan">Sedan</a>
                                        <a href=" {{ url('#') }} " data-filter=".suv">SUV</a> 
                                    </div> --}}

                                    <!-- Filtering Menu -->

                                    <!-- PopularCars Tab Content Start -->
                                        <!--== Car List Area Start ==-->
                                            <section id="car-list-area" class="section-padding">
                                                <div class="container">
                                                    <div class="row">
                                                        {{-- <!-- Sidebar Area Start -->
                                                        <div class="col-lg-4">
                                                            <div class="sidebar-content-wrap">
                                                                <!-- Single Sidebar Start -->
                                                                <div class="single-sidebar">
                                                                    <h3>For More Informations</h3>

                                                                    <div class="sidebar-body">
                                                                        <p><i class="fa fa-mobile"></i> +8801816 277 243</p>
                                                                        <p><i class="fa fa-clock-o"></i> Mon - Sat 8.00 - 18.00</p>
                                                                    </div>
                                                                </div>
                                                                <!-- Single Sidebar End -->

                                                                <!-- Single Sidebar Start -->
                                                                <div class="single-sidebar">
                                                                    <h3>Rental Tips</h3>

                                                                    <div class="sidebar-body">
                                                                        <ul class="recent-tips">
                                                                            <li class="single-recent-tips">
                                                                                <div class="recent-tip-thum">
                                                                                    <a href="#"><img src="assets/img/we-do/service1-img.png" alt="JSOFT"></a>
                                                                                </div>
                                                                                <div class="recent-tip-body">
                                                                                    <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                                    <span class="date">February 5, 2018</span>
                                                                                </div>
                                                                            </li>

                                                                            <li class="single-recent-tips">
                                                                                <div class="recent-tip-thum">
                                                                                    <a href="#"><img src="assets/img/we-do/service3-img.png" alt="JSOFT"></a>
                                                                                </div>
                                                                                <div class="recent-tip-body">
                                                                                    <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                                    <span class="date">February 5, 2018</span>
                                                                                </div>
                                                                            </li>

                                                                            <li class="single-recent-tips">
                                                                                <div class="recent-tip-thum">
                                                                                    <a href="#"><img src="assets/img/we-do/service2-img.png" alt="JSOFT"></a>
                                                                                </div>
                                                                                <div class="recent-tip-body">
                                                                                    <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                                    <span class="date">February 5, 2018</span>
                                                                                </div>
                                                                            </li>

                                                                            <li class="single-recent-tips">
                                                                                <div class="recent-tip-thum">
                                                                                    <a href="#"><img src="assets/img/we-do/service3-img.png" alt="JSOFT"></a>
                                                                                </div>
                                                                                <div class="recent-tip-body">
                                                                                    <h4><a href="#">How to Enjoy Losses Angeles Car Rentals</a></h4>
                                                                                    <span class="date">February 5, 2018</span>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- Single Sidebar End -->

                                                                <!-- Single Sidebar Start -->
                                                                <div class="single-sidebar">
                                                                    <h3>Connect with Us</h3>

                                                                    <div class="sidebar-body">
                                                                        <div class="social-icons text-center">
                                                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                                                            <a href="#" target="_blank"><i class="fa fa-behance"></i></a>
                                                                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                                            <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Single Sidebar End -->
                                                            </div>
                                                        </div>
                                                        <!-- Sidebar Area End --> --}}

                                                        <!-- Car List Content Start -->
                                                        <div class="col-lg-12">
                                                            <div class="car-list-content m-t-50">
                                                                <!-- Single Car Start -->
                                                                  @php
                                                                    $count=0;
                                                                    foreach($transaksi as $t)
                                                                    {    
                                                                        if($t->status=='4'||$t->status=='1')
                                                                        {
                                                                            $count++;
                                                                        }
                                                                    }
                                                                @endphp

                                                                @if($count==0)
                                                                <div class="row">
                                                                    <!-- Section Title Start -->
                                                                    <div class="col-lg-12">
                                                                        <div class="section-title  text-center">
                                                                            <h2>Kosong</h2>
                                                                            <span class="title-line">
                                                                                <i class="fa "></i>
                                                                            </span>
                                                                            <p>Anda belum memesan kendaraan</p>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Section Title End -->
                                                                </div>
                                                                @else
                                                                @foreach ($transaksi as $allTrs)
                                                                    @if($allTrs->status=='4'||$allTrs->status=='1')
                                                                        <div class="single-car-parent-wrap ">
                                                                            <center>
                                                                                <h2>{{ $allTrs->keperluan }}</h2>
                                                                                <div class="single-cars-wrap">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>Keperluan</td>
                                                                                            <td> : </td>
                                                                                            <td>{{ $allTrs->keperluan }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Tujuan</td>
                                                                                            <td> : </td>
                                                                                            <td>{{ $allTrs->tujuan }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Mulai</td>
                                                                                            <td> : </td>
                                                                                            <td>{{ $allTrs->tgl_pinjam }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>Sampai</td>
                                                                                            <td> : </td>
                                                                                            <td>{{ $allTrs->tgl_kembali }}</td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </center>
                                                                            
                                                                            @foreach($vehicles as $v)
                                                                                    @if($v->id_transaction==$allTrs->id_transaction)
                                                                                        <div class="single-cars-wrap">
                                                                                            <div class="row">
                                                                                                <!-- Single Car Thumbnail -->
                                                                                                <div class="col-lg-5">
                                                                                                    <div class="p-car-thumbnails-order">
                                                                                                        <a class="car-hover" href="{{ Storage::url($v->file) }}">
                                                                                                            {{-- <img src="{{ Storage::url($v->file) }}" style="width:400px; height:200px; object-fit: cover;" alt="JSOFT"> --}}
                                                                                                            <img src="{{ Storage::url($v->file) }}"  alt="JSOFT">
                                                                                                        </a>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Single Car Thumbnail -->
                                                                                                
                                                                                                <!-- Single Car Info -->
                                                                                                <div class="col-lg-7">
                                                                                                    <div class="display-table">
                                                                                                        <div class="display-table-cell">
                                                                                                            <div class="car-list-info">
                                                                                                                <h2><a href="{{ url('/detail').'/'.$v->id_vehicle}}">{{ $v->name }}</a></h2>
                                                                                    
                                                                                                                <h5>
                                                                                                                    @if($allTrs->status=='1')
                                                                                                                        Ditolak
                                                                                                                    @else
                                                                                                                    @switch($v->available)
                                                                                                                        @case(0)
                                                                                                                        Belum Disetujui
                                                                                                                        @break
                                                                                                                    
                                                                                                                        @case(2)
                                                                                                                        Disetujui
                                                                                                                        @break
                                                                                                                    @endswitch
                                                                                                                    @endif
                                                                                                                </h5>
                                                                                                                <div class="ourcar-info text-center">
                                                                                                                    {{-- <h2><span>Detail</span></h2> --}}
                                                                                                                    <table class="our-table table_id">
                                                                                                                        <tr>
                                                                                                                            <td>Tipe</td>
                                                                                                                            <td>{{ $v->type }}</td>
                                                                                                                        </tr>
                                                                                                                    
                                                                                                                        <tr>
                                                                                                                            <td>Kapasitas Penumpang</td>
                                                                                                                            <td>{{ $v->seats }}</td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td>Transmisi</td>
                                                                                                                            <td>{{ $v->transmission }}</td>
                                                                                                                        </tr>
                                                                                                                        <tr>
                                                                                                                            <td>AC</td>
                                                                                                                            <td>{{ $v->ac }}</td>
                                                                                                                        </tr>
                                                                                                                    </table>
                                                                                                                    <br>
                                                                                                                    @if($allTrs->status=='0')
                                                                                                                        <div class="form-group">
                                                                                                                            <button id='del_{{ $v->id_detail_transaction }}' class='form-control btn btn-danger btn-sm deleteDtlTransaction'>Hapus Kendaraan</button>
                                                                                                                        </div>
                                                                                                                    @endif
                                                                                                                </div>
                                                                                                                
                                                                                                                {{-- <ul class="car-info-list">
                                                                                                                    <li>Air Condition</li>
                                                                                                                    <li>Diesel</li>
                                                                                                                    <li>Auto</li>
                                                                                                                </ul> --}}
                                                                                                                {{-- <p class="rating">
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                    <i class="fa fa-star"></i>
                                                                                                                    <i class="fa fa-star unmark"></i>
                                                                                                                </p> --}}
                                                                                                                {{-- <a href="#" class="rent-btn">Book It</a> --}}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <!-- Single Car info -->
                                                                                            </div>
                                                                                        </div>
                                                                                    
                                                                                    
                                                                                    @endif
                                                                                @endforeach
                                                                                    @if($allTrs->status=='0')
                                                                                    <div class="form-group">
                                                                                            <a href="{{ url('/add-vehicle').'/'.$v->id_transaction}}" id='del_' class='form-control btn btn-secondary btn-sm'>Tambah Kendaraan</a>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                            <button id='del_{{ $v->id_transaction }}' class='form-control btn btn-danger btn-sm deleteTransaction'>Batalkan Peminjaman</button>
                                                                                    </div>
                                                                                    @endif
                                                                        </div>
                                                                    @endif
                                                                <!-- Single Car End -->
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <!-- Car List Content End -->
                                                    </div>
                                                </div>
                                            </section>
                                        <!--== Car List Area End ==-->
                                    <!-- PopularCars Tab Content End -->
                                </div>
                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Newest Cars Tab End -->

                            <!-- Office Map Tab -->
                            <div class="tab-pane fade" id="office_map" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="map-area">
                                    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.6538067244583!2d90.37092511435942!3d23.79533919297639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0cce3251ab1%3A0x7a2aa979862a9643!2sJSoft!5e0!3m2!1sen!2sbd!4v1516771096779"></iframe> --}}
                                </div>
                            </div>
                            <!-- Office Map Tab -->
                        </div>
                        <!-- Choose Area Tab content -->
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->



    
<!-- -----------------------------------------------  modal  --------------------------------------------------------- -->
<!-- employ  id            -->
	<div class="modal fade" id="mdlTrs" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
					<div id='modal-section'>
						
					</div>
			</div>
		</div>
	</div> <!-- myModalLabel -->
<!-- -----------------------------------------------end  modal --------------------------------------------------------- -->



 @endsection

 @section('js')

 <script>
		$(document).ready(function(){
			$('.deleteTransaction').click(function(){  //editAkun == class button
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var id = this.id;
				var splitid = id.split('_');
				var deleteId = splitid[1];//var yg dilempar
				
				// AJAX request
                $.ajax({
                    url: 'user-transactions-destroy', // file php proses 
                    type: 'post',
                    data: {id: deleteId},//var yg dilempar
                    success: function(response){ 
                        // Add response in Modal body
                        $('#modal-section').html(response);
                        $('#mdlTrs').modal('show'); //id modal-fade
					// Display Modal
                    },
                    error: function(err){
                        console.log(err)
                    }
			});
			});
		});
	</script>

 <script>
		$(document).ready(function(){
			$('.deleteDtlTransaction').click(function(){  //editAkun == class button
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				var id = this.id;
				var splitid = id.split('_');
				var deleteId = splitid[1];//var yg dilempar
				
				// AJAX request
                $.ajax({
                    url: 'user-detailtransactions-destroy', // file php proses 
                    type: 'post',
                    data: {id: deleteId},//var yg dilempar
                    success: function(response){ 
                        // Add response in Modal body
                        $('#modal-section').html(response);
                        $('#mdlTrs').modal('show'); //id modal-fade
					// Display Modal
                    },
                    error: function(err){
                        console.log(err)
                    }
			});
			});
		});
	</script>

 @endsection