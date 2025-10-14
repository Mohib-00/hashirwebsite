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
  <style>
    .is-invalid {
  border: 1px solid red !important;
  background-color: #ffe6e6;
}
.text-danger {
  font-size: 13px;
}
  </style>
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


<section class="contact-section">
  <div class="container">
    <div class="contact-wrapper">
      
      <div class="contact-info" data-aos="fade-right">
        <h2>How to <span>Reach Us</span></h2>
        <p>
          Get in touch with us for collaborations, service inquiries, or support. Our dedicated team is ready to assist you with any questions.
        </p>

        <div class="info-box">
          <div class="icon"><i class="fas fa-phone-alt"></i></div>
          <div>
            <h3>Phone Support</h3>
            <p><a href="tel:+442031372799">{{$settingssssss->number}}</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-envelope"></i></div>
          <div>
            <h3>Email Support</h3>
            <p><a href="mailto:info@cabcallexperts.com">{{$settingssssss->email}}</a></p>
          </div>
        </div>

        <div class="info-box">
          <div class="icon"><i class="fas fa-location"></i></div>
          <div>
            <h3>Location</h3>
            <p>{{$settingssssss->location}}</p>
          </div>
        </div>
      </div>

      <div class="contact-form" data-aos="fade-left">
        <h3>Leave Your Message</h3>
        <p>Fill out the form below, and our team will respond promptly.</p>

       <form id="contactForm" class="form">
  @csrf
  <div class="form-group">
    <input type="text" name="name" placeholder="Your Name" >
    <small class="error text-danger" id="error-name"></small>
  </div>

  <div class="form-group">
    <input type="email" name="email" placeholder="Your Email" >
    <small class="error text-danger" id="error-email"></small>
  </div>

  <div class="form-group">
    <input type="tel" name="phone" placeholder="Your Phone" >
    <small class="error text-danger" id="error-phone"></small>
  </div>

  <div class="form-group">
    <textarea name="message" rows="5" placeholder="Your Message"></textarea>
    <small class="error text-danger" id="error-message"></small>
  </div>

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


</body>
</html>
