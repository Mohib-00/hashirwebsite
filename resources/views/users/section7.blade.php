<style>
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

/* 🔹 Default: text left, image right */
.text-content {
  flex: 1 1 500px;
  opacity: 0;
  transform: translateX(-50px);
  transition: all 1s ease-out;
  color: black;
}

.image-content {
  flex: 1 1 400px;
  opacity: 0;
  transform: translateX(50px);
  transition: all 1s ease-out;
}

/* 🔹 Reverse section: image left, text right */
.reverse .content-wrapper {
  flex-direction: row-reverse;
}

/* 🔹 Reverse animation direction */
.reverse .text-content {
  transform: translateX(50px);
}

.reverse .image-content {
  transform: translateX(-50px);
}

.visible {
  opacity: 1 !important;
  transform: translateX(0) !important;
}

.text-content h2 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.text-content h2 span {
  color: #0C65AE;
}

.text-content p,
.text-content ul {
  font-size: 1rem;
  line-height: 1.6;
}

.text-content ul li {
  margin-bottom: 10px;
}

.image-content img {
  width: 100%;
  border-radius: 15px;
}

/* 🔹 RESPONSIVE DESIGN */
@media (max-width: 992px) {
  .text-content h2 {
    font-size: 2rem;
  }
  .text-content p,
  .text-content ul {
    font-size: 0.95rem;
  }
}

@media (max-width: 768px) {
  .content-wrapper {
    flex-direction: column !important;
    text-align: center;
  }

  .text-content,
  .image-content {
    transform: translateX(0);
    opacity: 1;
  }

  .text-content {
    flex: 1 1 100%;
  }

  .image-content {
    flex: 1 1 100%;
  }

  .text-content h2 {
    font-size: 1.8rem;
  }

  .text-content p,
  .text-content ul {
    font-size: 0.9rem;
  }

  .text-content ul {
    padding-left: 0;
    list-style-position: inside;
  }

  .image-content img {
    width: 100%;
    border-radius: 10px;
  }
}

@media (max-width: 480px) {
  .text-content h2 {
    font-size: 1.5rem;
  }

  .text-content p,
  .text-content ul {
    font-size: 0.85rem;
  }

  .animated-section {
    padding: 50px 0;
  }
}
</style>

@php
    $sections = $sections6s->values();
    $filled = fn($v) => isset($v) && trim(strtolower($v)) !== '' && strtolower(trim($v)) !== 'null';
@endphp

@foreach ($sections as $index => $section)
    @php
        $isFull = $filled($section->heading)
                && $filled($section->paragraph)
                && $filled($section->points_headings)
                && $filled($section->image);

        if (!$isFull && !$filled($section->point)) continue;

        $mergedPoints = [];
        if ($filled($section->point)) {
            foreach (explode(',', $section->point) as $p) {
                if ($filled($p)) $mergedPoints[] = trim($p);
            }
        }

        if (isset($sections[$index + 1])) {
            $next = $sections[$index + 1];
            $nextIsFull = $filled($next->heading)
                        && $filled($next->paragraph)
                        && $filled($next->points_headings)
                        && $filled($next->image);
            $nextHasPointsOnly = !$nextIsFull && $filled($next->point);
            if ($nextHasPointsOnly) {
                foreach (explode(',', $next->point) as $extra) {
                    if ($filled($extra)) $mergedPoints[] = trim($extra);
                }
            }
        }

        // Alternate layout (zigzag)
        $reverse = $loop->iteration % 2 === 0 ? 'reverse' : '';
    @endphp

    @if($isFull)
    <section class="animated-section {{ $reverse }}">
        <div class="container">
            <div class="content-wrapper">
                <div class="text-content">
                    <h2>{{ $section->heading }}</h2>
                    <p>{{ $section->paragraph }}</p>
                    <p><strong>{{ $section->points_headings }}</strong></p>
                    <ul>
                        @foreach($mergedPoints as $point)
                            <li>{{ $point }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="image-content">
                    <img src="{{ asset('logos/' . $section->image) }}" alt="Section Image" />
                </div>
            </div>
        </div>
    </section>
    @endif
@endforeach

<script>
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll('.text-content, .image-content');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.3 });

  elements.forEach(el => observer.observe(el));
});
</script>
