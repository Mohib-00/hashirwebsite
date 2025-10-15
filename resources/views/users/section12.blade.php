<footer class="footer">
  <div class="footer-top">
    <div class="footer-logo-desc">
      <img src="{{ asset('logos/' . $settingssssss->image) }}" alt="CabCall Experts Logo" class="footer-logo">
      <p>{{$settingssssss->footer_paragraph}}</p>
    </div>

    <div class="footer-links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="/" onclick="loadhomepage(); return false;">Home</a></li>
        <li><a href="/about-us" onclick="loadaboutpage(); return false;">About Us</a></li>
        <li><a href="/careers" onclick="loadcareerspage(); return false;">Careers</a></li>
        <li><a href="/blogs" onclick="loadblogspage(); return false;">Blogs</a></li>
        <li><a href="/contact-us" onclick="loadcontactuspage(); return false;">Contact Us</a></li>
        <li><a href="/login" onclick="loadloginpage(); return false;">Login</a></li>
      </ul>
    </div>

    <div class="footer-contact">
      <h3>Get in Touch</h3>
      <ul>
        <li><a href="tel:{{$settingssssss->number}}">📞 {{$settingssssss->number}}</a></li>
        <li><a href="mailto:{{$settingssssss->email}}">✉ {{$settingssssss->email}}</a></li>
        <li><a href="#">📍 {{$settingssssss->location}}</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2024 Hub solutions | All Rights Reserved</p>
    <div class="footer-social">
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
</footer>