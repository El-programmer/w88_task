@extends('layouts.app')

@section('content')

<div class="row row-cols-sm-2">

    @forelse ($products as $product)
        @include('site.products.card')
    @empty
    <h3>No Products</h3>

    @endforelse



</div>

<div class="text-center">
    {{$products->links()}}
</div>

@endsection
