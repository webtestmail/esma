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
                    <form  id="newsletterForm"  class="d-flex gap-2">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">
                         <span class="error text-danger small position-absolute" style="bottom: -25px; left: 0;"></span>
                                <div class="spinner-border spinner-border-sm position-absolute loading" 
                                     style="right: 10px; top: 50%; transform: translateY(-50%); display: none; width: 1rem; height: 1rem;">
                                </div>
                        <button type="submit" class="btn">
                            <i class="bi bi-megaphone"></i>  <span class="signup-text">Subscribe</span>
                                <span class="success-text d-none">✓ Done!</span>
                        </button>
                    </form>
                       <div id="responseMsg" class="mt-3"></div>
                </div>
            </div>


        </div>