<section class="customer-reviews">
  <div class="container">
    <h2>Success Highlights</h2>

    <div class="reviews-wrapper">
      <div class="reviews-carousel">
        @foreach($sections8s as $sections8)
        <div class="review-card">
          <div class="review-rating">
            ★★★★★
          </div>
          <i class="review-text">
            “{{ $sections8->main_paragraph }}”
          </i>
          <div class="reviewer-info">
            <img src="{{ asset('logos/' . $sections8->image) }}" alt="{{ $sections8->heading }}">
            <div>
              <h4>{{ $sections8->heading }}</h4>
              <p>{{ $sections8->paragraph }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


<script>
document.addEventListener('DOMContentLoaded', function () {
  const cards = document.querySelectorAll('.review-card');
  const section = document.querySelector('.customer-reviews');

  // Observer for section visibility
  const sectionObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        // Section fully out of view — reset all animations
        cards.forEach(card => {
          card.style.opacity = 0;
          card.classList.remove('animate-up', 'animate-left', 'animate-right');
        });
      }
    });
  }, { threshold: 0 }); // triggers when section fully leaves

  sectionObserver.observe(section);

  // Observer for cards (only animates when visible)
  const cardObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const index = Array.from(cards).indexOf(entry.target);
        const animClass =
          index % 3 === 0 ? 'animate-up' :
          index % 3 === 1 ? 'animate-left' : 'animate-right';
        
        // restart animation cleanly
        entry.target.classList.remove('animate-up', 'animate-left', 'animate-right');
        void entry.target.offsetWidth; // force reflow
        entry.target.classList.add(animClass);
        entry.target.style.opacity = 1;
      }
    });
  }, { threshold: 0.3 });

  cards.forEach(card => cardObserver.observe(card));
});
</script>
