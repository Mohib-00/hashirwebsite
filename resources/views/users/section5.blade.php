<section class="services-section">
  <h2 class="section-title luxury">{{$settingssssss->section5_heading}}</span></h2>

  <div class="services-carousel">
    <div class="carousel-track">
      @foreach($services as $service)
      <div class="service-card">
        <img src="{{ asset('logos/' . $service->image) }}" alt="{{ $service->title }}">
        <h3>{{ $service->heading }}</h3>
        <p>{{ $service->paragraph }}</p>
        <a href="#" 
           onclick="loadserviceDetails('{{ addslashes($service->heading) }}'); return false;" class="read-more-btn">Read More</a>
      </div>
      @endforeach
    </div>

    <button class="carousel-btn left"><i class="fa-solid fa-chevron-left"></i></button>
    <button class="carousel-btn right"><i class="fa-solid fa-chevron-right"></i></button>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".service-card");

  const observer = new IntersectionObserver((entries, observer) => {
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


