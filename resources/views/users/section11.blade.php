



<section class="qa-wrapper">
  <div class="qa-content">
    <h2 class="qa-main-heading">{{$settingssssss->section11_heading}}</h2>

    <div class="qa-section">
      @foreach($sections10s as $sections10)
        <div class="qa-card" style="background:#093945">
          <input type="checkbox" id="qa-q{{ $loop->index }}">
          <label for="qa-q{{ $loop->index }}" class="qa-question">
            <h3>{{ $sections10->heading }}</h3>
            <span class="qa-toggle"></span>
          </label>
          <div class="qa-answer">
            <p>{{ $sections10->paragraph }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
