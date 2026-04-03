$(document).ready(function () {
  // Remove preload class to enable transitions after page load
  $(window).on("load", function () {
    $("body").removeClass("preload");
  });

  // Sticky Header on Scroll
  $(window).scroll(function () {
    if ($(window).scrollTop() > 0) {
      $(".header").addClass("sticky");
    } else {
      $(".header").removeClass("sticky");
    }
  });
});

$("ul.menus li > ul.dropdown-menu").before(
  '<span class="clk_btn"><i class="bi bi-chevron-down"></i></span>'
);

$(function () {
  $(".clk_btn").on("click", function (e) {
    e.preventDefault();

    // CLOSE all others
    $(".clk_btn").not(this).removeClass("navactives");
    $(".clk_btn").not(this).next(".dropdown-menu").stop().slideUp(300);

    // TOGGLE current
    if ($(this).hasClass("navactives")) {
      $(this).removeClass("navactives");
      $(this).next(".dropdown-menu").stop().slideUp(300);
    } else {
      $(this).addClass("navactives");
      $(this).next(".dropdown-menu").stop().slideDown(300);
    }
  });
});



$(".testimonial-slider").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: true,
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,

  prevArrow: `
  <button class="slick-prev custom-arrow-yellow">
    <svg class="svg-icon svg-three-arrow prev-arrow">
      <use href="images/icons/icons-sprite.svg#icon-angle-left"></use>
    </svg>
  </button>`,

  nextArrow: `
  <button class="slick-next custom-arrow-yellow">
    <svg class="svg-icon svg-three-arrow">
      <use href="images/icons/icons-sprite.svg#icon-angle-right"></use>
    </svg>
  </button>`,

  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: "30px",
        arrows: false,
      },
    },
  ],
});

$(".home-logos-header").slick({
  slidesToShow: 11,
  slidesToScroll: 1,
  dots: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows: false,

  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 9,
      },
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 7,
      },
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 5,
      },
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 3,
      },
    },
  ],
});

$(".mobile-upcomingslider").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 3000,
  arrows: false,
  centerMode: true,
  centerPadding: "30px",
});

var $slider = $('.events-list-home-slider');

$slider.on('init afterChange', function (event, slick, currentSlide) {

  var i = (currentSlide ? currentSlide : 0);

  var year = $(slick.$slides[i]).data('year');

  $('.event-year b').text(year);

});

$slider.slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: false,
  prevArrow: $('.event-arrow.prev'),
  nextArrow: $('.event-arrow.next')
});


$(".events-main-home").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  dots: true,
  infinite: true,
  arrows: false,
});

var memberSlider = $(".more-member-slider");
memberSlider.slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  appendDots: $(".member-dots"),
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: "90px",
      },
    },
  ],
});

$(".prev-member").on("click", function () {
  memberSlider.slick("slickPrev");
});

$(".next-member").on("click", function () {
  memberSlider.slick("slickNext");
});





var slider = $(".events-main-slider").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  appendDots: $(".custom-dots"),
  infinite: true,
  autoplay: false,
  autoplaySpeed: 4000,

  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: "30px",
      },
    },
  ],
});
$(".custom-arrow.prev").on("click", function () {
  slider.slick("slickPrev");
});

$(".custom-arrow.next").on("click", function () {
  slider.slick("slickNext");
});



var countrySlider = $(".country-fair-slider").slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  appendDots: $(".country-dots"),
  infinite: true,
  autoplay: false,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
        centerMode: true,
        centerPadding: "60px",
      },
    },
  ],
});

$(".prev-country").click(function () {
  countrySlider.slick("slickPrev");
});

$(".next-country").click(function () {
  countrySlider.slick("slickNext");
});



var isDetailPage = $(".speaker-detail-slider").length > 0;
var countrySlider = $(".speaker-slider").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  appendDots: $(".speaker-dots"),
  infinite: true,

  autoplay: !isDetailPage,
  autoplaySpeed: 2000,
  pauseOnHover: true,

  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
});


$(".prev-speaker").click(function () {
  countrySlider.slick("slickPrev");
});

$(".next-speaker").click(function () {
  countrySlider.slick("slickNext");
});

if (isDetailPage) {
  var currentSpeaker = $(".speaker-detail-slider").data("current");

  var target = $('.speaker-slide[data-speaker="' + currentSpeaker + '"]');

  if (target.length) {
    target.addClass("active-speaker");
    // Important: wait for slick to fully init
    countrySlider.on("init", function () {
      var index = target.data("slick-index");
      countrySlider.slick("slickGoTo", index);
    });
  }
}

function initBoardSlider() {
  if ($(window).width() < 992) {
    if (!$(".board-members-flex").hasClass("slick-initialized")) {
      $(".board-members-flex").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: "35px",
        arrows: false,
        dots: true,
        infinite: true,
      });
    }
  } else {
    // Destroy slider on desktop
    if ($(".board-members-flex").hasClass("slick-initialized")) {
      $(".board-members-flex").slick("unslick");
    }
  }
}

// Init on load
$(document).ready(function () {
  initBoardSlider();
});

// Re-init on resize
$(window).on("resize", function () {
  initBoardSlider();
});


function initJoinSlider() {
  if ($(window).width() < 992) {

    if (!$('.mobilejoinSlider').hasClass('slick-initialized')) {

      $('.mobilejoinSlider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        infinite: true,
        responsive: [
          {
            breakpoint: 576,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });

    }

  } else {

    if ($('.mobilejoinSlider').hasClass('slick-initialized')) {
      $('.mobilejoinSlider').slick('unslick');
    }

  }
}

$(document).ready(function () {
  initJoinSlider();
});

$(window).on('resize', function () {
  initJoinSlider();
});



$(".recent-news-slider").slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 4000,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      },
    },
  ],
});






// dropdown

$(document).ready(function () {
  function checkWidth() {
    if (window.innerWidth < 992) {
      $(".has-dropdown > a")
        .off("click")
        .on("click", function (e) {
          e.preventDefault();
          $(this).next(".dropdown-menu").slideToggle(300);
        });
    } else {
      $(".has-dropdown > a").off("click");
      $(".dropdown-menu").removeAttr("style");
    }
  }

  checkWidth();
  $(window).resize(checkWidth);
});

$(document).ready(function () {
  $(".dropdown-toggle-btn").click(function (e) {
    e.preventDefault();

    const $dropdown = $(this).next(".custom-dropdown");
    const $wrapper = $(this).closest(".dropdown-item-wrapper");

    // Close other dropdowns
    $(".custom-dropdown").not($dropdown).slideUp(200);
    $(".dropdown-item-wrapper").not($wrapper).removeClass("active");

    // Toggle current
    $dropdown.slideToggle(200, function () {
      // Toggle active class on the wrapper
      $wrapper.toggleClass("active", $dropdown.is(":visible"));
    });
  });

  // Close on outside click
  $(document).click(function (e) {
    if (!$(e.target).closest(".dropdown-item-wrapper").length) {
      $(".custom-dropdown").slideUp(200);
      $(".dropdown-item-wrapper").removeClass("active");
    }
  });
});


// footer
const newLocal = $(document).ready(function () {
  $(".event-toggle").click(function () {
    $(".event-wrapper").toggleClass("collapsed");

    if ($(".event-wrapper").hasClass("collapsed")) {
      $(".arrow-icon").html(`<svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-angle-down"></use>
                        </svg>`);
    } else {
      $(".arrow-icon").html(`<svg class="svg-icon arrow-svg">
                            <use href="images/icons/icons-sprite.svg#icon-angle-down"></use>
                        </svg>`);
    }
  });
});

// scroll up

$(document).ready(function () {
  // Show button when scroll down
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      $(".scroll-top").addClass("show");
    } else {
      $(".scroll-top").removeClass("show");
    }
  });

  // Scroll to top on click
  $(".scroll-top").click(function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      600,
    );
    return false;
  });
});

// help page accordian

document.addEventListener("DOMContentLoaded", function () {
  const section = document.querySelector("#membersFilterSection01");
  if (!section) return;

  const tabs = section.querySelectorAll(".nav-link");
  const items = section.querySelectorAll(".accordion-item");

  tabs.forEach((tab) => {
    tab.addEventListener("click", function () {
      const filter = this.getAttribute("data-filter");

      tabs.forEach((t) => t.classList.remove("active"));
      this.classList.add("active");

      items.forEach((item) => {
        // Close any open accordion
        const openCollapse = item.querySelector(".accordion-collapse.show");
        if (openCollapse) {
          bootstrap.Collapse.getInstance(openCollapse)?.hide();
        }

        // ðŸ‘‡ MAIN CHANGE HERE
        if (filter === "frequent") {
          item.style.display = "block"; // Show ALL
        } else if (item.getAttribute("data-category") === filter) {
          item.style.display = "block"; // Show matching
        } else {
          item.style.display = "none"; // Hide others
        }
      });
    });
  });
});

// breadcrumb scroll

document
  .getElementById("scrollDownBtn")
  ?.addEventListener("click", () => {
    document.getElementById("nextSection")?.scrollIntoView();
  });




document.addEventListener("DOMContentLoaded", function () {
  const resourceSection = document.querySelector(".resource-home-sec");
  if (!resourceSection) return;

  const tabButtons = resourceSection.querySelectorAll(".nav-tabs .nav-link");
  const label = document.getElementById("resourceTabLabel");

  if (!label) return;

  tabButtons.forEach((tab) => {
    tab.addEventListener("shown.bs.tab", function (event) {
      // Get clean tab text (without icon)
      const tabText = event.target.textContent.trim();

      // Update label text (keep icon intact)
      label.innerHTML = '<i class="bi bi-chevron-right"></i> ' + tabText;
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  //   const resourcesHubSwiper = new Swiper(".resourcesHubSwiper", {
  //     slidesPerView: 1,
  //     spaceBetween: 30,
  //     loop: false,
  //     speed: 800,

  //     navigation: {
  //       nextEl: ".resourcesHub-next",
  //       prevEl: ".resourcesHub-prev",
  //     },

  //     pagination: {
  //       el: ".resourcesHub-pagination",
  //       clickable: true,
  //     },

  //     breakpoints: {
  //       768: {
  //         slidesPerView: 1,
  //       },
  //     },
  //   });
});

// home page slider

// (() => {
//   const section = document.querySelector(".regulatory-swiper-section");
//   if (!section) return;

//   const track = section.querySelector(".reg-swiper-track");
//   const slides = [...section.querySelectorAll(".reg-slide")];
//   const next = section.querySelector(".reg-next");
//   const prev = section.querySelector(".reg-prev");

//   let index = 0;

//   // Clone slides for infinite loop
//   track.append(...slides.map((s) => s.cloneNode(true)));

//   const total = track.children.length;

//   const update = () => {
//     const w = track.children[0].offsetWidth;
//     track.style.transform = `translateX(-${index * w}px)`;
//   };

//   next.onclick = () => {
//     index++;
//     if (index >= total / 2) index = 0;
//     update();
//   };

//   prev.onclick = () => {
//     index--;
//     if (index < 0) index = total / 2 - 1;
//     update();
//   };

//   window.addEventListener("resize", update);
// })();

document.addEventListener("DOMContentLoaded", function () {
  const sliders = document.querySelectorAll(".resource-slider-wrapper");

  sliders.forEach((wrapper) => {
    const row = wrapper.querySelector(".row");
    const slides = wrapper.querySelectorAll(".col-lg-4, .reg-slide");

    const prevBtn = wrapper.parentElement.querySelector(".reg-prev");
    const nextBtn = wrapper.parentElement.querySelector(".reg-next");
    const dotsContainer = wrapper.parentElement.querySelector(".reg-dots");

    let index = 0;

    function getVisibleSlides() {
      if (window.innerWidth < 576) return 1;
      if (window.innerWidth < 992) return 2;
      return 3;
    }

    function getMaxIndex() {
      return slides.length - getVisibleSlides();
    }

    function updateSlider() {
      const slideWidth = slides[0].offsetWidth;
      row.style.transform = `translateX(-${index * slideWidth}px)`;
      updateDots();
    }

    function updateDots() {
      dotsContainer.querySelectorAll("span").forEach((dot, i) => {
        dot.classList.toggle("active", i === index);
      });
    }

    function createDots() {
      dotsContainer.innerHTML = "";
      for (let i = 0; i <= getMaxIndex(); i++) {
        const dot = document.createElement("span");
        dot.addEventListener("click", () => {
          index = i;
          updateSlider();
        });
        dotsContainer.appendChild(dot);
      }
    }

    nextBtn?.addEventListener("click", () => {
      if (index < getMaxIndex()) {
        index++;
      } else {
        index = 0;
      }
      updateSlider();
    });

    prevBtn?.addEventListener("click", () => {
      if (index > 0) {
        index--;
      } else {
        index = getMaxIndex();
      }
      updateSlider();
    });

    window.addEventListener("resize", () => {
      index = 0;
      createDots();
      updateSlider();
    });

    createDots();
    updateSlider();
  });
});

// header toggler

// document.addEventListener("DOMContentLoaded", function () {
//   const toggleBtn = document.querySelector(".menu-toggle");
//   const menu = document.querySelector(".menus");
//   const overlay = document.querySelector(".menu-overlay");
//   const body = document.body;
//   const dropdownItems = document.querySelectorAll(".menus > li");

//   // OPEN MENU
//   function openMenu() {
//     menu.classList.add("active");
//     overlay.classList.add("active");
//     body.classList.add("menu-open");
//   }

//   // CLOSE MENU
//   function closeMenu() {
//     menu.classList.remove("active");
//     overlay.classList.remove("active");
//     body.classList.remove("menu-open");
//   }

//   // Toggle button
//   toggleBtn.addEventListener("click", function () {
//     if (menu.classList.contains("active")) {
//       closeMenu();
//     } else {
//       openMenu();
//     }
//   });

//   // Close when clicking overlay
//   overlay.addEventListener("click", closeMenu);

//   // Close when clicking any menu link (except dropdown parents)
//   document.querySelectorAll(".menus a").forEach((link) => {
//     link.addEventListener("click", function () {
//       if (window.innerWidth <= 991) {
//         closeMenu();
//       }
//     });
//   });

//   // Mobile dropdown toggle
//   document.addEventListener("DOMContentLoaded", function () {
//     const toggleBtn = document.querySelector(".menu-toggle");
//     const menu = document.querySelector(".menus");
//     const overlay = document.querySelector(".menu-overlay");
//     const body = document.body;
//     const dropdownItems = document.querySelectorAll(".menus > li");

//     function openMenu() {
//       menu.classList.add("active");
//       overlay.classList.add("active");
//       body.classList.add("menu-open");
//     }

//     function closeMenu() {
//       menu.classList.remove("active");
//       overlay.classList.remove("active");
//       body.classList.remove("menu-open");
//     }

//     toggleBtn.addEventListener("click", function () {
//       menu.classList.contains("active") ? closeMenu() : openMenu();
//     });

//     overlay.addEventListener("click", closeMenu);

//     document.querySelectorAll(".menus a").forEach((link) => {
//       link.addEventListener("click", function () {
//         if (window.innerWidth <= 991) {
//           closeMenu();
//         }
//       });
//     });

//     // âœ… FIXED DROPDOWN LOGIC
//     dropdownItems.forEach((item) => {
//       const submenu = item.querySelector(".dropdown-menu");
//       const link = item.querySelector("a");

//       if (submenu) {
//         link.addEventListener("click", function (e) {
//           if (window.innerWidth <= 991) {
//             // If dropdown not open â†’ open it
//             if (!item.classList.contains("active")) {
//               e.preventDefault(); // prevent redirect first time
//               item.classList.add("active");
//             }
//             // If already open â†’ allow redirect
//           }
//         });
//       }
//     });
//   });
// });

// member directory

const filterBtn = document.querySelector(".mobile-filter-btn");
const filterBox = document.querySelector(".members-filter");
const overlay = document.querySelector(".filter-overlay");

if (filterBtn && filterBox && overlay) {
  filterBtn.addEventListener("click", function () {
    filterBox.classList.add("active");
    overlay.classList.add("active");
  });

  overlay.addEventListener("click", function () {
    filterBox.classList.remove("active");
    overlay.classList.remove("active");
  });
}



(function () {
  'use strict';

  /* â”€â”€ DOM refs â”€â”€ */
  const iconBtn = document.getElementById('mfbIconBtn');
  const badge = document.getElementById('mfbBadge');
  const tagsRow = document.getElementById('mfbTagsRow');
  const tagsScroll = document.getElementById('mfbTagsScroll');
  const clearBtn = document.getElementById('mfbClearBtn');
  const resultsText = document.getElementById('mfbResultsText');
  const resultCount = document.getElementById('mfbResultCount');
  const scrollLeft = document.getElementById('mfbScrollLeft');
  const scrollRight = document.getElementById('mfbScrollRight');
  const overlay = document.getElementById('mfbOverlay');
  const drawer = document.getElementById('mfbDrawer');
  const drawerClose = document.getElementById('mfbDrawerClose');
  const applyBtn = document.getElementById('mfbApplyBtn');
  const allChecks = document.querySelectorAll('.mfb-filter-check');

  /* â”€â”€ Active filters state: Map of label â†’ checked bool â”€â”€ */
  let activeFilters = new Map();

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     DRAWER OPEN / CLOSE
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  function openDrawer() {
    overlay.classList.add('show');
    drawer.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    drawer.classList.remove('open');
    overlay.classList.remove('show');
    document.body.style.overflow = '';
  }

  iconBtn.addEventListener('click', openDrawer);
  drawerClose.addEventListener('click', closeDrawer);
  overlay.addEventListener('click', closeDrawer);

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     RENDER TAGS IN THE BAR
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  function renderTags() {
    tagsScroll.innerHTML = '';

    activeFilters.forEach((checked, label) => {
      const tag = document.createElement('label');
      tag.className = 'mfb-tag' + (checked ? ' active' : '');
      tag.title = label;

      const cb = document.createElement('input');
      cb.type = 'checkbox';
      cb.className = 'mfb-tag-checkbox';
      cb.checked = checked;

      cb.addEventListener('change', () => {
        activeFilters.set(label, cb.checked);
        tag.classList.toggle('active', cb.checked);
        // sync back to drawer checkbox
        const drawerCb = [...allChecks].find(c => c.dataset.label === label);
        if (drawerCb) drawerCb.checked = cb.checked;
        updateResultsText();
        updateBadge();
      });

      const text = document.createElement('span');
      text.textContent = label;

      tag.appendChild(cb);
      tag.appendChild(text);
      tagsScroll.appendChild(tag);
    });
  }

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     RESULTS TEXT
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  function updateResultsText() {
    const active = [...activeFilters.values()].filter(Boolean);
    if (active.length > 0) {
      /* In production replace this with your real member count */
      const fakeCount = Math.max(1, 48 - active.length * 6);
      resultCount.textContent = fakeCount + ' members';
      resultsText.classList.add('show');
    } else {
      resultsText.classList.remove('show');
    }
  }

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     BADGE
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  function updateBadge() {
    const count = [...activeFilters.values()].filter(Boolean).length;
    if (count > 0) {
      badge.textContent = count < 10 ? '0' + count : count;
      badge.classList.add('show');
    } else {
      badge.classList.remove('show');
    }
  }

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     APPLY FILTERS (from drawer)
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  applyBtn.addEventListener('click', () => {
    activeFilters.clear();
    allChecks.forEach(cb => {
      if (cb.checked) activeFilters.set(cb.dataset.label, true);
    });

    if (activeFilters.size > 0) {
      renderTags();
      tagsRow.classList.add('show');
    } else {
      tagsRow.classList.remove('show');
    }

    updateBadge();
    updateResultsText();
    closeDrawer();
  });

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     CLEAR ALL FILTERS
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  function clearAll() {
    activeFilters.clear();
    allChecks.forEach(cb => { cb.checked = false; });
    tagsScroll.innerHTML = '';
    tagsRow.classList.remove('show');
    resultsText.classList.remove('show');
    badge.classList.remove('show');
    /* Fire your filter reset callback here */
    // onFiltersChanged([]);
  }

  clearBtn.addEventListener('click', clearAll);

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     SCROLL ARROWS
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  scrollLeft.addEventListener('click', () => {
    tagsScroll.scrollBy({ left: -110, behavior: 'smooth' });
  });
  scrollRight.addEventListener('click', () => {
    tagsScroll.scrollBy({ left: 110, behavior: 'smooth' });
  });

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     SEARCH INPUT (live filter on member grid)
     Wire this to your existing search logic
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  const searchInput = document.getElementById('mfbSearchInput');
  searchInput.addEventListener('input', () => {
    const q = searchInput.value.trim();
    /* Call your existing search handler, e.g.: filterMembersByName(q); */
    console.log('Search:', q);
  });

  /* â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€
     SWIPE-TO-CLOSE DRAWER (touch)
  â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€â”€ */
  let touchStartY = 0;
  drawer.addEventListener('touchstart', e => {
    touchStartY = e.touches[0].clientY;
  }, { passive: true });
  drawer.addEventListener('touchmove', e => {
    const dy = e.touches[0].clientY - touchStartY;
    if (dy > 60) closeDrawer();
  }, { passive: true });

})();















