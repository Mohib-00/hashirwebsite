<script>
  function initScripts() {


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


const sections = document.querySelectorAll('.support-section');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active');
    } else {
      entry.target.classList.remove('active');
    }
  });
}, { threshold: 0.2 }); 

sections.forEach(section => observer.observe(section));


 
</script>
