

<form class="inline-block" action="{{ route('cart.store') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="button" onclick="addToCart({{$product->id}})" class="{{ $product->quantity < 1? 'btn btn-warning btn-sm btn-block font-weight-bold' : 'btn btn-success btn-sm btn-block font-weight-bold'}}" style="">
        <span>
            <i class="fas fa-plus"></i> {{ $product->quantity < 1 ? 'OUT OF STOCK ' : 'ADD TO CART'}}
        </span>
    </button>
</form>
