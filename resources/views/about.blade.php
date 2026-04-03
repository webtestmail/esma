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
            <img src="{{ asset($section_one->section_image) }}" alt="Our History">
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
           @if($section_three->sub_sections)
          <div class="ab-col ab-col-5">
            <div class="img-grid">
                @foreach($section_three->sub_sections as $subsection)
              <div class="grid-box endorsment-box">
                @if($subsection->section_image)
                <img src="{{ asset($subsection->section_image) }}" alt="Endorsement {{ $loop->iteration }}">
                @endif

                @if($subsection->section_title || $subsection->section_headline)
                <div class="endorsment-info">
                  @if($subsection->section_title)
                  <span>{{ $subsection->section_title ?? '' }}</span>
                  @endif
                  @if($subsection->section_headline)
                  <p class="m-0 text-white"> {{ $subsection->section_headline ?? '' }}</p>
                  @endif
                </div>
                @endif
              </div>
              @endforeach
             
            </div>
          </div>
         @endif


          @if($section_three)
          <div class="ab-col ab-col-6">
            <div class="about-content">
              <p class="about-subtitle text-white">{{ $section_three->section_title }}</p>
              <div class="about-title">{{ $section_three->section_headline }}</div>
            {!! html_entity_decode($section_three->description) !!}
              <a href="{{ $section_three->button_link }}" class="btn-style-3 btn-secondary-outline">
                <svg class="svg-icon ">
                  <use href="{{ asset('images/icons/icons-sprite.svg#icon-play') }}"></use>
                </svg> {{ $section_three->button_name }}
                <svg class="svg-icon arrow-svg">
                  <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-short-arrow-right"></use>
                </svg>
              </a>
            </div>
          </div>
          @endif


          @php
            $section_four = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(49);
        
          @endphp
          @if($section_four)
          <div class="ab-col ab-col-7">
            <div class="position-relative">
              <div class="about-img">
                <img src="{{ asset($section_four->section_image) }}" alt="Events">
              </div>
              <!-- On click - Video Play  -->
              <div class="btn-play-primary large-play-btn position-absolute top-50 start-50 translate-middle">
                <a data-bs-toggle="modal" data-bs-target="#eventVideoModal"><svg class="svg-icon ">
                    <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-play"></use>
                  </svg></a>
              </div>
            </div>

          </div>

          <div class="ab-col ab-col-8">
            <div class="about-content">
              <p class="about-subtitle text-white">{{ $section_four->section_title }}</p>
              <div class="about-title">{{ $section_four->section_headline }}</div>
             {!! html_entity_decode($section_four->description) !!}
            </div>
          </div>
          @endif


           @php
            $section_five = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(50);
        
          @endphp

          @if($section_five)
          <div class="ab-col ab-col-9">
            <div class="about-img">
              <img src="{{ asset($section_five->section_image) }}" alt="Events">
            </div>
          </div>
          @endif
        </div>

        
        @if($section_five)
        <div class="ab-col ab-col-10">
          <div class="about-content">
            <p class="about-subtitle">{{ $section_five->section_title }}</p>
            <div class="about-title">{{ $section_five->section_headline }}</div>
            {!! html_entity_decode($section_five->description) !!}
          </div>
        </div>
        @endif




         @php
            $section_six = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(51);
        
          @endphp

        <div class="ab-col ab-col-11">
          <div class="about-img board-mission position-relative">
            <img src="{{ asset($section_six->section_image) }}" alt="Events" class="board-mission-img">
            @if($section_six->sub_sections)
            @foreach($section_six->sub_sections->take(1) as $section)
            <div class="missio-box blur-card-bg">
              <div class="mission-felx">
                <div class="d-flex align-items-center">
                  <img src="{{ asset($section->section_image) }}" alt="" class="me-3">
                  <span>{{ $section->section_title }}</span>
                </div>
                <!--<i class="bi bi-arrow-up-right"></i>-->
              </div>

              {!! html_entity_decode($section->description) !!}
            </div>
            @endforeach
             @foreach($section_six->sub_sections->skip(1) as $section)
            <div class="missio-box blur-card-bg vision-box">
              <div class="mission-felx">
                <div class="d-flex align-items-center">
                  <img src="{{ asset($section->section_image) }}" alt="" class="me-3">
                  <span>{{ $section->section_title }}</span>
                </div>
                <!--<i class="bi bi-arrow-up-right"></i>-->
              </div>
             {!! html_entity_decode($section->description) !!}
            </div>
            @endforeach
            @endif
          </div>
        </div>



           @php
            $section_seven = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(54);
        
          @endphp


     @if($section_seven)
        <div class="ab-col ab-col-12">
          <div class="board-members">
            <div class="about-title mb-4">{{ $section_seven->section_title }}</div>
            @if($section_seven->sub_sections)
            <div class="board-members-flex">
              
              @foreach ($section_seven->sub_sections as $key => $section)
              <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal{{ $key + 1 }}">
                <img src="{{ asset($section->section_image) }}" alt="{{ $section->section_title }}" class="board-img">
                <div class="board-member-info">
                  <img src="{{ asset($section->more_images) }}" alt="" class="flag">
                  <p>Name</p>
                  <span>{{ $section->section_title }} @if($section->section_subheading) | {{ $section->section_subheading }} @endif</span>
                </div>
              </div>
               @endforeach
              {{-- <div class="board-member-box" data-bs-toggle="modal" data-bs-target="#boardmemberModal">
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
              </div> --}}
            </div>
            @endif
          </div>
        </div>
         @endif



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
@if($page->video_link)
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
@endif

@if($section_four->video_link)
<div class="modal fade videoModal" id="eventVideoModal" tabindex="-1" aria-labelledby="eventVideoModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg
          class="svg-icon arrow-svg">
          <use href="{{ asset('images/icons/icons-sprite.svg') }}#icon-cross"></use>
        </svg></button>
      <div class="modal-body">
        <iframe src="{{ $section_four->video_link }}" width="100%" height="100%" frameborder="0"
          allow="autoplay; fullscreen" allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</div>
@endif

<!-- Bootstrap Modal -->
@if($section_seven->sub_sections)
@foreach ($section_seven->sub_sections as $key => $section)
<div class="modal fade" id="boardmemberModal{{ $key + 1 }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog side-panel board-member-panel modal-fullscreen-sm-down">
    <div class="modal-content border-0">
      <div class="modal-header side-header mb-0 p-0 border-0">
        <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"><svg
            class="svg-icon arrow-svg">
            <use href="{{ asset('images/icons/icons-sprite') }}.svg#icon-cross"></use>
          </svg></button>
      </div>
      <div class="modal-body side-body p-0">
        <div class="board-heading">
          <h2 class="heading-36">{{ $section->section_title }}</h2>
          <p><b>{{ $section->section_headline }} @if($section->section_subheading) | {{ $section->section_subheading }} @endif</b></p>
          <div class="line my-3"></div>
          <div class="short-info">
            <p class="lead">{!! html_entity_decode($section->section_subtitle)  !!}</p>
          </div>
          <div class="img mt-2"><img src="{{ asset($section->section_image) }}" alt="{{ $section->section_title }}" class="board-img-pop"></div>
          <a class="mail-info" href="mailto:{{ $section->button_link ?? '' }}">
            {{ $section->button_link ?? ' ' }}
          </a>
          <div class="long-info">
            {!! html_entity_decode($section->description) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif

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
