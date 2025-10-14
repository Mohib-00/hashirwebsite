<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HubLine-Solutions Blogs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('logo2.png') }}">
  @include('users.css')
</style>
</head>
<body>

  @include('users.section1')
  <section class="banner">
    @foreach ($blogsection1s as $section)
        <img src="{{ asset('logos/' . $section->image) }}" 
             alt="Slide {{ $loop->iteration }}" 
             class="{{ $loop->first ? 'active' : '' }}">
    @endforeach

    @foreach ($blogsection1s as $section)
        <div class="banner-content {{ $loop->first ? 'active' : '' }}">
            <h1 class="slide-left">{{ $section->heading }}</h1>
            <p class="slide-right">{{ $section->paragraph }}</p>
        </div>
    @endforeach
</section>


<section class="blog-section">
  <div class="container">
    <!-- Section Header -->
    <div class="blog-header">
      <h2>Latest <span>Blogs</span></h2>
      <p>
        Stay updated with the latest insights, trends, and stories from our team.  
        Explore what’s new in the world of customer care, innovation, and technology.
      </p>
    </div>

    <!-- Blog Grid -->
    <div class="blog-grid">
      <!-- Blog Card 1 -->
      <div class="blog-card">
        <div class="blog-image">
          <img src="images1.jpeg" alt="Blog 1">
        </div>
        <div class="blog-content">
          <h3>Enhancing Customer Experience with AI</h3>
          <p>Discover how artificial intelligence is revolutionizing call center operations and improving customer satisfaction.</p>
          <a href="#" class="see-more-btn">See More</a>
        </div>
      </div>

      <!-- Blog Card 2 -->
      <div class="blog-card">
        <div class="blog-image">
          <img src="images2.jpeg" alt="Blog 2">
        </div>
        <div class="blog-content">
          <h3>The Future of Taxi Dispatch Services</h3>
          <p>Automation and AI-driven systems are reshaping the taxi industry for faster, more reliable rides.</p>
          <a href="#" class="see-more-btn">See More</a>
        </div>
      </div>

      <!-- Blog Card 3 -->
      <div class="blog-card">
        <div class="blog-image">
          <img src="images3.jpeg" alt="Blog 3">
        </div>
        <div class="blog-content">
          <h3>Building a Strong Customer Support Team</h3>
          <p>Learn key strategies to train and motivate your call center staff for excellence in service delivery.</p>
          <a href="#" class="see-more-btn">See More</a>
        </div>
      </div>

      <!-- Blog Card 4 -->
      <div class="blog-card">
        <div class="blog-image">
          <img src="images1.jpeg" alt="Blog 4">
        </div>
        <div class="blog-content">
          <h3>Outsourcing Done Right</h3>
          <p>How to choose the perfect partner for your customer service outsourcing needs — without compromising quality.</p>
          <a href="#" class="see-more-btn">See More</a>
        </div>
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


</body>
</html>
