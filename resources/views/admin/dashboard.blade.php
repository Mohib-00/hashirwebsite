<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="container animated-bg" style="margin-top:-10px">

  @php
    $cards = [
      ['title' => 'Daily Cash Sale', 'value' => 125000, 'icon' => 'fa-solid fa-sack-dollar', 'color' => '#1A2035'],
      ['title' => 'Daily Sale Return', 'value' => 8000, 'icon' => 'fa-solid fa-rotate-left', 'color' => '#1A2035'],
      ['title' => 'Daily Sale', 'value' => 185000, 'icon' => 'fa-solid fa-cart-shopping', 'color' => '#1A2035'],
      ['title' => 'Daily Expense', 'value' => 12000, 'icon' => 'fa-solid fa-receipt', 'color' => '#1A2035'],
      ['title' => 'Total Receivable', 'value' => 250000, 'icon' => 'fa-solid fa-hand-holding-dollar', 'color' => '#1A2035'],
      ['title' => 'Today Purchase', 'value' => 95000, 'icon' => 'fa-solid fa-box-open', 'color' => '#1A2035'],
      ['title' => 'Monthly Sale', 'value' => 2450000, 'icon' => 'fa-solid fa-calendar-days', 'color' => '#1A2035'],
      ['title' => 'Monthly Sale Return', 'value' => 55000, 'icon' => 'fa-solid fa-calendar-xmark', 'color' => '#1A2035'],
      ['title' => 'Monthly Cash Sale', 'value' => 1200000, 'icon' => 'fa-solid fa-coins', 'color' => '#1A2035'],
      ['title' => 'Monthly Credit Sale', 'value' => 1150000, 'icon' => 'fa-solid fa-credit-card', 'color' => '#1A2035'],
      ['title' => 'Monthly Expense', 'value' => 340000, 'icon' => 'fa-solid fa-money-bill-wave', 'color' => '#1A2035'],
      ['title' => 'Total Payable', 'value' => 180000, 'icon' => 'fa-solid fa-file-invoice-dollar', 'color' => '#1A2035'],
      ['title' => 'Monthly Purchase', 'value' => 900000, 'icon' => 'fa-solid fa-truck-loading', 'color' => '#1A2035'],
      ['title' => 'Today Discount', 'value' => 2500, 'icon' => 'fa-solid fa-percent', 'color' => '#1A2035'],
      ['title' => 'Today Fix Discount', 'value' => 1500, 'icon' => 'fa-solid fa-scissors', 'color' => '#1A2035'],
      ['title' => 'Monthly Discount', 'value' => 22000, 'icon' => 'fa-solid fa-tags', 'color' => '#1A2035'],
      ['title' => 'Monthly Fix Discount', 'value' => 18000, 'icon' => 'fa-solid fa-scissors', 'color' => '#1A2035'],
      ['title' => 'Other Income', 'value' => 45000, 'icon' => 'fa-solid fa-piggy-bank', 'color' => '#1A2035'],
      ['title' => 'Monthly Payment To Vendor Other Than Purchase', 'value' => 30000, 'icon' => 'fa-solid fa-handshake', 'color' => '#1A2035'],
    ];
  @endphp

  <div class="row g-4 mt-1">
    @foreach($cards as $card)
      @php
        $shortTitle = \Illuminate\Support\Str::words($card['title'], 4, '...');
      @endphp

      <div class="col-6 col-md-3 col-lg-2" style="margin-top:2px">
        <div class="card shadow-sm border-0 rounded-4 mb-1 compact-card card-3d-animated fade-in">
          <div class="card-body d-flex align-items-center p-2">
            <div class="icon-wrapper rounded-4 d-flex justify-content-center align-items-center me-2"
                 style="width:30px; height:30px; background-color:{{ $card['color'] }}20; color:{{ $card['color'] }}; font-size:15px;">
              <i class="{{ $card['icon'] }}"></i>
            </div>
            <div>
              <p class="mb-0 text-secondary text-uppercase fw-semibold"
                 style="white-space: nowrap; overflow:hidden; text-overflow:ellipsis; max-width:120px; font-size:0.65rem;"
                 title="{{ $card['title'] }}">
                {{ $shortTitle }}
              </p>
              <h6 class="mb-0 fw-bold text-dark" style="font-size:0.85rem;">{{ number_format($card['value'], 0) }}</h6>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="row justify-content-end mt-3">
    <div class="col-12 col-md-9 col-lg-10">
      <div class="card card-round" style="height:auto; background:transparent;">
        <div class="card-header py-2 d-flex justify-content-between align-items-center">
          <div class="card-title" style="font-size:0.9rem; color:#1A2035;">Current Month Daily Sales</div>
        </div>
        <div class="card-body p-2">
          <canvas id="monthDailySalesChart" class="small-chart"></canvas>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-3 col-lg-2">
      <div class="card border-0 rounded-4 shadow-lg hover-zoom mb-2"
           style="background: linear-gradient(135deg, #e0f7fa, #ffffff); transition: transform 0.3s;">
        <div class="card-body d-flex align-items-center p-2">
          <div class="icon-wrapper rounded-circle d-flex justify-content-center align-items-center me-2"
               style="width:45px; height:45px; background: linear-gradient(135deg, #4ade80, #16a34a); color:#fff; font-size:20px;">
            <i class="fas fa-wallet fs-4"></i>
          </div>
          <div>
            <p class="mb-1 text-success small text-uppercase fw-bold"
               style="letter-spacing:0.5px; font-size:0.75rem;">Cash In Hand</p>
            <h5 class="mb-0 fw-bold text-dark" style="font-size:1rem;">150,000</h5>
          </div>
        </div>
      </div>

      <div class="card border-0 rounded-4 shadow-lg hover-zoom"
           style="background: linear-gradient(135deg, #e0f7fa, #ffffff); transition: transform 0.3s;">
        <div class="card-body d-flex align-items-center p-2">
          <div class="icon-wrapper rounded-circle d-flex justify-content-center align-items-center me-2"
               style="width:45px; height:45px; background: linear-gradient(135deg, #4ade80, #16a34a); color:#fff; font-size:20px;">
            <i class="fas fa-university"></i>
          </div>
          <div>
            <p class="mb-1 text-success small text-uppercase fw-bold"
               style="letter-spacing:0.5px; font-size:0.75rem;">Cash at Bank</p>
            <h5 class="mb-0 fw-bold text-dark" style="font-size:1rem;">320,000</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  body { font-family: 'Poppins', sans-serif; background: #f4f5f7; }
  .hover-zoom:hover { transform: translateY(-3px) scale(1.03); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
  .small-chart { height: 350px !important; }
  .animated-bg { background: linear-gradient(270deg, #f9fafb, #e9ecef, #f9fafb); background-size: 600% 600%; animation: backgroundShift 25s ease infinite; padding: 2.5rem 1.5rem; border-radius: 1.25rem; }
  @keyframes backgroundShift { 0%{background-position:0% 50%;}50%{background-position:100% 50%;}100%{background-position:0% 50%;}}
  .card-3d-animated { background:#fff; border:none; box-shadow:0 1px 3px rgba(0,0,0,0.07),0 4px 6px rgba(0,0,0,0.12),0 8px 15px rgba(0,0,0,0.18); transition:transform 0.45s cubic-bezier(0.4,0,0.2,1); animation: float3d 6s ease-in-out infinite; }
  .card-3d-animated:hover { animation-play-state:paused; transform:perspective(900px) rotateX(10deg) rotateY(10deg) scale(1.08); box-shadow:0 10px 20px rgba(0,0,0,0.12),0 25px 40px rgba(0,0,0,0.18); }
  @keyframes float3d { 0%,100%{transform:translateY(0)}50%{transform:translateY(-6px)}}
  .fade-in { opacity:0; animation:fadeInUp 0.8s ease forwards; }
  @keyframes fadeInUp { 0%{opacity:0; transform:translateY(15px);} 100%{opacity:1; transform:translateY(0);} }
</style>

<script>
const ctx = document.getElementById('monthDailySalesChart').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Oct 1','Oct 2','Oct 3','Oct 4','Oct 5','Oct 6','Oct 7'],
    datasets: [{
      label: 'Daily Sales (Rs)',
      data: [120000, 145000, 130000, 170000, 160000, 180000, 155000],
      borderColor: '#1A2035',
      backgroundColor: 'rgba(26,32,53,0.15)',
      pointBackgroundColor: '#1A2035',
      pointBorderColor: '#fff',
      fill: true,
      tension: 0.4
    }]
  },
  options: {
    responsive: true,
    plugins: { legend: { display: true, labels: { color: '#1A2035' } } },
    scales: {
      y: { beginAtZero: true, ticks: { color: '#1A2035' }, grid: { color: 'rgba(26,32,53,0.1)' } },
      x: { ticks: { color: '#1A2035' }, grid: { color: 'rgba(26,32,53,0.1)' } }
    }
  }
});
</script>


