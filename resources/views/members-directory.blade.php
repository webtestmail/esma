@extends('layouts.MainLayouts')
@section('title', 'Members Directory')
@section('content')

 
<section class="inner-banner">
    <video autoplay muted loop playsinline class="hero-bg-video" style="height: 100%;">
        <source src="./images/banner-video.mp4" type="video/mp4">
    </video>
    <div class="inner-hero-overlay"></div>
    <div class="container">
        <div class="inner-content text-white">
            <ul class="c-breadcrumb wow fadeInUp">
                <li><a href="index.php">Home</a></li>
                <svg class="svg-icon svg-three-arrow">
                    <use href="images/icons/icons-sprite.svg#icon-three-arrow"></use>
                </svg>
                <li>Members Directory</li>
            </ul>
            <h1 class="inner-heading wow fadeInUp">
                Member <span>Directory</span>
            </h1>
            <p>This is the page excerpt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac est
                fermentum, euismod placerat.</p>
            <div class="scroll-div">
                <div class="line-1"></div>
                <div class="scroll-box flex-shrink-0 d-flex align-items-center gap-2" id="scrollDownBtn">
                    <svg class="svg-icon">
                        <use href="images/icons/icons-sprite.svg#icon-scrolldown"></use>
                    </svg>
                    <span>Scroll Down</span>
                </div>
                <div class="line-2"></div>
            </div>
        </div>
    </div>
</section>

<section class="py-100 memeber-directory-pg" id="nextSection">
    <div class="container">
       @livewire('member-directory')
    </div>
</section>

<script>
    document.querySelectorAll(".toggle-btn").forEach(btn => {

        btn.addEventListener("click", function () {

            const item = this.closest(".product-item");
            const sub = item.querySelector(".sub-products");

            if (!sub) return;

            if (sub.classList.contains("open")) {

                sub.style.maxHeight = sub.scrollHeight + "px";

                requestAnimationFrame(() => {
                    sub.style.maxHeight = "0px";
                });

                sub.classList.remove("open");
                this.textContent = "+";

            } else {

                sub.classList.add("open");
                sub.style.maxHeight = sub.scrollHeight + "px";

                this.textContent = "−";

            }

        });

    });
</script>


@endsection