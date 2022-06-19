@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add product') }}</div>
                <div class="card-body">
                    <form method="post" action="/change_product/{{$edit_product->id}}">
                        @csrf
                        <input type="hidden" name="_method" id="put">
                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>

                            <div class="col-md-6">
                                <input  id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ $edit_product->product_name }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_group" class="col-md-4 col-form-label text-md-right">{{ __('Product group') }}</label>

                            <div class="col-md-6">
                               <select name="product_group"  class="form-control">
                                   <option value="">Choose</option>
                                   @foreach ($allproduct as $product)
                                        <option value="{{$product->id}}">{{$product->group_name}}</option>   
                                   @endforeach
                                  
                               </select>

                                @error('product_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_price" class="col-md-4 col-form-label text-md-right">{{ __('Product price') }}</label>

                            <div class="col-md-6">
                                <input placeholder="product price" id="product_name" type="number" class="form-control @error('product_name') is-invalid @enderror" name="product_price" value="{{  $edit_product->product_price }}" required autocomplete="product_name" autofocus>

                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('Image Url') }}</label>

                            <div class="col-md-6">
                                <input placeholder="image url" id="image_url" type="text" class="form-control @error('image_url') is-invalid @enderror" name="image_url" value="{{  $edit_product->image_url }}" required autocomplete="image_url" autofocus>

                                @error('image_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input placeholder="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{  $edit_product->description }}" required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="height:200px">

</div>

<div style="height:400px">

</div>
@endsection