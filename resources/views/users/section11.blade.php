<section class="faqs">
  <h2>FAQs</h2>
  <div class="faq-row">
    
    @foreach($sections10s as $sections10)
    <div class="faq-item">
      <div class="faq-question">
        <span>{{$sections10->heading}}</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">
        {{$sections10->paragraph}}
      </div>
    </div>
    @endforeach

  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  const faqItems = document.querySelectorAll(".faq-item");
  const faqSection = document.querySelector(".faqs");

  const sectionObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) {
        faqItems.forEach(item => {
          item.classList.remove("animate-up", "animate-left", "animate-right", "animate-down");
          item.style.opacity = 0;
        });
      }
    });
  }, { threshold: 0 });

  sectionObserver.observe(faqSection);

  const faqObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const index = Array.from(faqItems).indexOf(entry.target);
        const animClass = 
          index % 4 === 0 ? "animate-up" : 
          index % 4 === 1 ? "animate-left" : 
          index % 4 === 2 ? "animate-right" : 
          "animate-down";

        entry.target.classList.add(animClass);
        entry.target.style.opacity = 1;
      }
    });
  }, { threshold: 0.3 });

  faqItems.forEach(item => faqObserver.observe(item));
});

</script>