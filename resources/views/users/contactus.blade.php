<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HubLine-Solutions Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('logo2.png') }}">
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
    <h1 class="slide-left"><span>Contact Experts</span> – Inbound Call Centre and Customer Support Services</h1>
    <p class="slide-right">
       Call Centre for Your Taxi Business. CabCall Experts offers fast, automated, 
      and dependable services. We also provide taxi dispatch services to help you handle bookings 
      and improve customer satisfaction.
    </p>
  </div>
</section>


<section class="contact-section">
  <div class="container">
    <div class="contact-wrapper">
      
      <!-- Left Column -->
      <div class="contact-info" data-aos="fade-right">
        <h2>How to <span>Reach Us</span></h2>
        <p>
          Our dedicated support team is available 24/7 to assist you. Whether you need help with taxi dispatch, call answering, or customer service, we’re just a call or message away.
        </p>

        <div class="info-box">
          <div class="icon"><i class="fas fa-phone-alt"></i></div>
          <div>
            <h3>Phone Support (UK)</h3>
            <p><a href="tel:+442031372799">+44 20 3137 2799</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-phone"></i></div>
          <div>
            <h3>Phone Support (US)</h3>
            <p><a href="tel:+16467624106">+1 646 762 4106</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-envelope"></i></div>
          <div>
            <h3>Email Support</h3>
            <p><a href="mailto:info@cabcallexperts.com">info@cabcallexperts.com</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-headset"></i></div>
          <div>
            <h3>Live Chat Support</h3>
            <p>Our agents are available round the clock for real-time chat assistance.</p>
          </div>
        </div>
      </div>

      <!-- Right Column -->
      <div class="contact-form" data-aos="fade-left">
        <h3>Leave Your Message</h3>
        <p>Fill out the form below, and our team will respond promptly.</p>

        <form action="#" method="post" class="form">
          <input type="text" name="name" placeholder="Your Name" required>
          <input type="email" name="email" placeholder="Your Email" required>
          <input type="tel" name="phone" placeholder="Your Phone" required>
          <textarea name="message" rows="5" placeholder="Your Message"></textarea>
          <button type="submit" class="send-btn">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="qa-wrapper">
  <div class="qa-content">
    <h2 class="qa-main-heading">{{$settingssssss->section11_heading}}</h2>

    <div class="qa-section">
      @foreach($sections10s as $sections10)
        <div class="qa-card" style="background:#093945">
          <input type="checkbox" id="qa-q{{ $loop->index }}">
          <label for="qa-q{{ $loop->index }}" class="qa-question">
            <h3>{{ $sections10->heading }}</h3>
            <span class="qa-toggle"></span>
          </label>
          <div class="qa-answer">
            <p>{{ $sections10->paragraph }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


  @include('users.section12')
  @include('users.js')
  @include('ajax')


</body>
</html>
