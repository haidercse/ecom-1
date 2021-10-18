<ul class="list-group">

  @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
    <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action " data-toggle="collapse">

        <img src="{{ asset('images/category/'.$parent->image) }}" width="82" alt="">
        {{ $parent->name }}

    </a>
    <div class="collapse child-rows
    @if(Route::is('frontend.category.show'))
        @if(App\Models\Category::ParentOrNotCategory($parent->id,$category->id))
           show
        @endif
    @endif
     " id="main-{{ $parent->id }}">
        @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
        <a href="{{ route('frontend.category.show',$child->id) }}" class="list-group-item list-group-item-action
            @if(Route::is('frontend.category.show'))
               @if($child->id == $category->id)
                   active
               @endif
            @endif
            ">

            <img class="child-image" src="{{ asset('images/category/'.$child->image) }}" width="55" alt="">
            {{ $child->name }}

        </a>
        @endforeach
    </div>
  @endforeach


</ul>
