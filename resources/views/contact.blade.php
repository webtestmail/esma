@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-5 align-items-start">

                <!-- Contact Form -->
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="web-title mb-4">{{ $page->page_headline }}</h2>
                    <div class="contact-form">
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="Your Email"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" class="form-control" placeholder="Your Phone">
                                </div>
                                <div class="col-md-6">
                                    <label for="service">Service Interested</label>
                                    <select id="service" class="form-control">
                                        <option value="">Select Service</option>
                                        <option value="influencer-marketing">Influencer Marketing</option>
                                        <option value="content-creation">Content Creation</option>
                                        <option value="analytics">Analytics & Insights</option>
                                        <option value="community-management">Community Management</option>
                                        <option value="training">Training & Workshops</option>
                                        <option value="consulting">Brand Consulting</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <textarea id="message" class="form-control" rows="6" placeholder="Tell us about your project..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-accent">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Info Cards -->
                <div class="col-lg-4" data-aos="fade-left">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="info-card">
                                <div class="icon-wrapper">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h5>Our Location</h5>
                                {!! htmlspecialchars_decode($data['company']->location) !!}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-card">
                                <div class="icon-wrapper">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <h5>E-Mail Us</h5>
                                <p>
                                    {{ $data['company']->email }}
                                    @if (!empty($data['company']->alternate_email))
                                        <br>{{ $data['company']->alternate_email }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-card">
                                <div class="icon-wrapper">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <h5>Call Us</h5>
                                <p>
                                    {{ $data['company']->phone }}
                                    @if (!empty($data['company']->alternate_phone))
                                        <br>{{ $data['company']->alternate_phone }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @if (isset($data['company']->map_link_visibility) && $data['company']->map_link_visibility == 'yes')
                <!-- Map -->
                <div class="map-container" data-aos="fade-up">
                    <iframe src="{{ $data['company']->map_link }}" allowfullscreen="" loading="lazy"></iframe>
                </div>
            @endif
        </div>
    </section>

    @php
        $contact_section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(13);
    @endphp
    @if ($contact_section_one)
        <!-- Contact Methods -->
        <section class="contact-methods">
            <div class="container">
                <h2 class="web-title" data-aos="fade-up">{{ $contact_section_one->section_headline }}</h2>
                @if ($contact_section_one->sub_sections->isNotEmpty())
                    <div class="row g-4">
                        @foreach ($contact_section_one->sub_sections as $sub_section)
                            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="method-card">
                                    <div class="icon">
                                        {!! $sub_section->section_icon !!}
                                    </div>
                                    <h5>{{ $sub_section->section_headline }}</h5>
                                    {!! htmlspecialchars_decode($sub_section->description) !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @php
        $contact_section_two = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(16);
    @endphp
    @if ($contact_section_two)
        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <h2 class="web-title" data-aos="fade-up">{{ $contact_section_two->section_headline }}</h2>
                @php
                    $contact_faqs = resolve(App\Http\Controllers\Admin\FaqsController::class)->getAllFaqs(
                        'contact_page',
                    );
                @endphp
                @if ($contact_faqs->isNotEmpty())
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            @php $faq_delay = 100; @endphp
                            @foreach ($contact_faqs as $contact_faq)
                                <div class="faq-item" data-aos="fade-up" data-aos-delay="{{ $faq_delay }}">
                                    <div class="faq-question">
                                        <span>{{ $contact_faq->question }}</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div class="faq-answer">
                                        {!! htmlspecialchars_decode($contact_faq->answer) !!}
                                    </div>
                                </div>
                                @php $faq_delay += 100; @endphp
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif
@endsection

@push('page-js')
    <script>
        // FAQ Toggle
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', function() {
                const faqItem = this.parentElement;
                const answer = faqItem.querySelector('.faq-answer');

                // Close all other FAQs
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (item !== faqItem) {
                        item.querySelector('.faq-question').classList.remove('active');
                        item.querySelector('.faq-answer').classList.remove('active');
                    }
                });

                // Toggle current FAQ
                this.classList.toggle('active');
                answer.classList.toggle('active');
            });
        });
    </script>
@endpush
