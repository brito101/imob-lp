<section id="tour" class="position-relative">
    <div class="cta-pattern-overlay pattern-left position-absolute top-50 start-0 translate-middle-y">
        <img src="{{ asset('img/tour-pattern.png') }}" alt="pattern" width="292" height="269">
    </div>
    <div class="container py-5">
        <div class="row align-items-center my-5">
            <div class="col-md-6 offset-md-2 text-white">
                {!! $page->tour !!}
            </div>
            @if ($page->link_tour)
                <div class="col-md-3 d-flex flex-wrap justify-content-center">
                    <img src="{{ asset('img/tour.png') }}" alt="pattern" class="pb-2 d-none d-md-block w-100" width="306" height="314">
                    <a href="{{ $page->link_tour }}" target="_blank" title="Tour Virtual"
                        class="btn btn-primary cta-button">Faça um tour virtual</a>
                </div>
            @endif
        </div>
    </div>
</section>
