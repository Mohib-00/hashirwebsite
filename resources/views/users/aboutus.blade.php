<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HubLine-Solutions About Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('logo2.png') }}">
  @include('users.css')
</style>
</head>
<body>

  @include('users.section1')
   <section class="banner">
    @foreach ($aboutsection1s as $section)
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




@foreach ($aboutsection2s as $index => $section3)
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

<section class="industries-sectio">
  <div class="container">
    <div class="section-header">
      @foreach($aboutsection3s as $aboutsection3)
      <h2 class="luxury">{{$aboutsection3->main_heading}}</h2>
      <p style="color:#093945;text-align:center">{{$aboutsection3->main_paragraph}}</p>
      @endforeach
    </div>

    <div class="industries-grid" style="margin-top:20px">

      @foreach($aboutsection3s as $aboutsection3)
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="{{ asset('logos/' . $aboutsection3->image) }}" alt="Clutch" width="108" height="108" style="border-radius:50%">
         
        </div>
        <h3 style="color:#093945">{{ $aboutsection3->heading }}</h3>
        <p style="color:#093945">{{ $aboutsection3->paragraph }}</p>
      </div>
      @endforeach

    </div>
  </div>
</section>


<section class="faqs">
  <h2>FAQs</h2>
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
