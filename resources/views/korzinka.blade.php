@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/total_cost" method="post">
        @csrf
        <table class=" table  table-striped">
            <tr>
                <th>
                    Orders
                </th>
                <th>Number</th>
                <th>
                    Costs
                </th>
                <th></th>
            </tr>
            @foreach ($users as $item)
            <tr>
                <td>
                    {{$item->product_name}} 
                </td>
                <td>
                    <input type="number" name="{{'product_amount['.$item->id.']'}}" value="1">
                </td>
              
                <td>
                    {{$item->product_price}}
                    <input type="hidden" name="{{'product_price['.$item->id.']'}}" value="{{$item->product_price}}">
                    <input type="hidden" name="{{'products['.$item->id.']'}}" value="{{$item->id}}">
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                </td>
                <td>
                    {{-- <form action="/delete_product_by_id/{{$item->id}}"  onsubmit="return confirm('Are you sure you want to delete this product?');" method="POST">
                        @csrf
                    <input type="submit" value="Delete" class="btn btn-danger" >
                    </form> --}}
                    <a class="btn btn-danger" href="/delete_product_by_id/{{$item->id}}"  onsubmit="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
            </tr>
            @endforeach
            <table style="float:right" class="table-striped" >
                <tr>
                    <th>

                    </th>
                    <th style="padding:10px">
                        Total
                    </th>
                    <th>
                     
                    </th>
                </tr>
                <tr>
                    <td><input type="submit"name='total_cost' class="btn btn-success" value="Hisobla" ></td>
                    <td>@if (isset($total_cost))
                         {{$total_cost}}
                    @endif so'm</td>
                    
                    <td>
                        <input class="btn btn-outline-danger" type="submit" value="Zakazat">
                    </td>
                </tr>
            </table>
        </table>
    </form>
</div>
<div class="form-inline" style="height:500px">

</div>
@endsection
