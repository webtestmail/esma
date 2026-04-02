@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    <!-- Pricing Section -->
    <section class="pricing-section py-5 bg-black text-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="web-title">{{ $page->page_headline }}</h2>
                <p class="web-para">
                    {!! strip_tags(htmlspecialchars_decode($page->description)) !!}
                </p>
            </div>

            @if ($data['plans']->isNotEmpty())
                <div class="row g-4">

                    @php $delay = 100; @endphp
                    @foreach ($data['plans'] as $plan)
                        <!-- Starter Plan -->
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                            <div class="pricing-card{{ $plan->plan_category == 'most_popular' ? ' featured' : '' }}">
                                @if ($plan->name == 'professional')
                                    <div class="pricing-badge">Most Popular</div>
                                @endif
                                <h3>{{ ucfirst($plan->name) }}</h3>
                                
                                @php
                                    $plan_price = $plan->price;
                                    $plan_price_base = $plan->plan_price_base == 'month' ? 'Month' : 'Year';
                                    $yearly_plan_price = $plan_price * 12;
                                @endphp
                                <div class="price" data-monthly="{{ $plan_price }}"
                                    data-yearly="{{ $yearly_plan_price }}">₹{{ number_format($plan_price,0) }}<span>/
                                        {{ $plan_price_base }}</span></div>
                                <div class="price-note">Billed
                                    {{ $plan->plan_price_base == 'month' ? 'Monthly' : 'Yearly' }}</div>
                                    <ul>
                                @foreach($plan->features as $feature)
                                <li><i class="fas fa-check"></i>{{ $feature->name }}</li>
                                @endforeach
                                  </ul>
                                 @guest 
                                <a href="{{ url('/login') }}" class="btn btn-custom">{{ $plan->button_name }}</a>
                                @else
                                <button class="btn-custom">{{ $plan->button_name }}</button>
                                @endguest
                            </div>
                        </div>
                        @php $delay += 100; @endphp
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @php
        $pricing_section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(9);
    @endphp
    @if ($pricing_section_one)
        <!-- FAQ Section -->
        <section class="pricing-faq py-5">
            <div class="container">
                <h2 class="web-title" data-aos="fade-up">{{ $pricing_section_one->section_headline }}</h2>
                @php
                    $pricing_faqs = resolve(App\Http\Controllers\Admin\FaqsController::class)->getAllFaqs(
                        'pricing_page',
                    );
                @endphp
                @if ($pricing_faqs->isNotEmpty())
                    <div class="faq-grid">
                        @php $faq_delay = 100; @endphp
                        @foreach ($pricing_faqs as $pricing_faq)
                            <div class="faq-card" data-aos="fade-up" data-aos-delay="{{ $faq_delay }}">
                                <h5>{{ $pricing_faq->question }}</h5>
                                {!! htmlspecialchars_decode($pricing_faq->answer) !!}
                            </div>
                            @php $faq_delay += 100; @endphp
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @include('components.cta')
@endsection

@push('page-js')
    <script>
        // Pricing Toggle
        const pricingToggle = document.getElementById('pricingToggle');
        const priceElements = document.querySelectorAll('.price');
        const priceNotes = document.querySelectorAll('.price-note');
        let isYearly = false;

        pricingToggle.addEventListener('click', function() {
            isYearly = !isYearly;
            this.classList.toggle('active');

            priceElements.forEach((priceEl, index) => {
                const monthlyPrice = priceEl.getAttribute('data-monthly');
                const yearlyPrice = priceEl.getAttribute('data-yearly');

                if (isYearly) {
                    const yearlyMonthly = Math.floor(yearlyPrice / 12);
                    priceEl.innerHTML = `$${yearlyMonthly} <span>/month</span>`;
                    priceNotes[index].textContent = `$${yearlyPrice} billed annually`;
                } else {
                    priceEl.innerHTML = `$${monthlyPrice} <span>/month</span>`;
                    priceNotes[index].textContent = 'Billed monthly';
                }
            });
        });

        // Pricing card animations
        document.querySelectorAll('.pricing-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                if (this.classList.contains('featured')) {
                    this.style.transform = 'scale(1.05)';
                } else {
                    this.style.transform = 'translateY(0) scale(1)';
                }
            });
        });

        // Button click effects
        document.querySelectorAll('.btn-custom').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();

                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255,255,255,0.3)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.pointerEvents = 'none';

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);

                // Simulate action
                if (this.textContent === 'Contact Sales') {
                    window.location.href = '/contact';
                } else {
                    alert('Redirecting to signup page...');
                }
            });
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                transform: scale(2);
                opacity: 0;
                }
            }
            .btn-custom {
                position: relative;
                overflow: hidden;
            }
        `;
        document.head.appendChild(style);
    </script>
@endpush
