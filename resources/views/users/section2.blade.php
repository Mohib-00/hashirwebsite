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
<script>
document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".banner img");
  const contents = document.querySelectorAll(".banner-content");
  let index = 0;

  setInterval(() => {
    slides[index].classList.remove("active");
    contents[index].classList.remove("active");

    index = (index + 1) % slides.length;

    slides[index].classList.add("active");
    contents[index].classList.add("active");
  }, 5000); 
});
</script>




