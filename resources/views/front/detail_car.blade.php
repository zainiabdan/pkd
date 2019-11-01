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
    <section id="choose-car" class="">
        <div class="container">
            {{-- <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Pilih Kendaraan</h2>
                        <span class="title-line">
                            <i class="fa "></i>
                        </span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
             --}}

            <div class="row">
                <!-- Choose Area Content Start -->
                <div class="col-lg-12">
                    <div class="choose-content-wrap">
                    

                        <!-- Choose Area Tab content -->
                        <div class="tab-content" id="myTabContent">
                            <!-- Popular Cars Tab Start -->
                            <div class="tab-pane fade show active" id="tersedia" role="tabpanel" aria-labelledby="home-tab">
                                <!-- Popular Cars Content Wrapper Start -->
                                   
                                <!--== Car List Area Start ==-->
                                <section id="car-list-area" class="section-padding">
                                    <div class="container">
                                        <div class="row">
                                            
                                            <!-- Car List Content Start -->
                                            <div class="col-lg-12">
                                                <div class="car-list-content ">
                                                    <!-- Single Car Start -->
                                          
                                                  {{-- @foreach ($transaksi as $trs) --}}
                                                   
                                                            <div class="single-car-wrap">
                                                                

                                                                <div class="row">
                                                                    <!-- Single Car Thumbnail -->
                                                                    <div class="col-lg-5">
                                                                        <div class="p-car-thumbnails-order">
                                                                             <a class="car-hover" href="{{ Storage::url($vehicle->file) }}">
                                                                                <img src="{{ Storage::url($vehicle->file) }}" style="" alt="JSOFT">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Single Car Thumbnail -->
                                                                    
                                                                    <!-- Single Car Info -->
                                                                    <div class="col-lg-7">
                                                                        <div class="display-table">
                                                                            <div class="display-table-cell">
                                                                                <div class="car-list-info">
                                                                                      <h2><a href="#">{{ $vehicle->name }}</a></h2>
                                                                                    <h5>
                                                                                        <br>                          
                                                                                    </h5>
                                                                                    <div class="ourcar-info text-center">
                                                                                        {{-- <h2><span>Detail</span></h2> --}}
                                                                                        <table class="our-table table_id">
                                                                                         
                                                                                            <tr>
                                                                                                <td>Tipe</td>
                                                                                                <td>{{ $vehicle->type }}</td>
                                                                                            </tr>
                                                                                        
                                                                                            <tr>
                                                                                                <td>Kapasitas Penumpang</td>
                                                                                                <td>{{ $vehicle->seats }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Transmisi</td>
                                                                                                <td>{{ $vehicle->transmission }}</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>AC</td>
                                                                                                <td>{{ $vehicle->ac == '1' ? "Ya" : 'Tidak'  }}</td>
                                                                                            </tr>
                                                                                        </table>
                                                                                      
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
                                                            <!-- Single Car End -->
                                                       
                                                        
                                                    {{-- @endforeach --}}
                                                   
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

                        </div>
                        <!-- Choose Area Tab content -->
                    </div>
                </div>
                <!-- Choose Area Content End -->
            </div>
        </div>
    </section>
    <!--== Choose Car Area End ==-->

{{-- 
    <section  class="">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Jadwal Kendaraan</h2>
                        <span class="title-line">
                            <i class="fa "></i>
                        </span>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> 
                    </div>
                </div>
                <!-- Section Title End -->
            </div>
        </div>
    </section> --}}


    <!--== Our Cars Area Start ==-->
    <section id="our-cars" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-content">
                        <div class="row">
                            <!-- OurCars Tab Content start -->
                            <div class="col-lg-12">
                                <div class="tab-content" id="ourcartabcontent">
                                    <!-- Single OurCars  start -->
                                    <div class="tab-pane fade show active" id="ourcar_1" role="tabpanel" aria-labelledby="ourcar_item_1">
                                        <div class="row">
                                            
                                           
                                            <div class="col-lg-8 text-center">
                                                <h2>
                                                    Jadwal Pinjam Kendaraan
                                                </h2>
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            {{-- <a class="car-hover" href="{{ Storage::url($vehicle->file) }}">
                                                                <img src="{{ Storage::url($vehicle->file) }}" style="" alt="JSOFT">
                                                            </a> --}}

                                                            <div class="calendar">
                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2><span><h5>Silakan isi form pemesanan</h5></span></h2>
                                                 
                                                    <form id="form_order" action="{{url('transaction/store')}}" method="post" autocomplete="off" >
                                                        <table class="our-table">
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <div class="form-group">
                                                                            <b>Nama Peminjam</b>
                                                                            <input readonly type="text" name="nama" placeholder="Nama Peminjam" class="nama form-control" value="{{ $user->name }}" required="required" id="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <b>Instansi</b>
                                                                            <input readonly type="text" name="instansi" placeholder="Instansi/Unit Kerja" class="instansi form-control" value="{{ $user->nama_instansi }}" required="required" id="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <b>Keperluan</b>
                                                                            <input type="text" name="keperluan" placeholder="Keperluan" class="keperluan form-control" required="required" id="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <b>Tujuan</b>
                                                                            <input type="text" name="tujuan" placeholder="Tujuan" class="tujuan form-control" required="required" id="">
                                                                        </div>
                                                                        
                                                                        <div class="form-group">
                                                                            <b>Mulai</b>
                                                                            <input type="text" name="tgl_pinjam" placeholder="Waktu Mulai" class="tgl_pinjam form-control" required="required" id="startDate">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <b>Sampai</b>
                                                                            <input type="text" name="tgl_kembali" placeholder="Waktu Selesai" class="tgl_kembali form-control" required="required" id="endDate">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                
                                                                
                                                                {{ csrf_field() }}
                                                                @if(Auth::check())
                                                                <input type="hidden" value="{{Auth::user()->id_user}}" name="id_peminjam">
                                                                @endif
                                                                <input type="hidden" value="088258551053" class="no" name="no">
                                                                <input type="hidden" value="{{ $vehicle->id_vehicle }}" name="id_vehicle">
                                                                <input type="submit" style="display: none;" id="btnSubmit">
                                                                <input id='btn-schedule' type="hidden"  data-vehicleid='{{$vehicle->id_vehicle}}'>
                                                                
                                                                
                                                                
                                                            </table>
                                                        
                                                            <div id="whatsapp" class="toggle">
                                                            {{-- <a class="submit" value="submit" id="submit-form" >KIRIM ></a> --}}
                                                            <a href="javascript:{}"  id="submit-form"  onclick="document.getElementById('btnSubmit').click(); return false;" class="bookbtn submit" >Pesan</a>
                                                        </div>
                                                        
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->

                                 
                                </div>
                            </div>
                            <!-- OurCars Tab Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Our Cars Area End ==-->

    <section id="" class="section-padding">
    </section>


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
$(document).ready(function() {// fullCalendar 3.90 ajax request
    $.ajax({
        url : '/vehicle-schedule/'+$('#btn-schedule').data('vehicleid'),
        type: 'GET',
        success: function(response){
            $('.calendar').fullCalendar( 'removeEvents', function(e){ return !e.isUserCreated});//menghapus events
             $('.calendar').fullCalendar('renderEvents', response.vehicle, true );//mengisi event
           // $('#scheduleModal').modal('show');// menampilkan modal
        },
        error: function(err){
            console.log(err)
        }
    })
});
</script>


<script>
$('.whatsapp-btn').click(function(){
	$('#whatsapp').toggleClass('toggle');
});
// Onclick Whatsapp Sent!
$('#whatsapp .submit').click(WhatsApp);

$("#whatsapp input, #whatsapp textarea").keypress(function() {
	if (event.which == 13) WhatsApp();
});
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
function WhatsApp() {
var ph = '';
	if ($('.perihal').val() == '') { // perihal
		ph = $('.perihal').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('.perihal').focus();
		return false;

	} else if ($('.tgl_pinjam').val() == '') { // tgl_pinjam
		ph = $('.tgl_pinjam').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('.tgl_pinjam').focus();
		return false;
	} else if ($('.tgl_kembali').val() == '') { // Waktu
		ph = $('.tgl_kembali').attr('placeholder');
		alert('Silahkan tulis ' + ph);
		$('.tgl_kembali').focus();
		return false;
	
	} else {	
		// if (!confirm("Klik oke untuk kirim via WhatsApp")) {
		// 	//window.open("https://www.whatsapp.com/download/", '_blank');
		// } else {
			// Check Device (Mobile/Desktop)
			var url_wa = 'https://web.whatsapp.com/send';
			if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				url_wa = 'whatsapp://send/';
			}
			// Get Value
			var no = $('.no').val(),
					via_url = location.href,
					instansi = $('.instansi').val(),
					perihal = $('.perihal').val(),
                    tgl_pinjam = $('.tgl_pinjam').val(),
					tgl_kembali = $('.tgl_kembali').val();
					jumlah = $('.jumlah').val();
			$(this).attr('href', url_wa + '?phone=62 ' + no + '&text=Saya dari *' + instansi + '* %0A%0APerihal:%20' + perihal +' %0A%0Atgl_pinjam:%20'+ tgl_pinjam +  ' %0A%0Atgl_kembali:%20' + tgl_kembali +  ' %0A%0A');
			var w = 960,
					h = 540,
					left = Number((screen.width / 2) - (w / 2)),
					tops = Number((screen.height / 2) - (h / 2)),
					popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
			popupWindow.focus();
			return false;
		// }
    }
}
</script>

 @endsection