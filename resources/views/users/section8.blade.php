<section class="industries-section">
  <div class="container">
    <div class="section-header">
      <h2>Industries We </h2>
    </div>

    <div class="industries-grid">

      @foreach($sections7s as $sections7)
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="{{ asset('logos/' . $sections7->image) }}" alt="Clutch" width="108" height="108" style="border-radius:50%">
         
        </div>
        <h3>{{ $sections7->heading }}</h3>
        <p>{{ $sections7->paragraph }}</p>
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
