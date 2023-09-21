<section id="services" class="my-5 pt-5">
    <div class="container pt-5">
        {!! $page->progress !!}
        <div class="row d-flex justify-content-center flex-wrap mt-4">
            <div class=" mt-4 col-md-6 col-lg-3">
                <div class="services-components text-center py-3 px-3">
                    <iconify-icon class="services-icon my-2" icon="mdi:hammer"></iconify-icon>
                    <h5 class="services-heading mb-3">Instalações</h5>
                    <span class="btn btn-primary service-btn mt-3" style="cursor: none;">{{ $page->installations }}
                        %</span>
                </div>
            </div>
            <div class=" mt-4 col-md-6 col-lg-3">
                <div class="services-components text-center py-3 px-3">
                    <iconify-icon class="services-icon my-2" icon="mdi:home-minus-outline"></iconify-icon>
                    <h5 class="services-heading mb-3">Fundação</h5>
                    <span class="btn btn-primary service-btn mt-3" style="cursor: none;">{{ $page->foundation }}
                        %</span>
                </div>
            </div>
            <div class=" mt-4 col-md-6 col-lg-3">
                <div class="services-components text-center py-3 px-3">
                    <iconify-icon class="services-icon my-2" icon="mdi:account-hard-hat-outline"></iconify-icon>
                    <h5 class="services-heading mb-3">Estrutura</h5>
                    <span class="btn btn-primary service-btn mt-3" style="cursor: none;">{{ $page->structure }} %</span>
                </div>
            </div>
            <div class=" mt-4 col-md-6 col-lg-3">
                <div class="services-components text-center py-3 px-3">
                    <iconify-icon class="services-icon my-2" icon="mdi:home-roof"></iconify-icon>
                    <h5 class="services-heading mb-3">Fachada</h5>
                    <span class="btn btn-primary service-btn mt-3" style="cursor: none;">{{ $page->front }} %</span>
                </div>
            </div>
            <div class=" mt-4 col-md-6 col-lg-3">
                <div class="services-components text-center py-3 px-3">
                    <iconify-icon class="services-icon my-2" icon="mdi:home-city"></iconify-icon>
                    <h5 class="services-heading mb-3">Acabamento</h5>
                    <span class="btn btn-primary service-btn mt-3" style="cursor: none;">{{ $page->finishing }} %</span>
                </div>
            </div>
        </div>
    </div>
</section>
