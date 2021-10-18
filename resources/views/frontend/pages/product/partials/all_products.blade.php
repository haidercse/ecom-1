

<div class="card-body">
    @include('backend.layouts.partials.message')
    <div class="row">
       @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card show-product" style="width:13rem;">
                    @php
                        $i =1;
                    @endphp
                   @foreach ($product->image as $img)
                   @if ($i>0)
                     <a href="{{ route('frontend.product.showDetails',$product->slug) }}">
                        <img src="{{ asset('/images/product/'.$img->image) }}" class="card-img-top" alt="">
                    </a>
                   @endif
                      @php
                          $i--;
                      @endphp
                   @endforeach
                    <div class="card-body text-center">
                        <div class="mb-2 ">
                            <a class= "text-decoration-none text-dark" href="{{ route('frontend.product.showDetails',$product->slug) }}">
                                <h5  class="card-title">{{ $product->title }}</h5>
                                <p   class="card-text ">{{ $product->price }}-taka</p>
                            </a>
                        </div>
                       {{-- cart add function  --}}
                       @include('frontend.pages.product.partials.cart-button')
                    </div>
                </div>
            </div>
       @endforeach
    </div>
</div>
