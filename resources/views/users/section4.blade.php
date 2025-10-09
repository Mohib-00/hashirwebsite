<style>
.support-section {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 80px 0;
  background: #f9fafb;
  overflow: hidden;
}

.support-section .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 85%;
  flex-wrap: wrap;
}

.support-section.reverse .container {
  flex-direction: row-reverse;
}

/* Base hidden states */
.text-column,
.image-column {
  flex: 1;
  min-width: 300px;
  opacity: 0;
  transition: transform 1s ease-out, opacity 1s ease-out;
}

/* Default transform directions */
.text-column { transform: translateX(-120px); padding: 20px 40px; }
.image-column { transform: translateX(120px); text-align: center; }

/* Reverse transform directions */
.support-section.reverse .text-column { transform: translateX(120px); }
.support-section.reverse .image-column { transform: translateX(-120px); }

/* When active, bring both to place */
.support-section.active .text-column,
.support-section.active .image-column {
  transform: translateX(0);
  opacity: 1;
}

/* Headings and paragraphs */
.text-column h2 {
  font-size: 2.6rem;
  font-weight: 800;
  color: #1e1e1e;
  margin-bottom: 20px;
  line-height: 1.3;
}

.text-column h2 span {
  background: linear-gradient(90deg, #007bff, #00c3ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: 900;
}

.text-column p {
  font-size: 1.15rem;
  color: #444;
  line-height: 1.7;
  margin-bottom: 15px;
}

/* Image styles */
.image-column img {
  width: 100%;
  max-width: 450px;
  border-radius: 15px;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.image-column img:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* Responsive for mobile */
@media (max-width: 768px) {
  .support-section .container,
  .support-section.reverse .container {
    flex-direction: column;
    text-align: center;
  }

  .text-column,
  .image-column {
    transform: translateY(60px);
  }

  .support-section.active .text-column,
  .support-section.active .image-column {
    transform: translateY(0);
    opacity: 1;
  }

  .image-column img {
    max-width: 80%;
    margin-bottom: 25px;
  }
}
</style>

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

<script>
document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll('.support-section');

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
      }
    });
  }, {
    threshold: 0.25,
    rootMargin: '0px 0px -10% 0px'
  });

  sections.forEach(section => observer.observe(section));
});
</script>
