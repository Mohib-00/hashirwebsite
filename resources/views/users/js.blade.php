
  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const navMenu = document.getElementById('nav-menu');
    const dropdownToggle = document.querySelector('.dropdown-toggle');
    const dropdown = document.querySelector('.dropdown');

    menuToggle.addEventListener('click', () => {
      navMenu.classList.toggle('active');
      menuToggle.innerHTML = navMenu.classList.contains('active')
        ? '<i class="fa-solid fa-times"></i>'
        : '<i class="fa-solid fa-bars"></i>';
    });

    dropdownToggle.addEventListener('click', (e) => {
      e.preventDefault();
      dropdown.classList.toggle('show');
    });

    document.addEventListener('click', (e) => {
      if (!dropdown.contains(e.target) && !e.target.classList.contains('dropdown-toggle')) {
        dropdown.classList.remove('show');
      }
    });

    let slides = document.querySelectorAll('.banner img');
    let current = 0;
    function showNextSlide() {
      slides[current].classList.remove('active');
      current = (current + 1) % slides.length;
      slides[current].classList.add('active');
    }
    setInterval(showNextSlide, 4000);
  </script>


<script>
const track = document.querySelector('.services-carousel .carousel-track');
const cards = document.querySelectorAll('.services-carousel .service-card');
const leftBtn = document.querySelector('.services-carousel .carousel-btn.left');
const rightBtn = document.querySelector('.services-carousel .carousel-btn.right');

let index = 0;

function getVisibleCards() {
  const containerWidth = document.querySelector('.services-carousel').offsetWidth;
  const cardStyle = getComputedStyle(cards[0]);
  const cardWidth = cards[0].offsetWidth;
  const gap = parseInt(cardStyle.marginRight) || 30; 
  return Math.floor(containerWidth / (cardWidth + gap));
}

function moveCarousel() {
  const cardStyle = getComputedStyle(cards[0]);
  const cardWidth = cards[0].offsetWidth;
  const gap = parseInt(cardStyle.marginRight) || 30; 
  track.style.transform = `translateX(-${index * (cardWidth + gap)}px)`;
}

rightBtn.addEventListener('click', () => {
  const visibleCards = getVisibleCards();
  const maxIndex = cards.length - visibleCards;
  if(index < maxIndex){
    index++;
    moveCarousel();
  } else {
    index = 0;
    moveCarousel();
  }
});

leftBtn.addEventListener('click', () => {
  if(index > 0){
    index--;
    moveCarousel();
  } else {
    const visibleCards = getVisibleCards();
    index = cards.length - visibleCards;
    moveCarousel();
  }
});

window.addEventListener('resize', () => {
  moveCarousel();
});
</script>


<script>
const text = document.querySelector('.text-content');
const image = document.querySelector('.image-content');

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach(entry => {
      if(entry.isIntersecting) {
        text.classList.add('visible');
        image.classList.add('visible');
      }
    });
  }, { threshold: 0.3 }
);

observer.observe(text);
observer.observe(image);
</script>

<script>
  function autoScrollRow(rowId, speed = 2, pause = 1500) {
  const row = document.getElementById(rowId);
  const imgs = row.querySelectorAll("img");
  let currentIndex = 0;

  function scrollNext() {
    const target = imgs[currentIndex];
    row.scrollTo({
      left: target.offsetLeft,
      behavior: "smooth"
    });
    currentIndex++;
    if (currentIndex >= imgs.length / 2) currentIndex = 0; 
    setTimeout(scrollNext, pause + 500); 
  }

  scrollNext();
}

autoScrollRow("row1", 2, 1500);
autoScrollRow("row2", 2, 1500);

  </script>
<script>
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
  item.addEventListener('click', () => {
    item.classList.toggle('active');
  });
});

</script>

<script>
const industryCards = document.querySelectorAll('.industry-card');

const cardObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active'); 
      cardObserver.unobserve(entry.target); 
    }
  });
}, { threshold: 0.3 });

industryCards.forEach((card, index) => {
  if (index % 2 === 0) {
    card.style.transform = 'translateX(-100px)'; 
  } else {
    card.style.transform = 'translateX(100px)'; 
  }
  card.style.opacity = '0';
  card.style.transition = 'all 0.8s ease-out';

  cardObserver.observe(card);
});

industryCards.forEach(card => {
  card.addEventListener('transitionend', () => {
    if (card.classList.contains('active')) {
      card.style.transform = 'translateX(0)';
      card.style.opacity = '1';
    }
  });
});

</script>

<script>
const slidesLeft = document.querySelectorAll('.slide-left');
const slidesRight = document.querySelectorAll('.slide-right');

const sectionObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.classList.add('active');
    }
  });
}, { threshold: 0.3 });

slidesLeft.forEach(el => sectionObserver.observe(el));
slidesRight.forEach(el => sectionObserver.observe(el));

  </script>