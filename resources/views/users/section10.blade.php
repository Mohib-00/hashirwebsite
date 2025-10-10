<section class="trusted-partners">
  <h2>Trusted Partners</h2>

  @php
    $chunks = $sections9s->chunk(ceil($sections9s->count() / 2)); // split into 2 halves
  @endphp

  @foreach($chunks as $index => $chunk)
    <div class="partners-row" id="row{{ $index + 1 }}">
      @foreach($chunk as $section9)
        <img style="border-radius:5px" src="{{ asset('logos/' . $section9->image) }}" alt="{{ $section9->heading }}">
      @endforeach

      {{-- Duplicate for seamless loop --}}
      @foreach($chunk as $section9)
        <img style="border-radius:5px" src="{{ asset('logos/' . $section9->image) }}" alt="{{ $section9->heading }}">
      @endforeach
    </div>
  @endforeach
</section>

<script>
function autoScrollStep(rowId, step = 120, pause = 1500, direction = 1) {
  const row = document.getElementById(rowId);
  if (!row) return;

  const images = row.querySelectorAll("img");
  const totalScroll = row.scrollWidth / 2; // half because images are duplicated
  let scrollPos = 0;

  function scrollNext() {
    scrollPos += step * direction;

    // Reset seamlessly if exceeded
    if (direction === 1 && scrollPos >= totalScroll) scrollPos = 0;
    if (direction === -1 && scrollPos <= 0) scrollPos = totalScroll;

    row.scrollTo({ left: scrollPos, behavior: "smooth" });
    setTimeout(scrollNext, pause);
  }

  scrollNext();
}

document.addEventListener("DOMContentLoaded", () => {
  // Row 1 moves left → right
  autoScrollStep("row1", 120, 1500, 1);
  // Row 2 moves right → left
  autoScrollStep("row2", 120, 1500, -1);
});
</script>
