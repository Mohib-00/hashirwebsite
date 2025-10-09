<section class="carousel-container" style="margin-top:-5%">
    <div class="carousel-trackk">
      @foreach($section2s as $section2)
        <img src="{{ asset('logos/' . $section2->image) }}" 
             alt="Slide ">
             @endforeach
    </div>

</section>