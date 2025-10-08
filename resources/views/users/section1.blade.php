<header>
  <div class="top-bar">
    <div class="contact-info">
      <a href="tel:02031372799"><i class="fa-solid fa-phone"></i>020 3137 2799</a>
      <a href="mailto:info@cabcallexperts.com"><i class="fa-solid fa-envelope"></i>info@cabcallexperts.com</a>
    </div>
    <div class="social-icons">
      <a href="https://www.facebook.com/CabCallExperts/" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://www.linkedin.com/company/cabcall-experts/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
      <a href="https://www.instagram.com/cabcallexperts/?hl=en" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.youtube.com/@RayBasit-s9x/videos" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
  </div>

  <div class="main-header">
    <div class="logo logo-animated">
      <a href="/"><img src="./index_files/cce-logo3.png" alt="Cab Call Experts Logo"></a>
    </div>

    <input type="checkbox" id="menu-toggle" hidden>
    <label for="menu-toggle" class="menu-toggle-label">
      <i class="fa-solid fa-bars"></i>
    </label>

    <nav id="nav-menu">
      <ul>
        <li><a href="/" onclick="loadhomepage(); return false;">Home</a></li>
        <li><a href="/about-us" onclick="loadaboutpage(); return false;">About Us</a></li>

        <li class="dropdown">
          <input type="checkbox" id="services-toggle" hidden>
          <label for="services-toggle" class="dropdown-toggle">
            Services <i class="fa-solid fa-caret-down"></i>
          </label>
          <ul class="dropdown-menu">
            <li><a href="#">Call Answering Services</a></li>
            <li><a href="#">Taxi Dispatch Services</a></li>
            <li><a href="#">QA Management</a></li>
            <li><a href="#">Digital Marketing</a></li>
            <li><a href="#">NEMT Call Center</a></li>
            <li><a href="#">Accounting Services</a></li>
          </ul>
        </li>

        <li><a href="/careers" onclick="loadcareerspage(); return false;">Careers</a></li>
        <li><a href="/blogs" onclick="loadblogspage(); return false;">Blogs</a></li>
        <li><a href="/contact-us" onclick="loadcontactuspage(); return false;">Contact Us</a></li>
        <li><a href="/login" onclick="loadloginpage(); return false;">Login</a></li>
      </ul>
    </nav>
  </div>
</header>

<style>

header {
  font-family: Arial, sans-serif;
  width: 100%;
}
.top-bar {
  background: #111;
  color: white;
  display: flex;
  justify-content: space-between;
  padding: 5px 15px;
  font-size: 14px;
}
.top-bar a {
  color: white;
  text-decoration: none;
  margin-right: 10px;
}
.social-icons a {
  margin-left: 10px;
}
.main-header {
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px;
  position: relative;
  border-bottom: 1px solid #ddd;
}
.logo img {
  height: 50px;
}
nav ul {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}
nav ul li {
  position: relative;
}
nav ul li a {
  text-decoration: none;
  color: #000;
  padding: 10px 15px;
  display: block;
}
nav ul li a:hover {
  color: #007bff;
}


.dropdown-menu {
  display: none;
  position: absolute;
  background: #fff;
  top: 100%;
  left: 0;
  min-width: 180px;
  border: 1px solid #ddd;
  z-index: 1000;
}
.dropdown-menu li a {
  padding: 10px;
  color: #000;
}
.dropdown-menu li a:hover {
  background: #f5f5f5;
  color: #007bff;
}

@media (hover: hover) and (pointer: fine) {
  .dropdown:hover .dropdown-menu {
    display: block;
  }
}


.menu-toggle-label {
  display: none;
  font-size: 22px;
  cursor: pointer;
}
#menu-toggle:checked ~ nav {
  display: block;
}


@media (max-width: 768px) {
  .menu-toggle-label {
    display: block;
  }

  nav {
    display: none;
    width: 100%;
    background: #fff;
    border-top: 1px solid #eee;
  }

  nav ul {
    flex-direction: column;
  }

  nav ul li {
    border-bottom: 1px solid #eee;
  }

  .dropdown-toggle {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
    padding: 10px 15px;
  }

  .dropdown input[type="checkbox"]:checked ~ .dropdown-menu {
    display: block;
  }

  .dropdown-menu {
    position: static;
    border: none;
    background: #f9f9f9;
  }

  .dropdown-menu li a {
    padding: 10px 20px;
  }
}
</style>
