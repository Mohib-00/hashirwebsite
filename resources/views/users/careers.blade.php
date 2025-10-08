<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Careers</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  @include('users.css')
</style>
</head>
<body>

  @include('users.section1')
   <section class="banner">
  <img src="images1.jpeg" alt="Slide 1" class="active">
  <img src="images2.jpeg" alt="Slide 2">
  <img src="images3.jpeg" alt="Slide 3">

  <div class="banner-content">
    <h1 class="slide-left"><span>Careers Experts</span> – Inbound Call Centre and Customer Support Services</h1>
    <p class="slide-right">
       Call Centre for Your Taxi Business. CabCall Experts offers fast, automated, 
      and dependable services. We also provide taxi dispatch services to help you handle bookings 
      and improve customer satisfaction.
    </p>
  </div>
</section>

<section class="candidates-section">
  <div class="candidates-container">
    <!-- LEFT SIDE: TEXT -->
    <div class="candidates-text slideInLeft">
      <h2 class="candidates-title">
        What We <span>Look</span> for in <span>Candidates</span>
      </h2>
      <p class="candidates-description">
        We welcome applicants with all levels of experience. If you have a
        passion for customer care outsourcing, we’d love to hear from you!
        Here’s what we look for in our team members:
      </p>

      <ul class="candidates-list">
        <li><span class="dot"></span>Strong customer service and experience skills</li>
        <li><span class="dot"></span>Good communication and problem-solving abilities</li>
        <li><span class="dot"></span>Ability to work in a fast-paced contact call centre</li>
        <li><span class="dot"></span>Willingness to learn and grow in the call centre industry</li>
        <li><span class="dot"></span>Experience in phone answering services or outsourced customer support is a bonus</li>
      </ul>
    </div>

    <!-- RIGHT SIDE: IMAGE -->
    <div class="candidates-image slideInRight">
      <img
        src="https://cabcallexperts.com/wp-content/uploads/2025/05/33-What-We-Look-for-in-Candidates.webp"
        alt="What We Look for in Candidates"
      />
    </div>
  </div>
</section>


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
  @include('users.js')
  @include('ajax')


</body>
</html>
