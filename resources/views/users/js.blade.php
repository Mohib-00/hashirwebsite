<script>
  function initScripts() {


   let slides = document.querySelectorAll('.banner img');
let contents = document.querySelectorAll('.banner-content');
let current = 0;

if (slides.length > 0) {
  function showNextSlide() {
    slides[current].classList.remove('active');
    contents[current].classList.remove('active');
    
    current = (current + 1) % slides.length;

    slides[current].classList.add('active');
    contents[current].classList.add('active');
  }
  setInterval(showNextSlide, 4000);
}

    const track = document.querySelector('.services-carousel .carousel-track');
    const cards = document.querySelectorAll('.services-carousel .service-card');
    const leftBtn = document.querySelector('.services-carousel .carousel-btn.left');
    const rightBtn = document.querySelector('.services-carousel .carousel-btn.right');
    let index = 0;

    if (track && cards.length > 0 && leftBtn && rightBtn) {
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
        if (index < maxIndex) index++;
        else index = 0;
        moveCarousel();
      });

      leftBtn.addEventListener('click', () => {
        if (index > 0) index--;
        else {
          const visibleCards = getVisibleCards();
          index = cards.length - visibleCards;
        }
        moveCarousel();
      });

      window.addEventListener('resize', moveCarousel);
    }

    const text = document.querySelector('.text-content');
    const image = document.querySelector('.image-content');
    if (text && image) {
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            text.classList.add('visible');
            image.classList.add('visible');
          }
        });
      }, { threshold: 0.3 });
      observer.observe(text);
      observer.observe(image);
    }

    function autoScrollRow(rowId, speed = 2, pause = 1500) {
      const row = document.getElementById(rowId);
      if (!row) return;
      const imgs = row.querySelectorAll("img");
      if (imgs.length === 0) return;
      let currentIndex = 0;
      function scrollNext() {
        const target = imgs[currentIndex];
        row.scrollTo({ left: target.offsetLeft, behavior: "smooth" });
        currentIndex++;
        if (currentIndex >= imgs.length / 2) currentIndex = 0;
        setTimeout(scrollNext, pause + 500);
      }
      scrollNext();
    }

    autoScrollRow("row1", 2, 1500);
    autoScrollRow("row2", 2, 1500);

    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      item.addEventListener('click', () => {
        item.classList.toggle('active');
      });
    });

    const slidesLeft = document.querySelectorAll('.slide-left');
    const slidesRight = document.querySelectorAll('.slide-right');
    const sectionObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('active');
      });
    }, { threshold: 0.3 });

    slidesLeft.forEach(el => sectionObserver.observe(el));
    slidesRight.forEach(el => sectionObserver.observe(el));
  }

  document.addEventListener('DOMContentLoaded', initScripts);


  // Intersection Observer animation trigger
const sections = document.querySelectorAll('.support-section');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active');
    } else {
      entry.target.classList.remove('active'); // remove for reanimation on scroll up/down
    }
  });
}, { threshold: 0.2 }); // trigger when 20% visible

sections.forEach(section => observer.observe(section));

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
