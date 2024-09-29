@extends('layouts.app')

@section('content')


<h3>{{$product->title}}</h3>

<div class="row row-cols-sm-2">

<div>
    <img src="{{$product->imageUrl}}" class="card-img-top w-100" alt="{{$product->title}}">
</div>
<div>
    <p>{!! $product->description !!}</p>
</div>

<span class="badge bg-secondary">    {{$product->price}} USD
</span>
</div>
@endsection
