<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HubLine-Solutions Careers</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('logo2.png') }}">
  @include('users.css')
  <style>
.animated-section {
  background-color: #ffffff;
  padding: 80px 0;
  overflow: hidden;
  color: #fff;
}

.animated-section .container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
}

.content-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
  flex-wrap: wrap;
}

/* 🔹 Default: text left, image right */
.text-content {
  flex: 1 1 500px;
  opacity: 0;
  transform: translateX(-50px);
  transition: all 1s ease-out;
  color: black;
}

.image-content {
  flex: 1 1 400px;
  opacity: 0;
  transform: translateX(50px);
  transition: all 1s ease-out;
}

/* 🔹 Reverse section: image left, text right */
.reverse .content-wrapper {
  flex-direction: row-reverse;
}

/* 🔹 Reverse animation direction */
.reverse .text-content {
  transform: translateX(50px);
}

.reverse .image-content {
  transform: translateX(-50px);
}

.visible {
  opacity: 1 !important;
  transform: translateX(0) !important;
}

.text-content h2 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.text-content h2 span {
  color: #0C65AE;
}

.text-content p,
.text-content ul {
  font-size: 1rem;
  line-height: 1.6;
}

.text-content ul li {
  margin-bottom: 10px;
}

.image-content img {
  width: 100%;
  border-radius: 15px;
}

/* 🔹 RESPONSIVE DESIGN */
@media (max-width: 992px) {
  .text-content h2 {
    font-size: 2rem;
  }
  .text-content p,
  .text-content ul {
    font-size: 0.95rem;
  }
}

@media (max-width: 768px) {
  .content-wrapper {
    flex-direction: column !important;
    text-align: center;
  }

  .text-content,
  .image-content {
    transform: translateX(0);
    opacity: 1;
  }

  .text-content {
    flex: 1 1 100%;
  }

  .image-content {
    flex: 1 1 100%;
  }

  .text-content h2 {
    font-size: 1.8rem;
  }

  .text-content p,
  .text-content ul {
    font-size: 0.9rem;
  }

  .text-content ul {
    padding-left: 0;
    list-style-position: inside;
  }

  .image-content img {
    width: 100%;
    border-radius: 10px;
  }
}

@media (max-width: 480px) {
  .text-content h2 {
    font-size: 1.5rem;
  }

  .text-content p,
  .text-content ul {
    font-size: 0.85rem;
  }

  .animated-section {
    padding: 50px 0;
  }
}
</style>
</style>
</head>
<body>

  @include('users.section1')
   <section class="banner">
    @foreach ($careersection1s as $careersection1)
        <img src="{{ asset('logos/' . $careersection1->image) }}" 
             alt="Slide {{ $loop->iteration }}" 
             class="{{ $loop->first ? 'active' : '' }}">
    @endforeach

    @foreach ($careersection1s as $careersection1)
        <div class="banner-content {{ $loop->first ? 'active' : '' }}">
            <h1 class="slide-left">{{ $careersection1->heading }}</h1>
            <p class="slide-right">{{ $careersection1->paragraph }}</p>
        </div>
    @endforeach
</section>

@php
    $sections = $sections6s->values();
    $filled = fn($v) => isset($v) && trim(strtolower($v)) !== '' && strtolower(trim($v)) !== 'null';
@endphp

@foreach ($sections as $index => $section)
    @php
        $isFull = $filled($section->heading)
                && $filled($section->paragraph)
                && $filled($section->points_headings)
                && $filled($section->image);

        if (!$isFull && !$filled($section->point)) continue;

        $mergedPoints = [];
        if ($filled($section->point)) {
            foreach (explode(',', $section->point) as $p) {
                if ($filled($p)) $mergedPoints[] = trim($p);
            }
        }

        if (isset($sections[$index + 1])) {
            $next = $sections[$index + 1];
            $nextIsFull = $filled($next->heading)
                        && $filled($next->paragraph)
                        && $filled($next->points_headings)
                        && $filled($next->image);
            $nextHasPointsOnly = !$nextIsFull && $filled($next->point);
            if ($nextHasPointsOnly) {
                foreach (explode(',', $next->point) as $extra) {
                    if ($filled($extra)) $mergedPoints[] = trim($extra);
                }
            }
        }

        $reverse = $loop->iteration % 2 === 0 ? 'reverse' : '';
    @endphp

    @if($isFull)
    <section class="animated-section {{ $reverse }}">
        <div class="container">
            <div class="content-wrapper">
                <div class="text-content">
                    <h2 style="color:#093945">{{ $section->heading }}</h2>
                    <p>{{ $section->paragraph }}</p>
                    <p><strong>{{ $section->points_headings }}</strong></p>
                    <ul>
                        @foreach($mergedPoints as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="image-content">
                    <img src="{{ asset('logos/' . $section->image) }}" alt="Section Image" />
                </div>
            </div>
        </div>
    </section>
    @endif
@endforeach


<section class="core-values-section">
  <div class="core-values-container">
    <div class="core-values-header fadeInUp">
      <h2 class="core-values-title">
        Why Work at CabCall Experts?
      </h2>
      <p class="core-values-subtitle">
        The guiding principles that shape our culture, drive our performance,
        and define our commitment to excellence.
      </p>
    </div>

    <div class="core-values-grid fadeInUp">
      <div class="value-card">
        <div class="icon">💡</div>
        <h3>Innovation</h3>
        <p>We embrace new ideas and cutting-edge technologies to stay ahead.</p>
      </div>

      <div class="value-card">
        <div class="icon">🤝</div>
        <h3>Integrity</h3>
        <p>We uphold honesty and transparency in every interaction.</p>
      </div>

      <div class="value-card">
        <div class="icon">🚀</div>
        <h3>Excellence</h3>
        <p>We strive to exceed expectations and deliver superior results.</p>
      </div>

      <div class="value-card">
        <div class="icon">❤️</div>
        <h3>Customer Focus</h3>
        <p>We put our clients at the heart of everything we do.</p>
      </div>
    </div>
  </div>
</section>


<section class="industries-section">
  <div class="container">
    <div class="section-header">
      <h2>Current Job Openings</h2>
    </div>

    <div class="industries-grid">
      <!-- CARD 1 -->
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="images1.jpeg" alt="Transportation" width="108" height="108" style="border-radius:50%">
        </div>
        <h3>Transportation <br>(Cab, Limo, Taxi)</h3>
        <p>We manage bookings, dispatch, and customer support to keep rides running smoothly.</p>
        <a href="#" class="apply-btn">Apply Now</a>
      </div>

      <!-- CARD 2 -->
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="images1.jpeg" alt="E-commerce" width="108" height="108" style="border-radius:50%">
        </div>
        <h3>E-commerce & <br>Retail</h3>
        <p>Our agents handle order inquiries, returns, and customer support for online and retail stores.</p>
        <a href="#" class="apply-btn">Apply Now</a>
      </div>

      <!-- CARD 3 -->
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="images1.jpeg" alt="Logistics" width="108" height="108" style="border-radius:50%">
        </div>
        <h3>Logistics & <br>Delivery Services</h3>
        <p>We streamline communication, track deliveries, and ensure timely updates for customers.</p>
        <a href="#" class="apply-btn">Apply Now</a>
      </div>

      <!-- CARD 4 -->
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="images1.jpeg" alt="Healthcare" width="108" height="108" style="border-radius:50%">
        </div>
        <h3>Healthcare</h3>
        <p>Our services help coordinate appointments, patient inquiries, and administrative support.</p>
        <a href="#" class="apply-btn">Apply Now</a>
      </div>
    </div>
  </div>
</section>




<section class="faqs">
  <h2>Careers FAQs</h2>
  <div class="faq-row">
    <div class="faq-item">
      <div class="faq-question">
        <span>What is your return policy?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">
        You can return any item within 30 days of purchase. Please keep the receipt.
      </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">
        <span>Do you offer international shipping?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">
        Yes, we ship worldwide. Shipping charges vary based on location.
      </div>
    </div>
  </div>

  <div class="faq-row">
    <div class="faq-item">
      <div class="faq-question">
        <span>How can I track my order?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">
        You will receive a tracking link via email once your order is shipped.
      </div>
    </div>
    <div class="faq-item">
      <div class="faq-question">
        <span>Do you offer discounts for bulk orders?</span>
        <span class="faq-toggle">+</span>
      </div>
      <div class="faq-answer">
        Yes, please contact our sales team for bulk order pricing.
      </div>
    </div>
  </div>
</section>
 
  @include('users.section12')
  @include('ajax')

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

<script>
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll('.text-content, .image-content');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.3 });

  elements.forEach(el => observer.observe(el));
});
</script>
</body>
</html>
