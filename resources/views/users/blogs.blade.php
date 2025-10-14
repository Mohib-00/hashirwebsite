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
  <style>

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
  margin-bottom:30px;
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


<section class="industries-sectio" style="background:#f3f4f6">
  <div class="container">
    <div class="section-header">
       @foreach($blogsection2s as $blogsection2)
      <h2 class="luxury">{{$blogsection2->main_heading}}</h2>
      <p style="color:#093945;text-align:center">{{$blogsection2->main_paragraph}}</p>
      @endforeach
    </div>

    <div class="industries-grid">

      @foreach($blogsection2s as $blogsection2)
      <div class="industry-card">
        <div class="icon-wrapper">
          <img src="{{ asset('logos/' . $blogsection2->image) }}" alt="Clutch" width="108" height="108" style="border-radius:50%">
         
        </div>
        <h3>{{ $blogsection2->heading }}</h3>
        <p>{{ $blogsection2->paragraph }}</p>
        <a href="#" 
           onclick="loadserviceDetails('{{ addslashes($blogsection2->heading) }}'); return false;" class="read-more-btn">Read More
        </a>
      </div>
      @endforeach

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


</body>
</html>
