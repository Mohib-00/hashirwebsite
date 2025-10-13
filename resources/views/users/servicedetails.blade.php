<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HubLine Solutions</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('logo2.png') }}">
  @include('users.css')
</style>
</head>
<body>

  @include('users.section1')
  <section class="banner">
    
    @foreach ($servicedetailsection1s as $servicedetailsection1)
    
        <img src="{{ asset('logos/' . $servicedetailsection1->image) }}" 
             alt="Slide {{ $loop->iteration }}" 
             class="{{ $loop->first ? 'active' : '' }}">
    @endforeach

    @foreach ($servicedetailsection1s as $servicedetailsection1)
    <h1></h1>
        <div class="banner-content {{ $loop->first ? 'active' : '' }}">
            <h1 class="slide-left">{{ $servicedetailsection1->heading }}</h1>
            <p class="slide-right">{{ $servicedetailsection1->paragraph }}</p>
        </div>
    @endforeach
</section>


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

.industry-card {
  background: linear-gradient(135deg, #093945, #0f172a); 
  border-radius: 30px 4px 30px 4px;
  padding: 30px 20px;
  text-align: center;
  color: #fff;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
}

.industry-card::before {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle at top left, rgba(0, 210, 255, 0.3), transparent 60%);
  transform: rotate(25deg);
  transition: all 0.6s ease;
}

.industry-card:hover::before {
  top: -30%;
  left: -30%;
  background: radial-gradient(circle at bottom right, rgba(0, 114, 255, 0.5), transparent 70%);
}

.industry-card:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 20px 40px rgba(0, 210, 255, 0.3);
}

.industry-card .icon-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.industry-card h3 {
  font-size: 1.3rem;
  margin-bottom: 10px;
  letter-spacing: 0.5px;
}

.industry-card p {
  font-size: 0.95rem;
  color: #d1d5db;
}
</style>

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


<section class="industries-sectio" style="background:#f3f4f6">
  <div class="container">
    <div class="section-header luxury">
      @foreach($servicedetailsection3s as $servicedetailsection3)
      <h2>{{$servicedetailsection3->main_heading}}</h2>
      @endforeach
    </div>

    <div class="industries-grid">

      @foreach($servicedetailsection3s as $servicedetailsection3)
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="{{ asset('logos/' . $servicedetailsection3->image) }}" alt="Clutch" width="108" height="108" style="border-radius:50%">
         
        </div>
        <h3>{{ $servicedetailsection3->heading }}</h3>
        <p>{{ $servicedetailsection3->paragraph }}</p>
      </div>
      @endforeach

    </div>
  </div>
</section>

@foreach ($servicedetailsection4s as $index => $section3)
<section class="support-section {{ $index % 2 == 1 ? 'reverse' : '' }}" data-index="{{ $index }}" style="margin-top:10%">
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

@include('users.section12')

@include('users.js')
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


</body>
</html>
