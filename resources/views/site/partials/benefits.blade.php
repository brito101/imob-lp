<section id="benefits" class=" position-relative  py-5">
    <div class="testimonial-pattern-overlay pattern-left position-absolute d-none d-md-block">
        <img src="{{ asset('img/benefits-left.png') }}" alt="pattern">
    </div>
    <div class="testimonial-pattern-overlay pattern-right position-absolute d-none d-md-block">
        <img src="{{ asset('img/benefits-right.png') }}" alt="pattern">
    </div>

    <div class="container py-5">
        <div class="row align-items-center py-5">
            <div class=" col-md-6 pe-md-5">
                @if ($page->benefits_video)
                    <iframe class="elementor-video" frameborder="0" allowfullscreen="1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        title="O que é felicidade para você? - Felicittà Barra" width="640" height="360"
                        src="{{ $page->benefits_video }}" id="widget2" data-gtm-yt-inspected-11="true" style="max-width: 100%;"></iframe>
                @endif
            </div>
            <div class="col-md-6 px-4 py-5 pl-md-2 text-white">
                {!! $page->benefits_text !!}
            </div>
        </div>
    </div>
</section>
