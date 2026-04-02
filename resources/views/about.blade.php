@extends('layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection



@section('content')
  <section class="inner-banner about-inner-banner" style="background-image: url('{{ asset($page->page_image) }}');">
  <div class="container">
    <div class="inner-content text-white">
      <!-- On click - Video Play  -->
      <div class="btn-play-primary large-play-btn mb-lg-5">
        <a data-bs-toggle="modal" data-bs-target="#promostionVideoModal"><svg class="svg-icon ">
            <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-play"></use>
          </svg></a>
      </div>
      <span class="about-inner-subtitle">{{ $page->breadcrumb_headline }}</span>
      <h1 class="inner-heading wow fadeInUp">
         {!! html_entity_decode($page->breadcrumb_description) !!}
      </h1>
      <p> {!! html_entity_decode($page->description) !!}</p>
      <div class="scroll-div mt-1 wow fadeInUp">
        <div class="line-1"></div>
        <div class="scroll-box flex-shrink-0 d-flex align-items-center gap-2">
          <i class="bi bi-arrow-down-circle"></i>
          <span>Scroll Down</span>
        </div>
        <div class="line-2"></div>
      </div>
    </div>
  </div>
</section>



@php
    $section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(42);

@endphp

<div class="scroll-progress" id="scrollProgress"></div>

<section class="section-about-page rounded-corners-sec">
  <div class="about-pg">
    <!-- Viewport + Track -->
    <div class="h-viewport" id="hViewport">
      <div class="h-track" id="hTrack">

        <div class="ab-col ab-col-1">
          <div class="about-img">
            <img src="{{ $section_one->section_image}}" alt="Our History">
          </div>
        </div>

        <div class="ab-col ab-col-2">
          <div class="about-content">
            <div class="about-title">{{ $section_one->section_title }}</div>
            <span class="accent-year">{{ $section_one->section_headline }}</span>
            {!! html_entity_decode($section_one->description) !!}
            {{-- <p>ESMA International Network was formed in 1976. Over the past 49 years, we have become
              Europe's and the rest of the World's only Distributor and Manufacturer Organisation
              for consumer goods.</p>
            <p>As a non-profit organisation, run by members on behalf of members, we stimulate the
              exchange of ideas, build connections, and leverage our contacts to drive local and
              export sales.</p>
            <p>Today, we aim to increase the scope of our enterprise, and continually work towards
              the improvement of resources and knowledge available to members.</p> --}}
          </div>
        </div>

        @php
          $section_two = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(43);

        @endphp
        <div class="ab-col ab-col-3">

            @php
                $images = json_decode($section_two->more_images, true) ?? [];
              $images = array_reverse($images);
            @endphp
          <div class="img-grid">
             @foreach ($images as $imgPath)
            <div class="grid-box"><img src="{{ asset($imgPath) }}"></div>
            @endforeach
         
          </div>
        </div>

        <div class="ab-col ab-col-4">
          <div class="about-content">
            <div class="about-title">{{ $section_two->section_title}}</div>
            {!! html_entity_decode($section_two->description) !!}
          
            <a href="{{ $section_two->button_link }}" class="btn-style-3">{{ $section_two->button_name }}<svg class="svg-icon arrow-svg">
                <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
              </svg> </a>
          </div>
        </div>


          @php
          $section_three = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(44);
        @endphp
        
        <div class="dark-bg">
          <div class="ab-col ab-col-5">
            <div class="img-grid">
              <div class="grid-box endorsment-box">
                <img src="images/about-pg/endorsement1.jpg" alt="Endorsement 1">
                <div class="endorsment-info">
                  <span>178 +</span>
                  <p class="m-0 text-white">We boasts more than 178 experienced and trustworthy
                    members.</p>
                </div>
              </div>
              <div class="grid-box"><img src="images/about-pg/endorsement2.jpg" alt="Endorsement 2"></div>
              <div class="grid-box"><img src="images/about-pg/endorsement3.jpg" alt="Endorsement 3"></div>
              <div class="grid-box endorsment-box">
                <img src="images/event-6.jpg" alt="Event">
                <div class="endorsment-info">
                  <span>60 +</span>
                  <p class="m-0 text-white">We are across 62 countries in Europe and Internationally.
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="ab-col ab-col-6">
            <div class="about-content">
              <p class="about-subtitle text-white">ESMA International Network Benefits</p>
              <div class="about-title">Endorsement That Matters</div>
              <p>Companies will have been in business for at least 1 year, should represent or manufacture
                brands that
                form part of the value chain, and come recommended by another ESMA member.</p>
              <p>By adhering to this strict criteria, we cultivate a thriving ecosystem of businesses in
                which we can
                facilitate the exchange of knowledge.</p>
              <a href="#" class="btn-style-3 btn-secondary-outline">
                <svg class="svg-icon ">
                  <use href="images/icons/icons-sprite.svg#icon-play"></use>
                </svg> Watch our Intro Video
                <svg class="svg-icon arrow-svg">
                  <use href="images/icons/icons-sprite.svg#icon-short-arrow-right"></use>
                </svg>
              </a>
            </div>
          </div>

          <div class="ab-col ab-col-7">
            <div class="position-relative">
              <div class="about-img">
                <img src="images/about-pg/promotion.jpg" alt="Events">
              </div>
              <!-- On click - Video Play  -->
              <div class="btn-play-primary large-play-btn position-absolute top-50 start-50 translate-middle">
                <a data-bs-toggle="modal" data-bs-target="#promostionVideoModal"><svg class="svg-icon ">
                    <use href="images/icons/icons-sprite.svg#icon-play"></use>
                  </svg></a>
              </div>
            </div>

          </div>

          <div class="ab-col ab-col-8">
            <div class="about-content">
              <p class="about-subtitle text-white">ESMA International Network Benefits</p>
              <div class="about-title">Promotion Where It Counts</div>
              <p>The ESMA membership directory attracts attention from around the world. Our website has
                proven to be
                the
                most effective tool for searching companies with an interest in Europe and
                Internationally.</p>
              <p>We are in constant contact with major trade magazines, committed to promoting outsourcing
                and
                third-party
                sales associations to all members of the value chain.</p>
            </div>
          </div>

          <div class="ab-col ab-col-9">
            <div class="about-img">
              <img src="images/about-pg/insights1.jpg" alt="Events">
            </div>
          </div>
        </div>

        
        <div class="ab-col ab-col-10">
          <div class="about-content">
            <p class="about-subtitle">ESMA International Network Benefits</p>
            <div class="about-title">Insights For Tomorrow</div>
            <p>ESMA members benefit from unlimited access to a library of news, global trade show events,
              business
              opportunities, seminars and market information.</p>
            <p>We regularly organise seminars, host social events at international trade shows, and host our
              annual
              convention where member companies can learn from one another.</p>
            <p>To build your business on an international level you need to know what trends are on the
              horizon – the
              ESMA International Network helps you stay ahead.</p>
          </div>
        </div>

        <div class="ab-col ab-col-11">
          <div class="about-img board-mission position-relative">
            <img src="images/about-pg/board-main.jpg" alt="Events" class="board-mission-img">
            <div class="missio-box blur-card-bg">
              <div class="mission-felx">
                <div class="d-flex align-items-center">
                  <img src="images/__icon.svg" alt="" class="me-3">
                  <span>Vision</span>
                </div>
                <!--<i class="bi bi-arrow-up-right"></i>-->
              </div>

              <p>A world leading distributor manufacturer organisation, ensuring our members gain a global
                understanding of the value chain.</p>
            </div>
            <div class="missio-box blur-card-bg vision-box">
              <div class="mission-felx">
                <div class="d-flex align-items-center">
                  <img src="images/mission__icon.svg" alt="" class="me-3">
                  <span>Mission</span>
                </div>
                <!--<i class="bi bi-arrow-up-right"></i>-->
              </div>
              <p>Stimulate the exchange of ideas, offer superior information and knowledge transfer. To
                represent
                the
                interests of our members</p>
            </div>
          </div>
        </div>

        <div class="ab-col ab-col-12">
          <div class="board-members">
            <div class="about-title mb-4">Our Board</div>
            <div class="board-members-flex">
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board6.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-1.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board1.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-2.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board3.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-3.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board4.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-1.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board5.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-2.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board7.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-3.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
                <img src="images/about-pg/board2.jpg" alt="" class="board-img">
                <div class="board-member-info">
                  <img src="images/f-1.png" alt="" class="flag">
                  <p>Name</p>
                  <span>Michael Robinson | United Kingdom</span>
                </div>
              </div>
            </div>
          </div>
        </div>




        <div class="ab-col" style="flex: 0 0 192px;"></div>

      </div>
    </div>

    <div class="container pb-4 d-none d-lg-block">
      <div class="scrollbar-wrap">
        <span class="scroll-label d-none">scroll</span>
        <div class="scrollbar-track" id="scrollbarTrack">
          <div class="scrollbar-thumb" id="scrollbarThumb"></div>
        </div>
        <span class="scroll-label d-none" id="scrollCounter">01 / 05</span>
      </div>
      <div class="scroll-hint" id="scrollHint">
        <span>Drag or scroll to explore</span>
        <span class="hint-arrow"><i class="bi bi-arrow-right"></i></span>
      </div>
    </div>

  </div>
  <div class="home-logos bg-white">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="home-logos-header">
          <div class="home-logo"><img src="images/l-1.png" alt=""></div>
          <div class="home-logo"><img src="images/l-2.png" alt=""></div>
          <div class="home-logo"><img src="images/l-3.png" alt=""></div>
          <div class="home-logo"><img src="images/l-4.png" alt=""></div>
          <div class="home-logo"><img src="images/l-7.png" alt=""></div>
          <div class="home-logo"><img src="images/l-8.png" alt=""></div>
          <div class="home-logo"><img src="images/l-9.png" alt=""></div>
          <div class="home-logo"><img src="images/l-10.png" alt=""></div>
          <div class="home-logo"><img src="images/l-11.png" alt=""></div>
          <div class="home-logo"><img src="images/l-5.png" alt=""></div>
          <div class="home-logo"><img src="images/l-6.png" alt=""></div>
          <div class="home-logo"><img src="images/l-4.png" alt=""></div>
          <div class="home-logo"><img src="images/l-7.png" alt=""></div>
          <div class="home-logo"><img src="images/l-8.png" alt=""></div>
          <div class="home-logo"><img src="images/l-9.png" alt=""></div>
        </div>
      </div>
    </div>
  </div>

  <!-- - Logos  -->
</section>


<!-- Modal -->
<div class="modal fade videoModal" id="promostionVideoModal" tabindex="-1" aria-labelledby="promostionVideoModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
          class="svg-icon arrow-svg">
          <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-cross"></use>
        </svg></button>
      <div class="modal-body">
        <iframe src="{{ $page->video_link }}" width="100%" height="100%" frameborder="0"
          allow="autoplay; fullscreen" allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="boardmemberModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog side-panel board-member-panel modal-fullscreen-sm-down">
    <div class="modal-content border-0">
      <div class="modal-header side-header mb-0 p-0 border-0">
        <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"><svg
            class="svg-icon arrow-svg">
            <use href="images/icons/icons-sprite.svg#icon-cross"></use>
          </svg></button>
      </div>
      <div class="modal-body side-body p-0">
        <div class="board-heading">
          <h2 class="heading-36">Christos Dedoussis</h2>
          <p><b>Vice President | Greece</b></p>
          <div class="line my-3"></div>
          <div class="short-info">
            <p class="lead">Christos is the CEO, President, and co-owner of Flavour Factory S.A, has a
              Bachelor’s in
              Food Technology with Masters and Doctorate in Molecular Biology.</p>
          </div>
          <div class="img mt-2"><img src="images/about-pg/board6.jpg" alt="" class="board-img-pop"></div>
          <a class="mail-info" href="mailto:willian.rochford@esma.org">
            willian.rochford@esma.org
          </a>
          <div class="long-info">
            <p>His passion in entrepreneurship, led him to quit his career in the UK and return to Greece to
              fulfil his
              dream.</p>
            <p>Flavour Factory is focused on innovative products, new ideas and over the years established
              an “Ethnic”
              food category in Greece.
            </p>
            <p>The product portfolio evolved and expanded to other categories like snacking, protein,
              breakfast, tea,
              confectionary and organic.
            </p>
            <p>With accumulated experience, next steps involved the launch of his own Brands and the
              establishment of
              the first production unit for Rice Cakes in Greece. One step leads to the next, and now
              Exports form an
              important development in the next chapter of Flavour Factory.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('page-js')
    <script>
  const viewport = document.getElementById('hViewport');
  const track = document.getElementById('hTrack');
  const thumb = document.getElementById('scrollbarThumb');
  const trackEl = document.getElementById('scrollbarTrack');
  const progress = document.getElementById('scrollProgress');
  const counter = document.getElementById('scrollCounter');
  const hint = document.getElementById('scrollHint');

  let currentX = 0;
  let targetX = 0;
  let raf = null;
  let isDragging = false;
  let dragStartX = 0;
  let dragStartScroll = 0;
  let thumbDragging = false;

  const TOTAL_SLIDES = 5;

  // ✅ Breakpoint check
  function isDesktop() {
    return window.innerWidth >= 992;
  }

  function getMaxScroll() {
    return Math.max(0, track.scrollWidth - viewport.clientWidth);
  }

  function clamp(val, min, max) {
    return Math.min(Math.max(val, min), max);
  }

  function updateUI(x) {
    if (!isDesktop()) return;

    const max = getMaxScroll();
    const pct = max ? x / max : 0;

    thumb.style.width = (pct * 100) + '%';
    thumb.style.left = '0';

    progress.style.width = (pct * 100) + '%';

    const slide = Math.min(TOTAL_SLIDES, Math.ceil(pct * TOTAL_SLIDES) + 1);
    counter.textContent = String(slide).padStart(2, '0') + ' / 0' + TOTAL_SLIDES;
  }

  function lerp(a, b, t) {
    return a + (b - a) * t;
  }

  function animate() {
    if (!isDesktop()) return;

    const diff = targetX - currentX;

    if (Math.abs(diff) < 0.5) {
      currentX = targetX;
      track.style.transform = `translateX(${-currentX}px)`;
      updateUI(currentX);
      raf = null;
      return;
    }

    currentX = lerp(currentX, targetX, 0.1);
    track.style.transform = `translateX(${-currentX}px)`;
    updateUI(currentX);
    raf = requestAnimationFrame(animate);
  }

  function scrollTo(x) {
    if (!isDesktop()) return;

    targetX = clamp(x, 0, getMaxScroll());
    if (!raf) raf = requestAnimationFrame(animate);
  }

  // ── Mouse wheel ──
  viewport.addEventListener('wheel', e => {
    if (!isDesktop()) return;

    e.preventDefault();
    scrollTo(targetX + (e.deltaY || e.deltaX) * 1.2);
    hideHint();
  }, {
    passive: false
  });

  // ── Touch ──
  let touchStartX = 0;
  let touchScrollStart = 0;

  viewport.addEventListener('touchstart', e => {
    if (!isDesktop()) return;

    touchStartX = e.touches[0].clientX;
    touchScrollStart = targetX;
    hideHint();
  }, {
    passive: true
  });

  viewport.addEventListener('touchmove', e => {
    if (!isDesktop()) return;

    const dx = touchStartX - e.touches[0].clientX;
    scrollTo(touchScrollStart + dx * 1.5);
  }, {
    passive: true
  });

  // ── Mouse drag ──
  viewport.addEventListener('mousedown', e => {
    if (!isDesktop()) return;

    isDragging = true;
    dragStartX = e.clientX;
    dragStartScroll = targetX;
    viewport.style.cursor = 'grabbing';
    hideHint();
  });

  window.addEventListener('mousemove', e => {
    if (!isDesktop() || !isDragging) return;

    const dx = dragStartX - e.clientX;
    scrollTo(dragStartScroll + dx * 1.2);
  });

  window.addEventListener('mouseup', () => {
    isDragging = false;
    viewport.style.cursor = 'grab';
  });

  // ── Scrollbar drag ──
  trackEl.addEventListener('mousedown', e => {
    if (!isDesktop()) return;

    thumbDragging = true;

    const rect = trackEl.getBoundingClientRect();
    const pct = (e.clientX - rect.left) / rect.width;
    scrollTo(pct * getMaxScroll());
  });

  window.addEventListener('mousemove', e => {
    if (!isDesktop() || !thumbDragging) return;

    const rect = trackEl.getBoundingClientRect();
    const pct = Math.min(1, Math.max(0, (e.clientX - rect.left) / rect.width));
    scrollTo(pct * getMaxScroll());
  });

  window.addEventListener('mouseup', () => {
    thumbDragging = false;
  });

  // ── Keyboard ──
  window.addEventListener('keydown', e => {
    if (!isDesktop()) return;

    if (e.key === 'ArrowRight') scrollTo(targetX + 300);
    if (e.key === 'ArrowLeft') scrollTo(targetX - 300);
  });

  function hideHint() {
    hint.classList.add('hidden');
  }

  // ✅ Handle resize properly
  function handleResize() {
    if (!isDesktop()) {
      // Reset everything for mobile
      track.style.transform = 'translateX(0px)';
      currentX = 0;
      targetX = 0;
      raf = null;
    } else {
      // Recalculate on desktop
      updateUI(currentX);
    }
  }

  window.addEventListener('resize', handleResize);

  // Init
  handleResize();
  updateUI(0);
</script>
@endpush
