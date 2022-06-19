@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add product') }}</div>
                <div class="card-body">
                    <form method="POST" action="/send" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>

                            <div class="col-md-6">
                                <input placeholder="product" id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

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
                                   @foreach ($products as $product)
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
                                <input placeholder="product price" id="product_name" type="number" class="form-control @error('product_name') is-invalid @enderror" name="product_price" value="{{ old('product_name') }}" required autocomplete="product_name" autofocus>

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
                                <input id="image_url" type="file" class="form-control @error('image_url') is-invalid @enderror" name="image_url" value="{{ old('image_url') }}" required autocomplete="image_url" autofocus>

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
                                <input placeholder="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

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
@endsection
