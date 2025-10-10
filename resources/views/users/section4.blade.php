

@foreach ($section3s as $index => $section3)
<section class="support-section {{ $index % 2 == 1 ? 'reverse' : '' }}" data-index="{{ $index }}">
  <div class="container">
    <div class="image-column">
      <img src="{{ asset('logos/' . $section3->image) }}" alt="Customer Support {{ $index + 1 }}">
    </div>
    <div class="text-column">
      <h2>{!! $section3->heading !!}</h2>
      <p>{{ $section3->paragraph }}</p>
    </div>
  </div>
</section>
@endforeach
