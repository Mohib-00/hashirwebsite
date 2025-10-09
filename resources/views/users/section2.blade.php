<section class="banner">
    @foreach ($sections as $section)
        <img src="{{ asset('logos/' . $section->image) }}" 
             alt="Slide {{ $loop->iteration }}" 
             class="{{ $loop->first ? 'active' : '' }}">
    @endforeach

    @foreach ($sections as $section)
        <div class="banner-content {{ $loop->first ? 'active' : '' }}">
            <h1 class="slide-left">{{ $section->heading }}</h1>
            <p class="slide-right">{{ $section->paragraph }}</p>
        </div>
    @endforeach
</section>



