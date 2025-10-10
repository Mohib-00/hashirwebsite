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
      overflow-x: hidden;
    }

header {
  width: 100%;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  position: relative;
  z-index: 9999;
}

.top-bar {
  background: #111;
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
}

.contact-info a i {
  margin-right: 8px;
  color: #ffcc00;
  font-size: 15px;
}

.contact-info a:hover {
  color: #ffcc00;
}

.social-icons a {
  color: #fff;
  margin-left: 15px;
  font-size: 15px;
  transition: all 0.3s ease;
}

.social-icons a:hover {
  color: #ffcc00;
  transform: scale(1.1);
}

.main-header {
  background: #fff;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0px 20px;
  flex-wrap: wrap;
  position: relative;
  border-bottom: 1px solid #eee;
}

.logo img {
  height: 120px;
  transition: transform 0.3s ease;
}

.logo img:hover {
  transform: scale(1.05);
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
  color: #000;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 0.4px;
  text-transform: capitalize;
  transition: all 0.3s ease;
}

nav ul li a:hover {
  color: #007bff;
}

.dropdown-menu {
  display: none;
  position: absolute;
  background: #fff;
  list-style: none;
  padding: 10px 0;
  margin: 0;
  top: 100%;
  left: 0;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  min-width: 220px;
  z-index: 999;
  transition: all 0.3s ease;
}

.dropdown:hover > .dropdown-menu,
.dropdown-menu:hover {
  display: block;
}

.dropdown-menu li a {
  display: block;
  padding: 12px 20px;
  color: #000;
  font-size: 15px;
  transition: all 0.3s ease;
}

.dropdown-menu li a:hover {
  background: #007bff;
  color: #fff;
}

.menu-toggle-label {
  display: none;
  font-size: 26px;
  cursor: pointer;
  color: #111;
}

#menu-toggle:checked ~ nav {
  display: block;
}

@media (max-width: 991px) {
  .top-bar {
    padding: 8px 20px;
    justify-content: center;
    text-align: center;
  }

  .main-header {
    padding: 0px 20px;
  }

  nav {
    display: none;
    width: 100%;
    background: #fff;
    border-top: 1px solid #eee;
    animation: slideDown 0.4s ease;
  }

  nav ul {
    flex-direction: column;
    align-items: flex-start;
    padding: 10px 25px;
  }

  nav ul li {
    margin: 10px 0;
    width: 100%;
  }

  nav ul li ul.dropdown-menu {
    position: static;
    box-shadow: none;
    background: #f9f9f9;
    margin-top: 10px;
    border-radius: 4px;
    width: 100%;
  }

  .menu-toggle-label {
    display: block;
  }

  .dropdown-toggle {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 10px 15px;
    width: 100%;
  }

  .dropdown input[type="checkbox"]:checked ~ .dropdown-menu {
    display: block;
  }

  .dropdown-menu li a {
    padding: 10px 20px;
  }
}

@media (max-width: 350px) {
  .main-header {
    padding: 5px;
  }

  .logo img {
    height: 55px;
  }

  nav ul li a {
    font-size: 14px;
    padding: 8px 10px;
  }

  .top-bar {
    padding: 6px 10px;
    flex-direction: column;
    gap: 4px;
  }
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-15px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
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

   

.banner img.active {
  opacity: 1;
}

.banner-content {
  position: absolute;
  top: 50%;
  left: 10%;
  transform: translateY(-50%);
  color: white;
  max-width: 600px;
  opacity: 0;
  transition: opacity 1s ease-in-out;
}

.banner-content.active {
  opacity: 1;
}


.banner-content h1,
.banner-content p {
  opacity: 0;
  transform: translateY(40px);
  transition: all 1s ease-in-out;
}

.banner-content.active h1,
.banner-content.active p {
  opacity: 1;
  transform: translateY(0);
}

.banner-content.active h1 {
  transition-delay: 0.2s;
}

.banner-content.active p {
  transition-delay: 0.4s;
}




.slide-left {
  animation: slideLeft 1s ease forwards;
}
.slide-right {
  animation: slideRight 1s ease forwards;
}

@keyframes slideLeft {
  from { transform: translateX(-100px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}
@keyframes slideRight {
  from { transform: translateX(100px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}
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
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 80px 0;
  background: #f9fafb;
  overflow: hidden;
}

.support-section .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 85%;
  flex-wrap: wrap;
}

.support-section.reverse .container {
  flex-direction: row-reverse;
}


.text-column,
.image-column {
  flex: 1;
  min-width: 300px;
  opacity: 0;
  transition: transform 1s ease-out, opacity 1s ease-out;
}


.text-column { transform: translateX(-120px); padding: 20px 40px; }
.image-column { transform: translateX(120px); text-align: center; }


.support-section.reverse .text-column { transform: translateX(120px); }
.support-section.reverse .image-column { transform: translateX(-120px); }


.support-section.active .text-column,
.support-section.active .image-column {
  transform: translateX(0);
  opacity: 1;
}


.text-column h2 {
  font-size: 2.6rem;
  font-weight: 800;
  color: #1e1e1e;
  margin-bottom: 20px;
  line-height: 1.3;
}

.text-column h2 span {
  background: linear-gradient(90deg, #007bff, #00c3ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: 900;
}

.text-column p {
  font-size: 1.15rem;
  color: #444;
  line-height: 1.7;
  margin-bottom: 15px;
}


.image-column img {
  width: 100%;
  max-width: 450px;
  border-radius: 15px;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.image-column img:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}


@media (max-width: 768px) {
  .support-section .container,
  .support-section.reverse .container {
    flex-direction: column;
    text-align: center;
  }

  .text-column,
  .image-column {
    transform: translateY(60px);
  }

  .support-section.active .text-column,
  .support-section.active .image-column {
    transform: translateY(0);
    opacity: 1;
  }

  .image-column img {
    max-width: 80%;
    margin-bottom: 25px;
  }
}

@media (max-width: 350px) {
  .support-section {
    padding: 50px 0;
    margin-left:-15px
  }

  .text-column {
    padding: 0 10px;
    text-align: left;
    transform: translateX(-10px);
  }

  .text-column h2 {
    font-size: 1.4rem;
    line-height: 1.2;
  }

  .text-column p {
    font-size: 0.9rem;
    line-height: 1.5;
  }

  .image-column img {
    max-width: 70%;
    transform: translateX(-10px);
  }
}

.services-section {
  padding: 80px 20px;
  background: #f8f7f5;
  text-align: center;
  font-family: 'Poppins', sans-serif;
  overflow-x: hidden;
}

.section-title {
  font-size: 3rem;
  font-weight: 700;
  margin-bottom: 60px;
}

.section-title span {
  color: #ffcc00;
}


.services-carousel {
  position: relative;
  overflow: hidden;
  max-width: 1200px;
  margin: 0 auto;
}

.carousel-track {
  display: flex;
  gap: 30px;
  transition: transform 0.5s ease;
}


.service-card {
  background: #fff;
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
  padding: 25px;
  flex: 0 0 25%;
  text-align: center;
  transition: transform 0.3s, box-shadow 0.3s;
  opacity: 0;
  transform: translateY(80px);
}


.service-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}


.service-card img {
  max-width: 80px;
  margin-bottom: 20px;
}


.service-card h3 {
  font-size: 1.5rem;
  margin-bottom: 15px;
  font-weight: 600;
}

.service-card p {
  font-size: 1rem;
  color: #555;
  margin-bottom: 20px;
}


.read-more-btn {
  display: inline-block;
  padding: 10px 25px;
  background: #000;
  color: #ffffff;
  font-weight: 600;
  border-radius: 25px;
  text-decoration: none;
  transition: background 0.3s, transform 0.3s, color 0.3s;
}

.read-more-btn:hover {
  background: #000;
  color: #ffcc00;
  transform: scale(1.05);
}


.carousel-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: #ffcc00;
  border: none;
  border-radius: 50%;
  width: 45px;
  height: 45px;
  cursor: pointer;
  font-size: 1.2rem;
  color: #000;
  transition: transform 0.3s, background 0.3s, color 0.3s;
  z-index: 10;
}

.carousel-btn:hover {
  transform: scale(1.2);
  background: #000;
  color: #ffcc00;
}

.carousel-btn.left {
  left: 1px;
}
.carousel-btn.right {
  right: 1px;
}

.service-card.show {
  opacity: 1;
  transform: translateY(0);
  transition: all 0.8s ease-out;
}

.service-card:nth-child(odd).show {
  animation: slideInLeft 0.8s ease-out;
}
.service-card:nth-child(even).show {
  animation: slideInRight 0.8s ease-out;
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-60px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(60px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}


@media (max-width: 992px) {
  .service-card {
    flex: 0 0 45%;
  }
}

@media (max-width: 768px) {
  .carousel-track {
    flex-direction: column;
    align-items: center;
  }

  .service-card {
    flex: 0 0 80%;
    width: 90%;
    margin-bottom: 30px;
  }

  .carousel-btn {
    display: none;
  }
}

@media (max-width: 350px) {
  .section-title {
    font-size: 2rem;
  }
  .service-card {
    padding: 20px;
  }
}


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

.industry-card {
  opacity: 0;
  transform: translateY(60px);
  transition: all 1s ease-out;
}

.industry-card.show {
  opacity: 1;
  transform: translateY(0);
}

.industry-card:nth-child(1) { transition-delay: 0.1s; }
.industry-card:nth-child(2) { transition-delay: 0.2s; }
.industry-card:nth-child(3) { transition-delay: 0.3s; }
.industry-card:nth-child(4) { transition-delay: 0.4s; }
.industry-card:nth-child(5) { transition-delay: 0.5s; }
.industry-card:nth-child(6) { transition-delay: 0.6s; }


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


@media (max-width: 312px) {
  .text-column {
    font-size: 20px;
    padding: 5px;
    word-wrap: break-word;
    overflow-wrap: break-word;
    white-space: normal;
    max-width: 100%;
    box-sizing: border-box;
    margin-left:-8px
  }

  .text-column h2 {
    font-size: 20px;
    line-height: 1.2;
    word-wrap: break-word;
    overflow-wrap: break-word;
    margin-left:-8px
  }

  .text-column p {
    font-size: 20px;
    line-height: 1.4;
    word-wrap: break-word;
    overflow-wrap: break-word;
    margin-left:-8px
  }
}


.customer-reviews {
  background: #fff;
  padding: 60px 0;
  overflow: hidden;
}

.customer-reviews h2 {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 40px;
}

.reviews-wrapper {
  position: relative;
  max-width: 100%;
  margin: 0 auto;
  overflow: hidden;
}

.reviews-carousel {
  display: flex;
  gap: 20px;
  scroll-snap-type: x mandatory;
  overflow-x: auto;
  scroll-behavior: smooth;
  padding: 10px;
  -ms-overflow-style: none;
  scrollbar-width: none;
}

.reviews-carousel::-webkit-scrollbar {
  display: none;
}

.review-card {
  background: #f9f9f9;
  border-radius: 16px;
  padding: 20px;
  min-width: 280px;
  max-width: 320px;
  flex: 0 0 auto;
  scroll-snap-align: start;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  transform: translateY(30px);
  transition: transform 0.6s ease, opacity 0.6s ease;
}

.review-card.animate-up {
  opacity: 1;
  transform: translateY(0);
  animation: fadeInUp 1s ease;
}

.review-card.animate-left {
  opacity: 1;
  transform: translateX(0);
  animation: fadeInLeft 1s ease;
}

.review-card.animate-right {
  opacity: 1;
  transform: translateX(0);
  animation: fadeInRight 1s ease;
}

.review-rating {
  color: #FFD700;
  font-size: 20px;
  margin-bottom: 10px;
}

.review-text {
  display: block;
  font-style: italic;
  color: #555;
  margin-bottom: 15px;
  font-size: 0.95rem;
}

.reviewer-info {
  display: flex;
  align-items: center;
  gap: 10px;
}

.reviewer-info img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
}

.reviewer-info h4 {
  margin: 0;
  font-size: 1rem;
  color: #222;
}

.reviewer-info p {
  margin: 0;
  font-size: 0.9rem;
  color: #666;
}

@keyframes fadeInUp {
  0% { opacity: 0; transform: translateY(40px); }
  100% { opacity: 1; transform: translateY(0); }
}

@keyframes fadeInLeft {
  0% { opacity: 0; transform: translateX(-40px); }
  100% { opacity: 1; transform: translateX(0); }
}

@keyframes fadeInRight {
  0% { opacity: 0; transform: translateX(40px); }
  100% { opacity: 1; transform: translateX(0); }
}


@media (max-width: 768px) {
  .review-card {
    min-width: 260px;
    max-width: 300px;
    padding: 15px;
  }

  .review-text {
    font-size: 0.9rem;
  }

  .reviewer-info img {
    width: 45px;
    height: 45px;
  }
}

@media (max-width: 354px) {
  .review-card {
    min-width: 90%;
    padding: 12px;
    font-size: 13px;
  }

  .review-rating {
    font-size: 16px;
  }

  .review-text {
    font-size: 12px;
  }

  .reviewer-info img {
    width: 40px;
    height: 40px;
  }

  .reviewer-info h4 {
    font-size: 0.9rem;
  }

  .reviewer-info p {
    font-size: 0.8rem;
  }
}

@media (max-width: 316px) {
  .review-card {
    min-width: 95%;
    padding: 8px;
    font-size: 11px;
  }

  .review-rating {
    font-size: 14px;
    margin-bottom: 6px;
  }

  .review-text {
    font-size: 11px;
    line-height: 1.3;
  }

  .reviewer-info {
    gap: 6px;
  }

  .reviewer-info img {
    width: 30px;
    height: 30px;
  }

  .reviewer-info h4 {
    font-size: 0.85rem;
  }

  .reviewer-info p {
    font-size: 0.75rem;
  }
}


.trusted-partners {
  text-align: center;
  padding: 60px 0;
  background: #fff;
}

.trusted-partners h2 {
  font-size: 2rem;
  margin-bottom: 30px;
}

.partners-row {
  display: flex;
  overflow: hidden; 
  gap: 20px;
  margin-bottom: 30px;
  padding: 10px;
}

.partners-row img {
  width: 100px;
  height: 80px;
  flex-shrink: 0;
  object-fit: contain;
  border-radius: 10px;
  transition: transform 0.3s ease;
}

.partners-row img:hover {
  transform: scale(1.1);
}

@media (max-width: 600px) {
  .partners-row img {
    width: 80px;
  }
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

.faq-item {
  opacity: 0;
  transform: translateY(40px);
  transition: transform 0.7s ease, opacity 0.7s ease;
}

.faq-item.animate-up {
  opacity: 1;
  transform: translateY(0);
}

.faq-item.animate-left {
  opacity: 1;
  transform: translateX(0);
}

.faq-item.animate-right {
  opacity: 1;
  transform: translateX(0);
}

.faq-item.animate-down {
  opacity: 1;
  transform: translateY(0);
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
  color: #1c9d5a; 
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
  color: #1c9d5a; 
}

.core-values-subtitle {
  font-size: 1.1rem;
  color: #555;
  max-width: 650px;
  margin: 0 auto;
  line-height: 1.6;
}


.core-values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 30px;
  justify-items: center;
}


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


.candidates-section {
  padding: 80px 5%;
  background: #f8f9fb;
  display: flex;
  justify-content: center;
  align-items: center;
}

.candidates-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  max-width: 1200px;
  gap: 50px;
}


.candidates-text {
  flex: 1 1 500px;
}

.candidates-title {
  font-size: 2.8rem;
  font-weight: 700;
  color: #111;
  margin-bottom: 20px;
  line-height: 1.2;
}

.candidates-title span {
  color: #1c9d5a; 
}

.candidates-description {
  font-size: 1.1rem;
  color: #444;
  margin-bottom: 25px;
  line-height: 1.7;
  max-width: 600px;
}


.candidates-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.candidates-list li {
  font-size: 1.05rem;
  color: #333;
  margin-bottom: 14px;
  display: flex;
  align-items: center;
  line-height: 1.6;
}

.candidates-list .dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #1c9d5a;
  display: inline-block;
  margin-right: 12px;
  flex-shrink: 0;
}


.candidates-image {
  flex: 1 1 400px;
  text-align: center;
}

.candidates-image img {
  width: 100%;
  max-width: 450px;
  border-radius: 15px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.4s ease;
}

.candidates-image img:hover {
  transform: scale(1.05);
}


@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-60px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes slideInRight {
  from {
    opacity: 0;
    transform: translateX(60px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.slideInLeft {
  animation: slideInLeft 1s ease both;
}

.slideInRight {
  animation: slideInRight 1s ease both;
}

@media (max-width: 768px) {
  .candidates-container {
    flex-direction: column-reverse;
    text-align: center;
  }

  .candidates-title {
    font-size: 2.2rem;
  }

  .candidates-description {
    font-size: 1rem;
  }

  .candidates-list li {
    justify-content: center;
  }

  .candidates-image img {
    max-width: 350px;
  }
}

.apply-btn {
  display: inline-block;
  padding: 12px 28px;
  font-size: 1rem;
  font-weight: 600;
  color: #fff;
  text-decoration: none;
  border-radius: 50px;
  background: linear-gradient(90deg, #0072ff, #00c6ff);
  position: relative;
  overflow: hidden;
  transition: all 0.4s ease;
}

.apply-btn::before {
  content: "";
  position: absolute;
  left: -100%;
  top: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #00c6ff, #0072ff);
  transition: all 0.4s ease;
  z-index: 0;
}

.apply-btn:hover::before {
  left: 0;
}

.apply-btn:hover {
  color: #fff;
  transform: scale(1.05);
  box-shadow: 0 4px 12px rgba(0,114,255,0.3);
}

.blog-section {
  padding: 90px 20px;
  background: #f9fafc;
  font-family: 'Poppins', sans-serif;
  text-align: center;
  overflow: hidden;
}


.blog-header {
  max-width: 750px;
  margin: 0 auto 60px;
  animation: fadeInDown 1s ease-in-out;
}

.blog-header h2 {
  font-size: 2.5rem;
  color: #222;
  margin-bottom: 20px;
  font-weight: 600;
}

.blog-header h2 span {
  color: #0072ff;
}

.blog-header p {
  font-size: 1rem;
  color: #555;
  line-height: 1.7;
}


.blog-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 30px;
  justify-content: center;
}


.blog-card {
  background: #fff;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  animation: fadeInUp 1s ease-in-out;
}

.blog-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 14px 35px rgba(0,0,0,0.12);
}

.blog-image img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: transform 0.6s ease;
}

.blog-card:hover .blog-image img {
  transform: scale(1.08);
}

.blog-content {
  padding: 25px 20px 35px;
}

.blog-content h3 {
  font-size: 1.3rem;
  color: #222;
  margin-bottom: 10px;
  font-weight: 600;
}

.blog-content p {
  color: #555;
  font-size: 0.95rem;
  margin-bottom: 25px;
  line-height: 1.6;
}

 .see-more-btn {
  display: inline-block;
  padding: 10px 26px;
  font-size: 0.95rem;
  color: #fff;
  text-decoration: none;
  border-radius: 50px;
  background: linear-gradient(90deg, #0072ff, #00c6ff);
  transition: all 0.4s ease;
  position: relative;
  overflow: hidden;
}

.see-more-btn::before {
  content: "";
  position: absolute;
  left: -100%;
  top: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, #00c6ff, #0072ff);
  transition: left 0.4s ease;
  z-index: 0;
}

.see-more-btn:hover::before {
  left: 0;
}

.see-more-btn:hover {
  color: #fff;
  transform: scale(1.05);
  box-shadow: 0 5px 15px rgba(0,114,255,0.3);
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 768px) {
  .blog-header h2 {
    font-size: 2rem;
  }

  .blog-content h3 {
    font-size: 1.1rem;
  }

  .blog-content p {
    font-size: 0.9rem;
  }
}

.contact-section {
  background: linear-gradient(135deg, #f8faff 0%, #e9f1ff 100%);
  padding: 100px 20px;
  font-family: 'Poppins', sans-serif;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.contact-wrapper {
  display: flex;
  flex-wrap: wrap;
  gap: 50px;
  align-items: flex-start;
}

.contact-info {
  flex: 1;
  min-width: 320px;
  animation: fadeInLeft 1s ease-in-out;
}

.contact-info h2 {
  font-size: 2.3rem;
  font-weight: 700;
  color: #222;
  margin-bottom: 20px;
}

.contact-info h2 span {
  color: #0072ff;
}

.contact-info p {
  color: #555;
  margin-bottom: 35px;
  line-height: 1.7;
}

.info-box {
  display: flex;
  align-items: center;
  margin-bottom: 25px;
}

.info-box .icon {
  background: #0072ff;
  color: #fff;
  width: 55px;
  height: 55px;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.3rem;
  margin-right: 18px;
  transition: all 0.4s ease;
}

.info-box:hover .icon {
  background: #00c6ff;
  transform: rotate(10deg);
}

.info-box h3 {
  font-size: 1.1rem;
  color: #222;
  margin-bottom: 4px;
}

.info-box p {
  margin: 0;
}

.info-box a {
  text-decoration: none;
  color: #0072ff;
  transition: color 0.3s;
}

.info-box a:hover {
  color: #00c6ff;
}

.contact-form {
  flex: 1;
  min-width: 320px;
  background: #fff;
  border-radius: 20px;
  padding: 40px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  animation: fadeInRight 1s ease-in-out;
}

.contact-form h3 {
  font-size: 1.6rem;
  color: #222;
  margin-bottom: 10px;
}

.contact-form p {
  color: #555;
  margin-bottom: 25px;
}

.form input,
.form textarea {
  width: 100%;
  padding: 14px 18px;
  margin-bottom: 18px;
  border-radius: 10px;
  border: 1px solid #ddd;
  font-size: 0.95rem;
  transition: all 0.3s ease;
  outline: none;
}

.form input:focus,
.form textarea:focus {
  border-color: #0072ff;
  box-shadow: 0 0 6px rgba(0,114,255,0.2);
}

.send-btn {
  display: inline-block;
  width: 100%;
  padding: 14px;
  background: linear-gradient(90deg, #0072ff, #00c6ff);
  color: #fff;
  font-weight: 600;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.send-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 15px rgba(0,114,255,0.3);
}

@media (max-width: 992px) {
  .contact-wrapper {
    flex-direction: column;
  }

  .contact-form {
    padding: 30px;
  }

  .contact-info h2 {
    font-size: 2rem;
  }
}

.luxury {
    
    background: linear-gradient(45deg, 
        #ff6347, 
        #ff1493, 
        #1e90ff, 
        #32cd32, 
        #ffcc00, 
        #8a2be2  
    ); 
    background-size: 300% 300%;
    background-clip: text;
    color: transparent;
    animation: gradient-shift 8s infinite linear;
     
}

@keyframes gradient-shift {
    0% {
        background-position: 0% 0%;
    }
    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0% 0%;
    }
}

</style>