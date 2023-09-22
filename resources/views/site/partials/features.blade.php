<section id="features">
    <div class="container py-5">
        @if ($page->features)
            {!! $page->features !!}
            <div class="row align-items-center py-5 d-flex justify-content-center">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="col-12 col-md-8 ps-md-5">
                        @php
                            $items = ['three_rooms', 'court', 'pool', 'childreen_pool', 'playground', 'party_room', 'gourmet', 'security', 'green_area', 'commerce'];
                            $elements = [];
                            foreach ($items as $item) {
                                if ($page->$item == 1) {
                                    $elements[] = $item;
                                }
                            }
                        @endphp

                        <div id="carouselFeaturesIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($elements as $item)
                                    <button type="button" data-bs-target="#carouselFeaturesIndicators"
                                        data-bs-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->index == 0 ? 'active' : '' }}"
                                        aria-label="Slide {{ $loop->index }}"></button>
                                @endforeach
                            </div>

                            <div class="carousel-inner">
                                @foreach ($elements as $item)
                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('img/' . $item . '.png') }}" class="d-block w-100"
                                            alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselFeaturesIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselFeaturesIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>

                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="col-12 col-md-8 pt-5 text-center">
                        <img src="{{ asset('img/card.png') }}" alt="Cartão" title="Cartão">
                    </div>
                </div>
            </div>
        @endif
        @if ($page->headline)
            <div class="d-flex justify-content-center">
                <h2 class="col-12 col-md-6 text-center display-4" style="text-transform: inherit;">{{ $page->headline }}
                </h2>
            </div>
        @endif
        @if ($images->count() > 0)
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 px-2 py-5">
                    <div id="carouselImagesIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach ($images as $image)
                                <button type="button" data-bs-target="#carouselImagesIndicators"
                                    data-bs-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->index == 0 ? 'active' : '' }}"
                                    aria-label="Slide {{ $loop->index }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($images as $image)
                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                    <img src="{{ url('storage/page/slide/' . $image->photo) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImagesIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImagesIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        @else
            @php
                $images = ['1', '2', '3', '4', '5', '6', '7'];
            @endphp
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 px-2 py-5">
                    <div id="carouselImagesIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach ($images as $image)
                                <button type="button" data-bs-target="#carouselImagesIndicators"
                                    data-bs-slide-to="{{ $loop->index }}"
                                    class="{{ $loop->index == 0 ? 'active' : '' }}"
                                    aria-label="Slide {{ $loop->index }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($images as $image)
                            {{ $image }}
                                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('img/' . $image . '.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselImagesIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselImagesIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

        @endif
    </div>
</section>
