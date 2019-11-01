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
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Pilih Kendaraan</h2>
                        <span class="title-line">
                            <i class="fa "></i>
                        </span>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                        <!-- Choose Area Tab Menu -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#tersedia" role="tab" aria-selected="false">Tersedia Untuk Dipesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="home-tab" data-toggle="tab" href="#semua_kendaraan" role="tab" aria-selected="true">Semua Kendaraan</a>
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
                                <div class="popular-cars-wrap">
                                    <!-- Filtering Menu -->
                                    <div class="popucar-menu text-center">
                                        <a href=" {{ url('#') }} " data-filter="*" class="active">Semua Tipe</a>
                                        @foreach($types as $type)
                                        <a href=" {{ url('#') }} " data-filter=".{{ $type->id_type }}">{{ $type->name }}</a>
                                        @endforeach
                                        
                                    </div>

                                    <!-- Filtering Menu -->

                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row popular-car-gird">
                                        @foreach($vehicles as $vtrs)
                       
                                        <div class="col-lg-4 col-md-6 con {{ $vtrs->id_type }}">
                                                <div class="single-popular-car">
                                                    <div class="p-car-thumbnails">
                                                        <a class="car-hover" href="{{ Storage::url($vtrs->file) }}">
                                                                <img src="{{ Storage::url($vtrs->file) }}" alt="JSOFT">
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="p-car-content">
                                                            <h3>
                                                                <a href=" {{  url('detail').'/'.$vtrs->id_vehicle }} ">
                                                                {{ $vtrs->name }}
                                                                {{-- <span class="price"><i class="fa fa-tag"></i> $55/day</span> --}}
                                                                </a>
                                                            </h3>

                                                            <h5> No Plat : {{ $vtrs->nopol }}</h5>
                                                            
                                                            <div class="p-car-feature">
                                                                {{-- <a href=" {{ url('#') }} ">2017</a> --}}
                                                                <a href=" {{ url('#') }} ">{{ $vtrs->transmission }}</a>
                                                                @if($vtrs->ac==1)
                                                                <a href=" {{ url('#') }} ">
                                                                        A/C
                                                                    </a>
                                                                    @endif
                                                            </div>
                                                            <center>
                                                                 <a href="{{  url('detail').'/'.$vtrs->id_vehicle }}" class="rent-btn">
                                                                    PESAN
                                                                </a>
                                                                {{-- <a href="#" class="rent-btn">Book It</a> --}}
                                                            </center>
                                                        </div>
                                                    
                                                    {{-- <center>

                                                        <button class="btn btn-sm btn-primary form-group btn-schedule" data-vehicleid='{{$vtrs->id_vehicle}}'> jadwal </button>
                                                    </center> --}}
                                                </div>
                                            </div>
                                            <!-- Single Popular Car End -->
                                            {{-- @endif --}}
                                        @endforeach
                                    </div>
                                    <!-- PopularCars Tab Content End -->
                                </div>
                                <!-- Popular Cars Content Wrapper End -->
                            </div>
                            <!-- Popular Cars Tab End -->

                            <!-- Newest Cars Tab Start -->
                            <div class="tab-pane fade" id="semua_kendaraan" role="tabpanel" aria-labelledby="profile-tab">
                               <!-- Popular Cars Content Wrapper Start -->
                                <div class="popular-cars-wrap">
                                    <!-- Filtering Menu -->
                                    <div class="newcar-menu text-center">
                                        <a href=" {{ url('#') }} " data-filter="*" class="active">Semua Tipe</a>
                                        @foreach($types as $type)
                                        <a href=" {{ url('#') }} " data-filter=".{{ $type->id_type }}">{{ $type->name }}</a>
                                        @endforeach
                                        {{-- <a href=" {{ url('#') }} " data-filter=".hat">Truck</a>
                                        <a href=" {{ url('#') }} " data-filter=".mpv">MPV</a>
                                        <a href=" {{ url('#') }} " data-filter=".sedan">Sedan</a>
                                        <a href=" {{ url('#') }} " data-filter=".suv">SUV</a> --}}
                                    </div>

                                    <!-- Filtering Menu -->

                                    <!-- PopularCars Tab Content Start -->
                                    <div class="row newest-car-gird">
                                        @foreach($vehicles as $v)
                                           
                                                <!-- Single Popular Car Start -->
                                                <div class="col-lg-4 col-md-6 con {{ $v->id_type }}">
                                                    <div class="single-popular-car">
                                                        <div class="p-car-thumbnails">
                                                            <a class="car-hover" href="{{ Storage::url($v->file) }}">
                                                                <img src="{{ Storage::url($v->file) }}"  alt="JSOFT">
                                                            </a>
                                                        </div>
                                                            
                                                        <div class="p-car-content">
                                                            <h3>
                                                                <a href=" {{  url('detail').'/'.$v->id_vehicle }} ">
                                                                {{ $v->name }}
                                                                {{-- <span class="price"><i class="fa fa-tag"></i> $55/day</span> --}}
                                                                </a>
                                                            </h3>

                                                            <h5> No Plat : {{ $v->nopol }}</h5>
                                                            
                                                            <div class="p-car-feature">
                                                                {{-- <a href=" {{ url('#') }} ">2017</a> --}}
                                                                <a href=" {{ url('#') }} ">{{ $v->transmission }}</a>
                                                                @if($v->ac==1)
                                                                <a href=" {{ url('#') }} ">
                                                                        A/C
                                                                </a>
                                                                @endif
                                                            </div>
                                                            
                                                            <center>
                                                                
                                                                <a href="#" class="rent-btn btn-schedule" data-vehicleid='{{$v->id_vehicle}}'>JADWAL</a>
                                                            </center>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                                <!-- Single Popular Car End -->
                                            
                                        @endforeach
                                    </div>
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


 
    {{-- <!--== Mobile App Area Start ==-->
    <div id="mobileapp-video-bg"></div>
    <section id="mobile-app-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mobile-app-content">
                        <h2>SAVE 30% WITH THE APP</h2>
                        <p>Easy &amp; Fast - Book a car in 60 seconds</p>
                        <div class="app-btns">
                            <a href="#"><i class="fa fa-android"></i> Android Store</a>
                            <a href="#"><i class="fa fa-apple"></i> Apple Store</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Mobile App Area End ==--> --}}


    
<!-- -----------------------------------------------  modal  --------------------------------------------------------- -->
<!-- employ  id            -->
	<div class="modal fade" id="scheduleModal" role="dialog" >
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            <div id='modalTitle'>Jadwal</div>
                        </h4>
                        <button type="button" class="close"  data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        
                        <div class="calendar">
                            
                        </div>
                    
                    </div>
                    
                    <div class="modal-footer">
                       
                    </div>
			</div>
		</div>
	</div> <!-- myModalLabel -->
<!-- -----------------------------------------------end  modal --------------------------------------------------------- -->



@endsection


@section('js')

<script>
$('.calendar').fullCalendar({

    lang: 'id',
    header : {
        left:   'prev,next today',
        center: 'title',
        right:  'month,agendaWeek,agendaDay'
    },
    defaultView : 'month',
    allDaySlot : false,
    eventOverlap: false,
});

</script>

<script>
$('.btn-schedule').click(function() {// fullCalendar 3.90 ajax request
    $.ajax({
        url : '/vehicle-schedule/'+$(this).data('vehicleid'),
        type: 'GET',
        success: function(response){
            $('.calendar').fullCalendar( 'removeEvents', function(e){ return !e.isUserCreated});//menghapus events
             $('.calendar').fullCalendar('renderEvents', response.vehicle, true );//mengisi event
            $('#scheduleModal').modal('show');// menampilkan modal
        },
        error: function(err){
            console.log(err)
        }
    })
});
</script>

@endsection