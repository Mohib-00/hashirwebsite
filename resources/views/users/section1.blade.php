<header>
  <div class="top-bar">
    <div class="contact-info">
      <a href="tel:02031372799"><i class="fa-solid fa-phone"></i>{{$settingssssss->number}}</a>
      <a href="mailto:info@cabcallexperts.com"><i class="fa-solid fa-envelope"></i>{{$settingssssss->email}}</a>
    </div>
    <div class="social-icons">
      @if(isset($settingssssss->facebook_link))
      <a href="{{ $settingssssss->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
      @endif
       @if(isset($settingssssss->linkedin_link))
      <a href="{{$settingssssss->linkedin_link}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
      @endif
       @if(isset($settingssssss->instagram_link))
      <a href="{{$settingssssss->instagram_link}}" target="_blank"><i class="fab fa-instagram"></i></a>
      @endif
       @if(isset($settingssssss->youtube_link))
      <a href="{{$settingssssss->youtube_link}}" target="_blank"><i class="fab fa-youtube"></i></a>
      @endif
      @if(isset($settingssssss->twitter_link))
      <a href="{{$settingssssss->twitter_link}}" target="_blank"><i class="fab fa-twitter"></i></a>
      @endif
    </div>
  </div>

  <div class="main-header">
    <div class="logo logo-animated">
      @if(isset($settingssssss->image))
      <a href="/" onclick="loadhomepage(); return false;"><img src="{{ asset('logos/' . $settingssssss->image) }}" alt="Hub Solutions Logo"></a>
      @endif
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
            @foreach($services as $service)
            <li><a href="#" 
           onclick="loadserviceDetails('{{ addslashes($service->heading) }}'); return false;">{{$service->heading}}</a></li>
            @endforeach
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


