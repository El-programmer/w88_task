<div class="p-1">
    <div class="card" style="width: 18rem;">
        <img src="{{$product->ImageUrl}}" class="card-img-top" alt="{{$product->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$product->title}}</h5>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <a href="{{route('products.show' , $product)}}" class="btn btn-primary">view</a>

          <span class="badge bg-secondary">{{$product->price }} USD</span>
        </div>
      </div>
</div>
