@extends('layouts.app')

@section('content')

<a href="/mycroplook/public/explore-products" class="btn btn-secondary" style="margin-bottom:2rem">Go Back</a>


<h1>{{$post->crop_name}}</h1>
    <div>
<img style="" class="mi i" src="/mycroplook/storage/app/mycroplook/storage/app/public/cropImage/{{$post->crop_image}}">
               <br><br>
        <h6>Crop Price: <b>{{$post->crop_price}}</b> / kg</h6>
        <h6>Description: {{$post->crop_desc}}</h6>
        <h6>Crop Status: {{$post->crop_status}}</h6>
        <h6>Crop Inventory: {{$post->crop_quantity}}</h6>
        <h6>Harvest Period: {{$post->crop_harvestPeriod}}</h6>
        <h6>Farmer: {{$post->user->name}}</h6>

    </div>
    <hr>

    <small> Posted on {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href="/mycroplook/public/explore-products/{{$post->id}}/edit" class ="btn btn-default.inline-block bg-dark text-light">Edit</a>
           {!!Form::open(['action' => ['ExploreProductsController@destroy', $post->id], 'method' =>'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            @endif
    @endif
   @endsection