<section id="benefits" class=" position-relative  py-5">
    <div class="testimonial-pattern-overlay pattern-left position-absolute d-none d-md-block">
        <img src="{{ asset('img/benefits-left.png') }}" alt="pattern" width="355" height="295">
    </div>
    <div class="testimonial-pattern-overlay pattern-right position-absolute d-none d-md-block">
        <img src="{{ asset('img/benefits-right.png') }}" alt="pattern" width="272"
            height="238">
    </div>

    <div class="container py-5">
        <div class="row align-items-center py-5">
            <div class=" col-md-6 pe-md-5">
                @if ($page->benefits_video)
                    <iframe width="640" height="360" src="{{ $page->benefits_video }}" title="YouTube video player"
                        frameborder="0" allowfullscreen="1"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        style="max-width: 100%;" data-gtm-yt-inspected-11="true" frameborder="0"></iframe>
                @endif
            </div>
            <div class="col-md-6 px-4 py-5 pl-md-2 text-white">
                {!! $page->benefits_text !!}
            </div>
        </div>
    </div>
</section>
