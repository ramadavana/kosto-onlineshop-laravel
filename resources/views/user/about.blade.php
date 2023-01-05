@extends('user.app')
@section('content')
<section id="about" data-stellar-background-ratio="0.5">
    <div class="container" >
         <div class="row ">
              <div class="col-md-6 col-sm-12 mt-5">
                   <div class="about-info text-black">
                        <div class="section-title wow fadeInUp text-center" data-wow-delay="0.2s">
                             <h2>Tentang Kami</h2>
                             <h1>Kost Pak Toto</h1>
                        </div>

                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <p class="text-justify">
                              <br>
                              Kost Pak Toto adalah sebuah unit usaha yang bergerak di bidang jasa, yaitu jasa sewa kamar kos. Kost Pak Toto terletak di Jalan Dayung IV B No. 05 RT. 06 RW. 05, Kelapa dua Kabupaten Tangerang. Kost Pak Toto memiliki tempat yang strategis bagi mahasiswa atau orang yang sedang mencari tempat tinggal di daerah yang strategis. Kost ini terletak dekat dengan beberapa universitas seperti, UPH, Gunadarma, Esa Unggul, dan UMN. Selain dekat dengan beberapa kampus, kost ini juga dekat dengan pasar swalayan, cafe, minimarket, dan mall seperti Supermall Karawaci dan Summarecon Mall Serpong.
                            </p>
                            <p class="text-justify">
                              Kost Pak Toto memiliki harga yang sangat terjangkau bagi penyewa yang ingin menyewa kamar kost. Dibanderol dengan harga Rp. 550.000 penyewa akan dapat beberapa fasilitas, seperti tempat tidur, bantal, guling, lemari, kamar mandi, tempat parkir, dan wifi guna membantu para penyewa untuk bisa mengakses internet. Kost Pak Toto, harga murah, lokasi strategis, dan nyaman untuk ditinggali.
                         </p>
                        </div>
                   </div>
              </div>

              <div class="col-md-6 col-sm-12 ">
                   <div class="wow fadeInUp about-image" data-wow-delay="0.6s">
                        <img src="{{asset('image/kostdpn.jpg')}}" class="img-responsive" width="100%" height="500px" style="margin-left: 50px; margin-top: 50px;">
                   </div>
              </div>

         </div>
    </div>

    <div class="container text-center text-black" style="margin-top: 50px; margin-bottom: 50px;">
     <h2 style="margin-bottom: 20px">Lokasi Kami</h2>
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d490.61459032559515!2d106.6226329230125!3d-6.2331661999999906!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69fd374506be5d%3A0xfad49fed01d630b6!2sKost%20pak%20Toto!5e1!3m2!1sid!2sid!4v1657900666892!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

				<!-- footer-wrap -->
				<div id="footer-wrap"><div class='wsite-elements wsite-footer'>
<div><div class="wsite-multicol"><div class="wsite-multicol-table-wrap" style="margin:0 -25px;">
	<table class="wsite-multicol-table">
		<tbody class="wsite-multicol-tbody">
			<tr class="wsite-multicol-tr">
				<td class="wsite-multicol-col" style="width:18.17649321299%; padding:0 25px;">
				<!-- end footer-wrap-->	
					
@endsection