<section class="industries-section">
  <div class="container">
    <div class="section-header">
      <h2>Industries We Serve</h2>
    </div>

    <div class="industries-grid">

      @foreach($section5s as $section5)
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="{{ asset('logos/' . $section5->image) }}" alt="Clutch" width="108" height="108" style="border-radius:50%">
         
        </div>
        <h3>{{ $section5->heading }}</h3>
        <p>{{ $section5->paragraph }}</p>
      </div>
      @endforeach

    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".industry-card");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("show");
        observer.unobserve(entry.target); 
      }
    });
  }, { threshold: 0.3 });

  cards.forEach(card => observer.observe(card));
});
</script>
