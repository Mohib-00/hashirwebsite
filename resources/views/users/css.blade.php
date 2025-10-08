<style>
    :root {
      --primary-color: #ffcc00;
      --dark-color: #000;
      --text-color: #222;
      --font-primary: "Poppins", sans-serif;
      --font-secondary: "Open Sans", sans-serif;
    }

    body {
      margin: 0;
      font-family: var(--font-primary);
      background-color: #fff;
      color: var(--text-color);
    }

    header {
      width: 100%;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      position: relative;
      z-index: 9999;
    }

    .top-bar {
      background: var(--dark-color);
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 80px;
      flex-wrap: wrap;
      font-size: 14px;
      letter-spacing: 0.3px;
    }

    .contact-info a {
      color: #fff;
      margin-right: 25px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      transition: all 0.3s ease;
      font-family: var(--font-secondary);
    }

    .contact-info a i {
      margin-right: 8px;
      color: var(--primary-color);
      font-size: 15px;
    }

    .contact-info a:hover {
      color: var(--primary-color);
    }

    .social-icons a {
      color: #fff;
      margin-left: 15px;
      font-size: 15px;
      transition: all 0.3s ease;
    }

    .social-icons a:hover {
      color: var(--primary-color);
      transform: scale(1.1);
    }

    .main-header {
      background: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 18px 80px;
      flex-wrap: wrap;
    }

    .logo img {
      height: 75px;
      transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
    }

    .logo img:hover {
      transform: scale(1.03);
    }

    nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
      align-items: center;
    }

    nav ul li {
      position: relative;
      margin-left: 35px;
    }

    nav ul li a {
      text-decoration: none;
      color: var(--text-color);
      font-weight: 500;
      font-size: 16px;
      letter-spacing: 0.4px;
      text-transform: capitalize;
      transition: all 0.3s ease;
      font-family: var(--font-secondary);
    }

    nav ul li a:hover {
      color: var(--primary-color);
    }

    nav ul li ul {
      display: none;
      position: absolute;
      background: #fff;
      list-style: none;
      padding: 10px 0;
      margin: 0;
      top: 40px;
      left: 0;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      border-radius: 6px;
      min-width: 220px;
      z-index: 999;
      transition: all 0.3s ease;
    }

    nav ul li ul li a {
      display: block;
      padding: 12px 20px;
      color: var(--text-color);
      font-size: 15px;
      transition: all 0.3s ease;
    }

    nav ul li ul li a:hover {
      background: var(--primary-color);
      color: #000;
    }

    nav ul li.show > ul {
      display: block;
    }

    .menu-toggle {
      display: none;
      font-size: 26px;
      cursor: pointer;
      color: var(--dark-color);
    }

    @media (max-width: 991px) {
      .top-bar { padding: 8px 20px; justify-content: center; text-align: center; }
      .main-header { padding: 15px 20px; }

      nav { display: none; width: 100%; background: #fff; }
      nav.active { display: block; animation: slideDown 0.4s ease; }

      nav ul {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px 25px;
      }

      nav ul li { margin: 10px 0; width: 100%; }

      nav ul li ul {
        position: static;
        box-shadow: none;
        background: #f9f9f9;
        margin-top: 10px;
        border-radius: 4px;
        width: 100%;
      }

      .menu-toggle { display: block; }
    }

    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .banner {
      position: relative;
      width: 100%;
      height: 576px; 
      overflow: hidden;
    }

    .banner img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1.5s ease-in-out;
    }

    .banner img.active { opacity: 1; }

    .banner-content {
      position: absolute;
      top: 50%;
      left: 15%;
      transform: translateY(-50%);
      text-align: left;
      color: white;
      width: 80%;
      max-width: 700px;
      z-index: 10;
    }

    .banner-content h1 { font-size: 2.8rem; font-weight: 700; line-height: 1.3; color: #fff; text-shadow: 2px 2px 10px rgba(0,0,0,0.6); }
    .banner-content p { margin-top: 20px; font-size: 1.1rem; color: #f1f1f1; line-height: 1.6; }
    .banner-content a { display: inline-block; margin-top: 25px; padding: 14px 28px; background: #ffcc00; color: #000; text-decoration: none; font-weight: 600; border-radius: 5px; transition: background 0.3s; }
    .banner-content a:hover { background: #fff; }

    @media (max-width: 992px) { .banner { height: 585px; } .banner-content h1 { font-size: 2rem; } }
    @media (max-width: 768px) { .banner { height: 585px; } .banner-content { left: 50%; transform: translate(-50%, -50%); text-align: center; } .banner-content h1 { font-size: 1.8rem; } .banner-content p { font-size: 1rem; } }
    @media (max-width: 480px) { .banner { height: 565px; } .banner-content h1 { font-size: 1.4rem; } .banner-content a { padding: 10px 20px; font-size: 0.9rem; } }
    @media (max-width: 352px) { .logo img { height: 55px; width: auto; } }

    .carousel-container {
      width: 90%;
      max-width: 1200px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      padding: 40px 0;
      margin: 60px auto; 
      position: relative;
    }

    .carousel-trackk {
      display: flex;
      align-items: center;
      gap: 40px;
      animation: scroll 25s linear infinite;
      padding: 0 40px;
    }

    .carousel-trackk img {
      height: 100px;
      width: auto;
      border-radius: 5px;
      padding: 10px;
      background: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease-in-out;
      filter: grayscale(100%);
      opacity: 0.8;
    }

    .carousel-trackk img:hover {
      filter: grayscale(0%);
      opacity: 1;
      transform: scale(1.08);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    @keyframes scroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
    @media (max-width: 768px) { .carousel-trackk img { height: 70px; padding: 8px; } }
    @media (max-width: 480px) { .carousel-trackk img { height: 50px; padding: 6px; } }

    @media (min-width: 651px) {
      .carousel-container {
        max-width: 1300px;
        padding: 20px 0;
      }
      .carousel-trackk img {
        height: 100px;
      }
    }

.support-section {
  padding: 80px 20px;
  background: #fdf8f0;
}

.support-section .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1200px;
  margin: 0 auto;
  gap: 50px;
  flex-wrap: wrap;
}

.support-section .text-column {
  flex: 1 1 500px;
  animation: slideInLeft 1s ease forwards;
  opacity: 0;
}

.support-section .text-column h2 {
  font-size: 2.5rem;
  line-height: 1.3;
  margin-bottom: 20px;
  color: #222;
}

.support-section .text-column h2 span {
  color: #ffcc00;
}

.support-section .text-column p {
  font-size: 1.1rem;
  line-height: 1.7;
  margin-bottom: 15px;
  color: #555;
}

.support-section .image-column {
  flex: 1 1 400px;
  text-align: center;
  animation: slideInRight 1s ease forwards;
  opacity: 0;
}

.support-section .image-column img {
  max-width: 100%;
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

@keyframes slideInLeft {
  0% { transform: translateX(-50px); opacity: 0; }
  100% { transform: translateX(0); opacity: 1; }
}

@keyframes slideInRight {
  0% { transform: translateX(50px); opacity: 0; }
  100% { transform: translateX(0); opacity: 1; }
}

@media (max-width: 991px) {
  .support-section .container {
    flex-direction: column-reverse;
    text-align: center;
  }

  .support-section .text-column, 
  .support-section .image-column {
    flex: 1 1 100%;
    animation: none;
    opacity: 1;
  }

  .support-section .text-column h2 {
    font-size: 2rem;
  }
}

.services-section { padding:80px 20px; background:#f8f7f5; text-align:center; font-family:'Poppins', sans-serif;}
.section-title { font-size:3rem; font-weight:700; margin-bottom:60px;}
.section-title span { color:#ffcc00;}
.services-carousel { position:relative; overflow:hidden; max-width:1200px; margin:0 auto; }
.carousel-track { display:flex; gap:30px; transition:transform 0.5s ease; }
.service-card { background:#fff; border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.1); padding:25px; flex:0 0 25%; text-align:center; transition: transform 0.3s, box-shadow 0.3s; }
.service-card:hover { transform:translateY(-10px); box-shadow:0 12px 30px rgba(0,0,0,0.15); }
.service-card img { max-width:80px; margin-bottom:20px; }
.service-card h3 { font-size:1.5rem; margin-bottom:15px; font-weight:600; }
.service-card p { font-size:1rem; color:#555; margin-bottom:20px; }
.read-more-btn { display:inline-block; padding:10px 25px; background:#000; color:#ffffff; font-weight:600; border-radius:25px; text-decoration:none; transition:background 0.3s, transform 0.3s; }
.read-more-btn:hover { background:#000; color:#ffcc00; transform:scale(1.05); }
.carousel-btn { position:absolute; top:50%; transform:translateY(-50%); background:#ffcc00; border:none; border-radius:50%; width:45px; height:45px; cursor:pointer; font-size:1.2rem; color:#000; transition:transform 0.3s, background 0.3s; z-index:10; }
.carousel-btn:hover { transform:scale(1.2); background:#000; color:#ffcc00; }
.carousel-btn.left { left:1px; } .carousel-btn.right { right:1px; }
@media(max-width:992px){.service-card{flex:0 0 45%;}} 
@media(max-width:768px){.service-card{flex:0 0 80%;}}


.industries-section {
  padding: 60px 20px;
  background-color: #152C45;
  background-image: url('your-background-image.png'); 
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
  font-family: 'Arial', sans-serif;
}

.industries-section::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(21, 44, 69, 0.85); 
  z-index: 1;
}

.industries-section .container {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 2;
}

.section-header h2 {
  font-size: 32px;
  text-align: center;
  color: #fff;
  margin-bottom: 50px;
}

.industries-section {
  background-color: #3D5062;
  background-image: url('your-background-image.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  padding: 60px 0;
}

.industries-section .section-header h2 {
  text-align: center;
  color: #fff;
  margin-bottom: 40px;
  font-size: 2.5rem;
}

.industries-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; 
  gap: 20px;
}

.industry-card {
  background: rgba(255, 255, 255, 0.05); 
  border-radius: 15px;
  padding: 30px 20px;
  width: 23%; 
  text-align: center; 
  color: #fff;
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.industry-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.4);
}

.icon-wrapper {
  margin: 0 auto 20px; 
  width: 108px;
  height: 108px;
}

.industry-card h3 {
  margin: 0 0 10px 0;
  font-size: 1.2rem;
}

.industry-card p {
  font-size: 0.95rem;
  line-height: 1.4;
}

@media (max-width: 1100px) {
  .industries-grid {
    justify-content: space-around;
  }
}

@media (max-width: 900px) {
  .industry-card {
    width: 45%;
  }
}

@media (max-width: 600px) {
  .industry-card {
    width: 100%;
  }
}


.animated-section {
  background-color: #ffffff;
  padding: 80px 0;
  overflow: hidden;
  color: #fff;
}

.animated-section .container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
}

.content-wrapper {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 40px;
  flex-wrap: wrap;
}

.text-content {
  flex: 1 1 500px;
  opacity: 0;
  transform: translateX(-50px);
  transition: all 1s ease-out;
  color:black
}

.text-content h2 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.text-content h2 span {
  color: #0C65AE;
}

.text-content p, .text-content ul {
  font-size: 1rem;
  line-height: 1.6;
}

.text-content ul li {
  margin-bottom: 10px;
}

.image-content {
  flex: 1 1 400px;
  opacity: 0;
  transform: translateX(50px);
  transition: all 1s ease-out;
}

.image-content img {
  width: 100%;
  border-radius: 15px;
}

.visible {
  opacity: 1 !important;
  transform: translateX(0) !important;
}



.why-section {
  background-color: #152C45;
  background-image: url('background-pattern.png'); 
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  padding: 80px 20px;
  color: #fff;
  overflow-x: hidden; /* prevent horizontal scrollbar */
}

.why-container {
  max-width: 1200px;
  margin: 0 auto;
}

.why-header {
  text-align: center;
  margin-bottom: 60px;
}

.why-header h2 {
  font-size: 2.8rem;
  font-weight: 700;
  color: #fff;
}

.why-header h2 span {
  color: #0C65AE;
}

.why-header p {
  font-size: 1.1rem;
  margin-top: 15px;
  color: #d0d0d0;
}

.why-grid {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 30px;
}

.why-card {
  background-color: rgba(255,255,255,0.05);
  padding: 20px;
  border-radius: 15px;
  flex: 1 1 min(250px, 100%); 
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
  opacity: 0;
  transform: translateY(50px);
  animation: fadeInUp 0.8s forwards;
}

.why-card:nth-child(1) { animation-delay: 0.2s; }
.why-card:nth-child(2) { animation-delay: 0.4s; }
.why-card:nth-child(3) { animation-delay: 0.6s; }
.why-card:nth-child(4) { animation-delay: 0.8s; }

.why-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0,0,0,0.3);
}

.why-img img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 15px;
}

.why-card h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.why-card p {
  font-size: 1rem;
  line-height: 1.6;
  color: #fff;
}

@media (max-width: 320px) {
  .why-card {
    flex: 1 1 100%; 
    padding: 15px;
  }
  
  .why-header h2 {
    font-size: 2rem;
  }

  .why-header p {
    font-size: 1rem;
  }
}


@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 1024px) {
  .why-card {
    flex: 1 1 calc(50% - 20px);
  }
}

@media (max-width: 768px) {
  .why-card {
    flex: 1 1 100%;
  }
}
.customer-reviews {
  padding: 50px 20px;
  background: #f8f8f8;
  text-align: center;
}
.customer-reviews h2 {
  font-size: 2rem;
  margin-bottom: 40px;
}

.reviews-wrapper {
  position: relative;
  max-width: 350px;
  margin: 0 auto;
  overflow: hidden;
}

.reviews-carousel {
  display: flex;
  gap: 20px;
  scroll-snap-type: x mandatory;
  overflow-x: scroll;
  scroll-behavior: smooth;
  padding-bottom: 10px;
  -ms-overflow-style: none;
  scrollbar-width: none;
  
}

.reviews-carousel::-webkit-scrollbar {
  display: none; 
}

.review-card {
  background: #fff;
  border-radius: 10px;
  padding: 20px;
  min-width: 300px;
  max-width: 350px;
  flex: 0 0 auto;
  scroll-snap-align: start;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.review-rating {
  color: #ffb400;
  font-size: 1.2rem;
  margin-bottom: 10px;
}

.review-text {
  font-size: 0.95rem;
  color: #333;
  margin-bottom: 15px;
}

.reviewer-info {
  display: flex;
  align-items: center;
  gap: 10px;
  text-align: left;
}

.reviewer-info img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.reviewer-info h4 {
  margin: 0;
  font-size: 1rem;
}

.reviewer-info p {
  margin: 0;
  font-size: 0.85rem;
  color: #666;
}

.carousel-dots {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-top: 20px;
}

.carousel-dots button {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: none;
  background: #ccc;
  cursor: pointer;
  transition: background 0.3s;
}

.carousel-dots button.active {
  background: #ffb400;
}


.trusted-partners {
  padding: 50px 20px;
  text-align: center;
  background: #f8f8f8;
}

.trusted-partners h2 {
  font-size: 2rem;
  margin-bottom: 40px;
}

.partners-row {
  display: flex;
  gap: 30px;
  overflow: hidden;
  margin-bottom: 30px;
}

.partners-row img {
  width: 120px;
  height: auto;
  object-fit: contain;
  flex-shrink: 0;
  transition: transform 0.3s;
}


.faqs {
  padding: 50px 20px;
  background: #f8f8f8;
  text-align: center;
}

.faqs h2 {
  font-size: 2rem;
  margin-bottom: 40px;
}

.faq-row {
  display: flex;
  gap: 20px;
  justify-content: center;
  margin-bottom: 20px;
  flex-wrap: wrap;
}

.faq-item {
  background: #fff;
  border-radius: 10px;
  padding: 20px;
  width: 45%;
  text-align: left;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  cursor: pointer;
}

.faq-question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-weight: bold;
  font-size: 1rem;
}

.faq-toggle {
  font-size: 1.5rem;
  transition: transform 0.3s;
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.5s ease, padding 0.5s ease;
  font-size: 0.95rem;
  color: #333;
  padding-top: 0;
}

.faq-item.active .faq-answer {
  max-height: 200px; 
  padding-top: 15px;
}

.faq-item.active .faq-toggle {
  transform: rotate(45deg);
}

@media (max-width: 1055px) {
  .faqs {
    width: auto%;
    padding: 20px 10px;
    margin: 0; 
  }

  .faq-row {
    flex-direction: column;
    gap: 15px;
  }

  .faq-item {
    width: auto; 
  }
}


.footer {
  background:#152C45; 
  color: #fff;
  font-family: Arial, sans-serif;
  padding: 50px 20px 20px;
}

.footer a {
  color: #fff;
  text-decoration: none;
}

.footer-top {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 40px;
  margin-bottom: 30px;
}

.footer-logo-desc {
  flex: 1 1 300px;
}

.footer-logo {
  max-width: 180px;
  margin-bottom: 15px;
}

.footer-logo-desc p {
  line-height: 1.6;
}

.footer-links, .footer-contact {
  flex: 1 1 200px;
}

.footer-links h3,
.footer-contact h3 {
  font-size: 1.2rem;
  margin-bottom: 15px;
  border-bottom: 2px solid #fff;
  display: inline-block;
  padding-bottom: 5px;
}

.footer-links ul,
.footer-contact ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links ul li,
.footer-contact ul li {
  margin-bottom: 10px;
}

.footer-contact ul li a {
  display: inline-block;
  line-height: 1.5;
}

.footer-bottom {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  border-top: 1px solid rgba(255,255,255,0.3);
  padding-top: 15px;
  font-size: 0.9rem;
  align-items: center;
}

.footer-social a {
  margin-left: 15px;
}

@media (max-width: 900px) {
  .footer-top {
    flex-direction: column;
    gap: 20px;
  }

  .footer-bottom {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }

  .footer-social a {
    margin-left: 0;
    margin-right: 15px;
  }
}



.slide-left {
  opacity: 0;
  transform: translateX(-100px);
  transition: all 1s ease-out;
}

.slide-right {
  opacity: 0;
  transform: translateX(100px);
  transition: all 1s ease-out;
}

.slide-left.active,
.slide-right.active {
  opacity: 1;
  transform: translateX(0);
}
.industry-card.active {
  opacity: 1 !important;
  transform: translateX(0) !important;
}


.why-card.active {
  opacity: 1 !important;
  transform: translateX(0) !important;
}

.logo-animated {
    width: 180px; 
    height: auto;
    display: inline-block;
    animation: flyInSpin 3.5s ease-out, floatPulse 5s ease-in-out 3.5s infinite;
    transform-style: preserve-3d;
    perspective: 1500px;
    filter: drop-shadow(0 8px 12px rgba(0, 0, 0, 0.4));
}

@keyframes flyInSpin {
    0% {
        transform: translateZ(-1200px) rotateY(1080deg) scale(0.1);
        opacity: 0;
        filter: brightness(0.3) blur(4px);
    }
    30% {
        transform: translateZ(-600px) rotateY(720deg) scale(0.5);
        opacity: 0.5;
        filter: brightness(0.7) blur(2px);
    }
    60% {
        transform: translateZ(-150px) rotateY(360deg) scale(1.1);
        opacity: 1;
        filter: brightness(1);
    }
    100% {
        transform: translateZ(0) rotateY(0deg) scale(1);
        opacity: 1;
        filter: brightness(1);
    }
}

@keyframes floatPulse {
    0% {
        transform: translateY(0) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.05);
    }
    100% {
        transform: translateY(0) scale(1);
    }
}


@media (max-width: 280px) {
  .dropdown-menu {
    margin-left: -50px; 
  }
}


@media (min-width: 990.4px) {
  nav ul li a {
    margin-left: -19%;
  }
}


.vision-section {
  padding: 80px 5%;
  background: #f8f9fb;
  display: flex;
  justify-content: center;
  align-items: center;
}

.vision-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  max-width: 1200px;
  gap: 50px;
}

.vision-text {
  flex: 1 1 500px;
}

.vision-title {
  font-size: 2.8rem;
  font-weight: 700;
  color: #111;
  margin-bottom: 20px;
  line-height: 1.2;
}

.vision-title span {
  color: #1c9d5a; /* accent color */
}

.vision-description {
  font-size: 1.1rem;
  color: #444;
  line-height: 1.7;
  max-width: 600px;
}

.vision-image {
  flex: 1 1 400px;
  text-align: center;
}

.vision-image img {
  width: 100%;
  max-width: 450px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.4s ease;
}

.vision-image img:hover {
  transform: scale(1.05);
}

/* Fade In Animations */
@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fadeInRight {
  from {
    opacity: 0;
    transform: translateX(50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.fadeInLeft {
  animation: fadeInLeft 1s ease both;
}

.fadeInRight {
  animation: fadeInRight 1s ease both;
}

@media (max-width: 768px) {
  .vision-container {
    flex-direction: column-reverse;
    text-align: center;
  }

  .vision-title {
    font-size: 2.2rem;
  }

  .vision-description {
    font-size: 1rem;
  }

  .vision-image img {
    max-width: 350px;
  }
}


.core-values-section {
  padding: 80px 5%;
  background: linear-gradient(135deg, #f8f9fb 0%, #ffffff 100%);
  text-align: center;
  overflow: hidden;
}

/* HEADER */
.core-values-header {
  margin-bottom: 50px;
}

.core-values-title {
  font-size: 2.8rem;
  font-weight: 700;
  color: #111;
  margin-bottom: 15px;
  line-height: 1.2;
}

.core-values-title span {
  color: #1c9d5a; /* accent color */
}

.core-values-subtitle {
  font-size: 1.1rem;
  color: #555;
  max-width: 650px;
  margin: 0 auto;
  line-height: 1.6;
}

/* GRID */
.core-values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  justify-items: center;
}

/* VALUE CARD */
.value-card {
  background: #fff;
  border-radius: 15px;
  padding: 40px 25px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  max-width: 320px;
}

.value-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

.value-card .icon {
  font-size: 2.5rem;
  margin-bottom: 15px;
}

.value-card h3 {
  font-size: 1.4rem;
  font-weight: 600;
  color: #111;
  margin-bottom: 10px;
}

.value-card p {
  font-size: 1rem;
  color: #555;
  line-height: 1.6;
}

/* ANIMATIONS */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.fadeInUp {
  animation: fadeInUp 1s ease both;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .core-values-title {
    font-size: 2.2rem;
  }
  .core-values-subtitle {
    font-size: 1rem;
  }
  .value-card {
    padding: 30px 20px;
  }
}

</style>