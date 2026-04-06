 <div class="row  mt-5 mb-5">

            <div class="col-lg-5">
                <h4 class="mb-3 section-title text-white">
                   {!! html_entity_decode($contact->newsletter_title ?? '') !!}
                </h4>
            </div>

            <div class="col-lg-7">
                <div class="footer-news-letter">
                    <div class="footer-news-flex d-flex align-items-start gap-3 mb-3">
                        <!-- <i class="bi bi-newspaper"></i> -->
                        <img src="{{ asset($contact->newsletter_image) }}" alt="">
                        <p class="m-0">{!! $contact->newsletter_description ?? '' !!}</p>
                    </div>
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                        <button type="submit" class="btn">
                            <i class="bi bi-megaphone"></i> Sign Up
                        </button>
                    </form>
                </div>
            </div>


        </div>