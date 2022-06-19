@extends('layouts.app')

@section('content')
<div class="container">
  
    <a href="/menuproducts" class="btn btn-outline-danger  " style="margin:30px" role="button" aria-pressed="true">Add product</a>
    <table class="table table-striped">
       <tr>
           <th>Id</th>
           <th>Product name</th>
           <th>Product price</th>
           <th>Image url</th>
           <th>Description</th>
           <th></th>
           <th></th>
       </tr>
       @foreach ($allproduct as $product)
       <tr>
           <td>{{$product->id}}
            {{-- <a href="{{ URL::to('/') }}/images/images.jpg">qwe</a>
            <img src="{{ URL::to('/') }}/images/images/images.jpg" alt="qwe">
            <img src="{{url('/images1/images.jpg')}}" alt="Image"/> --}}
            </td>
           <td>{{$product->product_name}}</td>
           <td>{{$product->product_price}}</td>
           <td><img width="200 px" height='100 px' src="{{url('/images/images/'.$product->image_url)}}" alt="{{ URL::to('/') }}/images/images/images.jpg"></td>
           <td>{{$product->description}}</td>            <!-- {{ URL::to('/') }}/images/images/{{$product->image_url}} -->
           <td><a href="/edit_product/{{$product->id}} "class="btn btn-primary">Edit</a></td>
           
           <td><form action="/delete_product/{{$product->id}}"  onsubmit="return confirm('Are you sure you want to delete this product?');">
               @csrf
            <input type="submit" value="Delete" class="btn btn-danger" >
               </form>
               </td>
       </tr>
       @endforeach
   </table>
  
</div>

<div style="height:300px">
</div>
@endsection