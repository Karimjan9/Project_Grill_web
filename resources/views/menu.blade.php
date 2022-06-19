@extends('layouts.app')

@section('content')
<div style="float:right;">
  <a  class="text-white btn btn-outline-success" href="/korzinka/{{Auth::user()->id}}" style="font-size:20px;float:right;height:100px;width:150px;padding:10px 0px 10px 40px;border-radius:60%"><img style="width:75px;height:75px;float:right;margin:0  40px 0 0 " src="{{url('/images/images/284-2849169_red-simple-shopping-cart-icon-image-recurring-payment.png')}}" alt=""></a>
</div>
<div style="height:100px">

</div>
<nav class="navbar navbar-light bg-light">
    {{-- @if (isset($showmenu))
        <h1>{{print_r($showmenu)}}</h1>
    @endif --}}
  
    <form class="form-inline" >
        @csrf
      <a class="btn btn-outline-danger" href="/menu2/{{$id=2}}" type="button" style="width:240px;">
            <h1>Grill</h1><br>
            <img width="200 px"  height='200 px' src="{{ URL::to('/') }}/images/images/gril-limon-kurica-myaso_1620634985.jpg" alt="">
      </a>
      <a class="btn btn-outline-danger" href="/menu2/{{$id=1}}" type="button" style="width:240px">
        <h1>Tabaka</h1><br>
        <img width="200 px" height='200 px' src="{{ URL::to('/') }}/images/images/tabaka_1620635176.jpg">
      </a>
      <a class="btn btn-outline-danger"href="/menu2/{{$id=3}}" type="button" style="width:240px">
            <h1>KFC</h1><br>
          
            <img width="200 px" height='200 px' src="{{ URL::to('/') }}/images/images/f78b8d9deaf4505b4700b543e405aebb_1620635212.jpg">
      </a>
      <a class="btn btn-outline-danger" href="/menu2/{{$id=4}}" type="button" style="width:240px">
            <h1>Shashlik</h1><br>
            <img width="200 px" height='200 px' src="{{ URL::to('/') }}/images/images/recipe_50162ca9-44e2-4dc8-9dee-62dad6adede7_1620636734.jpg">
           
      </a>
      <a class="btn btn-outline-danger " href="/menu2/{{$id=5}}" type="button" style="width:240px">
            <h1>Ichimliklar</h1><br>
            <img width="200 px" height='200 px' src="{{ URL::to('/') }}/images/images/maxresdefault_1620636678.jpg">
            
      </a>
    </form>
  </nav>

<br>
<br><br>
  <div style="width:100%;height:100%;" class="form-inline">
    @if (isset($showmenu))
      {{-- <h1>{{print_r($showmenu)}}</h1> --}}
      @foreach ($showmenu as $item)
        <div class="card border-primary mb-3  justify-content-center" style="width:450px;margin:40px;float:left">
          <div class="card-header">Product</div>
          <div class="image" style="padding:0 0 30px 30px">
            <img src="{{url('/images/images/'.$item->image_url)}}" alt="" width="300px" height="300px">
          </div>
          <div class="name" style="padding:10px">
            <h3>Nomi: {{$item->product_name}}</h3>
          </div>
          <div class="cost" style="padding:10px">
            <h3>Narxi: {{$item->product_price}} so'm</h3>
          </div>
          <div class="description" style="padding:10px">
            <h3>Comentarie: {{$item->description}}</h3>
          </div>
          <div style="text-align:center;padding:0 0 20px 0 ;  ">
            <form action="/korzinka_database" method="post">
              @csrf
              <input type="hidden" value="{{$item->id}}" name="item_id">
              <input type="hidden" value="{{Auth::user()->id}}" name="user_id"> 
              <input type="hidden" value="{{$menyu_id}}" name="menyu_id"> 
              <input type="submit" name="Buyurtma" value="Buyurtma" class="btn btn-outline-success" style="width:200px;height:50px">
            </form>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@endsection