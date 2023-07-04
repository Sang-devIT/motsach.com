

<div class="slide-index d-flex justify-content-between ">
    <div class="slide-left">
        <div class="slick-slideshow">
            @foreach($slidemax as $key => $item)
                <div>
                    <p class="mb-0">
                        <img src="{{ asset('assets/images/upload/banner/'.$item->photo) }}" alt="image description">
                    </p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="slide-right">
        @foreach($slidemin as $key => $item)
        <div class="slidemin">
            <p class="mb-0">
                <img src="{{ asset('assets/images/upload/banner/'.$item->photo) }}" alt="image description">
            </p>
        </div>
       @endforeach
    </div>  
</div>

