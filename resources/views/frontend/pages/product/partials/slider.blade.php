<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach ($sliders as $slider)
         <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active': ''}}"></li>

        @endforeach
    </ol>

      <div class="carousel-inner">
        @foreach ($sliders as $slider)

        <div class="carousel-item mt-2 {{ $loop->index == 0 ? 'active': ''}}">
          <img src="{{ asset('images/slider/'.$slider->image) }}" class="d-block w-100" alt="{{ $slider->title }}">
          <div class="carousel-caption d-none d-md-block text-bolder text-secondary">
            <h5>{{ $slider->title}}</h5>
            @if ($slider->button_text)
              <p>
                <a href="{{ $slider->button_link}}" target="_blank" class="btn btn-danger">{{ $slider->button_text }}</a>
              </p>
            @endif
          </div>
        </div>
        @endforeach
      </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

