<section id="hero" class="position-relative overflow-hidden py-4" style="background: url(img/hero.jpg);">
    <div class="container py-5 mt-5">
        <div class="row align-items-center py-5 mt-5">
            <div class="col-md-6 mb-5 mb-md-0">
                <div id="hero_text" class="text-white">
                    {!! $page->hero_text !!}
                </div>
            </div>
            <div class=" col-md-5 offset-md-1">
                <form class="hero-form p-5" action="{{ route('site.contact') }}" method="POST">
                    @csrf
                    <h3 class="text-orange">Gostaria de conhecer?</h3>
                    <div class="mb-4">
                        <label for="name" class="form-label mb-0">Nome</label>
                        <input type="test" class="form-control border-0" id="name" name="name" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label mb-0">Email</label>
                        <input type="email" class="form-control border-0" id="email" name="email" required
                            value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="cell" class="form-label mb-0">Telefone</label>
                        <input type="text" class="form-control border-0" id="cell" name="phone" required
                            value="{{ old('phone') }}">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Quero agendar uma visita</button>
                    </div>

                    @include('components.contact')
                </form>

            </div>
        </div>
    </div>
</section>
