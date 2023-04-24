@extends('layouts.app')
@section('content')

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Result of your score </h2>
          <p>{{Auth::User()->name}} </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <h2>
                Number of incorrect answers
                </h2>
                <h4>
                    <span style="font-size:150px;  color:rgba(182, 6, 6, 0.705);" data-purecounter-start="0" data-purecounter-end={{$incorrect}} data-purecounter-duration="2" class="purecounter"></span>
                </h4>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
                <h2>
                Number of instances left   
                  </h2>
                <h4>
                    <span style="font-size:150px; color:rgba(128, 113, 0, 0.678)" data-purecounter-start="0" data-purecounter-end={{$count-$correct-$incorrect}} data-purecounter-duration="2" class="purecounter"></span>
                </h4>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
                <h2>
                Number of correct answers   
                  </h2>
                <h4>
                    <span style="font-size:150px; color:rgba(0, 128, 0, 0.678)" data-purecounter-start="0" data-purecounter-end={{$correct}} data-purecounter-duration="2" class="purecounter"></span>
                </h4>
            </div>
          </div>
        </div>
        <div class="mb-3"></div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <h2>
              Percent of your score
            </h2>
            <h4>
              <span style="font-size:150px" data-purecounter-start="0" data-purecounter-end={{$correct*100/$count}} data-purecounter-duration="2" class="purecounter"></span>
              <span style="font-size:100px" >%</span>
              <span style="" >______________________________________________________________________________________________</span>
            </h4>
          </div>
        </div>
        <div class="mb-3"></div>
        <div class="d-grid gap-2">
          <a href="{{route('welcome')}}"><button class="btn btn-warning" type="button">End the Test</button></a>
        </div>
      </div>
    </section>            
@endsection
