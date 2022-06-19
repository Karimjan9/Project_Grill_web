@extends('layouts.app')

@section('content')
<div  style="height:1000px" >
    <div class="row justify-content-center" style="background-color:gray">
        <div class="col-md-8" >
            <div class="card" >
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner" >
                          <div class="carousel-item active" >
                            <img class="d-block w-100" src="{{url('/images/images/gril-limon-kurica-myaso_1620634985.jpg')}}" alt="Первый слайд" style="width:500px;height:400px;">
                          </div>
                          <div class="carousel-item" >
                            <img class="d-block w-100" src="{{url('/images/images/f78b8d9deaf4505b4700b543e405aebb_1620635212.jpg')}}" alt="Второй слайд" style="width:500px;height:400px;">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="{{url('/images/images/recipe_50162ca9-44e2-4dc8-9dee-62dad6adede7_1620636734.jpg')}}" alt="Третий слайд" style="width:500px;height:400px;">
                          </div>
                          <div class="carousel-item" >
                            <img class="d-block w-100" src="{{url('/images/images/tabaka_1620635176.jpg')}}" alt="Второй слайд" style="width:500px;height:400px;">
                          </div>
                          <div class="carousel-item" >
                            <img class="d-block w-100" src="{{url('/images/images/maxresdefault_1620636678.jpg')}}" alt="Третий слайд" style="width:500px;height:400px;">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    
                </div>
           
        </div>
    </div>
</div>
@endsection
