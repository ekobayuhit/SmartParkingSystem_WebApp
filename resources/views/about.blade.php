@extends('layouts.app')

@include('partials.nav')

@section('content')
<div id="about-page">
  <div class="container">
    <div class="card-group text-white">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class"card">
            <div class="card-body wow animated fadeIn">
              <h4 class="card-title"> <b>Soedirman Moeda Project [SM-P]</b></h4>
              <span class="badge badge-pills bg-danger text-dark"> Embedded System </span>
              <span class="badge badge-pills bg-warning text-dark"> Internet of Things </span>
              <span class="badge badge-pills bg-info text-dark"> Automation System </span>
              <p class="text-justify"> Smart Parking System (SPS) is one of our project that focused on building and
                developing fully automatic and interconnected system in order to manage parking traffic efficiently.
               </p>
               <p class="text-justify"> Soedirman Moeda Project initializing by group of people who
                 passionate in developing and implementing new technology like embedded system, internet of things
                and automation system to solve daily life problem. Please contact us for more detail.
                </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class"card">
            <div class="card-body wow animated fadeIn">
              <address>
                <h4 class="card-title"><b>Contact</b></h4>
                <div>
                  <span class="fa fa-map-marker"></span><b> Headquater </b>
                  <br> &nbsp&nbsp Jln. Mayjend Sungkono KM.5 Purbalingga
                </div>
                <div>
                  <span class="fa fa-phone"></span><b> Phone </b>
                  <br> &nbsp&nbsp +62 858 0197 9877
                </div>
                <div>
                  <span class="ion ion-ios-email-outline"></span><b> E-mail </b>
                  <br> &nbsp&nbsp soedirmanmoeda.project@gmail.com
                </div>
                <div>
                  <span class="ion ion-home"></span><b> Website </b>
                  <br> &nbsp&nbsp http://soedirmanmoeda.herokuapp.com
                </div>
                <div>
                  <span class="fa fa-instagram"></span><b> Instagram </b>
                  <br> &nbsp&nbsp soedirmanmoeda.project
                </div>
              </address>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid pt-3">
  <div class="text-center">
    <h5> <b> Our Amazing Team </b> </h5>
    <p class="text-justify">
    </p>
  </div>
  <div id="teams" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner justify-content-center text-center">
      <div class="carousel-item active wow animated fadeIn">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-01.jpg') }}" alt="Wildan Mukholadun Wahyudi"> </img>
        <h5> Wildan Mukholadun Wahyudi</h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item wow animated fadeIn">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-02.jpg') }}" alt="Aliffa Aminnatus Shalihah"> </img>
        <h5> Aliffa Aminnatus Shalihah </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item wow animated fadeIn">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-03.jpg') }}" alt="Bayu Eko Saputro"> </img>
        <h5> Bayu Eko Saputro </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-github" href="#"></a>
      </div>
      <div class="carousel-item wow animated fadeIn">
        <img class="img-thumbnail rounded-circle" src="{{ asset('img/team-04.jpg') }}" alt="Prayogo Ismu Abdillah"> </img>
        <h5> Prayogo Ismu Abdillah </h5>
        <a class="fa fa-facebook-official" href="#"></a>
        <a class="fa fa-instagram" href="#"></a>
        <a class="fa fa-twitter" href="#"></a>
      </div>
      <div class="carousel-item wow animated fadeIn">
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
