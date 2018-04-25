@extends('layouts.app')

@include('partials.nav')

@section('content')
<div class="img-fluid" style="background-image: url('img/sm.png');background-position:center;background-size:cover;background-repeat: no-repeat;background-color:black">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color:white;text-shadow:2px 4px 5px black">
        <br><br><br><br>
        <h4> <b>Soedirman Moeda Project</b></h4>
        <p class="text-justify"> A project initialized to make and develop iot and automation system in order to solve real problem.
            We will hear every piece of your problem and giving our best effort to help you find a best solution.
    			  We also will give you a warranty because we really care to you.
            In order to achieve the mission we will provide to you a best team we have.
    			  Please contact us and we will immediately answer your request.
         </p>
         <br>
        <address>
          <h4><b>Contact</b></h4>
          <span class="fa fa-map-marker"></span><b> Headquater </b> Jln. Mayjend Sungkono KM.5 Purbalingga
          <br>
          <span class="fa fa-phone"></span><b> Phone </b> +62 858 0197 9877
          <br>
          <span class="fa fa-mail-forward"></span><b> E-mail </b> soedirmanmoeda.project@gmail.com
          <br>
          <span class="fa fa-instagram"></span><b> Instagram </b> soedirmanmoeda.project
        </address>
        <br>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <br><br><br>
  <div class="text-center">
    <h5> <b> Our Amazing Team </b> </h5>
    <p class="text-justify">
    </p>
  </div>
  <div id="teams" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner justify-content-center text-center">
      <div class="carousel-item active">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-01.jpg') }}" alt="Wildan Mukholadun Wahyudi"> </img>
        <h5> Wildan Mukholadun Wahyudi</h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-02.jpg') }}" alt="Aliffa Aminnatus Shalihah"> </img>
        <h5> Aliffa Aminnatus Shalihah </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-03.jpg') }}" alt="Bayu Eko Saputro"> </img>
        <h5> Bayu Eko Saputro </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-04.jpg') }}" alt="Prayogo Ismu Abdillah"> </img>
        <h5> Prayogo Ismu Abdillah </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-05.jpg') }}" alt="Ahmad Khafidz"> </img>
        <h5> Ahmad Khafidz </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#teams" data-slide="prev">
      <span class="fa fa-arrow-circle-left" style="color:blue"></span>
    </a>
    <a class="carousel-control-next" href="#teams" data-slide="next">
      <span class="fa fa-arrow-circle-right" style="color:blue"></span>
    </a>
  </div>`
</div>

@include('partials.footer')

@endsection
