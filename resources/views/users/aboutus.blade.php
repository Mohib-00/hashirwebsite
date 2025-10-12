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





<section class="vision-section">
  <div class="vision-container">
    <div class="vision-text fadeInLeft">
      <h2 class="vision-title">
        Our <span>Vision</span>
      </h2>
      <p class="vision-description">
        We want businesses to provide outstanding customer support without the
        stress of managing calls. Our goal is to set new industry standards in
        call handling, dispatch services, and quality assurance. We achieve this
        by combining advanced technology with excellent customer service.
      </p>
    </div>
    <div class="vision-image fadeInRight">
      <img
        src="https://cabcallexperts.com/wp-content/uploads/2025/05/19-Our-Vision.webp"
        alt="Our Vision - Call Handling Services"
      />
    </div>
  </div>
</section>


<section class="core-values-section">
  <div class="core-values-container">
    <div class="core-values-header fadeInUp">
      <h2 class="core-values-title">
        Core <span>Values</span>
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
  @include('users.js')
  @include('ajax')


</body>
</html>
