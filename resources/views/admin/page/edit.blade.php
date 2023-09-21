@extends('adminlte::page')

@section('title', '- Editar Página')
@section('plugins.BootstrapSwitch', true)
@section('plugins.KrajeeFileinput', true)
@section('plugins.Summernote', true)


@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-fw fa-file"></i> Editar Página</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Editar Página</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    @include('components.alert')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dados Cadastrais da Página</h3>
                        </div>

                        <form method="POST" action="{{ route('admin.page.update', ['page' => $page->id]) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="card-body">

                                @php
                                    $config_header = [
                                        'allowedFileTypes' => ['image'],
                                        'browseOnZoneClick' => true,
                                        'theme' => 'explorer-fa5',
                                    ];
                                    
                                    $config_footer = [
                                        'allowedFileTypes' => ['image'],
                                        'browseOnZoneClick' => true,
                                        'theme' => 'explorer-fa5',
                                    ];
                                    
                                    if ($page->logo_header) {
                                        $image = url('storage/page/' . $page->logo_header);
                                        $config_header = [
                                            'allowedFileTypes' => ['image'],
                                            'browseOnZoneClick' => true,
                                            'theme' => 'explorer-fa5',
                                            'initialPreview' => "<img src='{$image}' class='file-preview-image' alt='Desert' title='Desert'>",
                                        ];
                                    }
                                    
                                    if ($page->logo_footer) {
                                        $image = url('storage/page/' . $page->logo_footer);
                                        $config_footer = [
                                            'allowedFileTypes' => ['image'],
                                            'browseOnZoneClick' => true,
                                            'theme' => 'explorer-fa5',
                                            'initialPreview' => "<img src='{$image}' class='file-preview-image' alt='Desert' title='Desert'>",
                                        ];
                                    }
                                    
                                @endphp

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2" style="max-height: 400px">
                                        <x-adminlte-input-file-krajee name="logo_header" label="Logo do Header"
                                            preset-mode="avatar" :config="$config_header" data-show-cancel="false"
                                            data-show-close="false" />

                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2" style="max-height: 400px">
                                        <x-adminlte-input-file-krajee name="logo_footer" label="Logo do Footer"
                                            preset-mode="avatar" :config="$config_footer" data-show-cancel="false"
                                            data-show-close="false" />

                                    </div>
                                </div>

                                @php
                                    $config_hero_text = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['fontsize', ['fontsize']],
                                            ['fontname', ['fontname']],
                                            ['color', ['color']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                        'inheritPlaceholder' => true,
                                    ];
                                @endphp
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0 mb-0">
                                        <x-adminlte-text-editor name="hero_text" label="Texto da Hero (primeira dobra)"
                                            label-class="text-black" igroup-size="md" placeholder="Texto descritivo..."
                                            :config="$config_hero_text">
                                            {!! old('hero_text') ?? $page->hero_text !!}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                @php
                                    $config_benefits_text = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['fontsize', ['fontsize']],
                                            ['fontname', ['fontname']],
                                            ['color', ['color']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                        'inheritPlaceholder' => true,
                                    ];
                                @endphp
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0 mb-0">
                                        <x-adminlte-text-editor name="benefits_text"
                                            label="Texto dos benefícios (segunda dobra)" label-class="text-black"
                                            igroup-size="md" placeholder="Texto descritivo..." :config="$config_benefits_text">
                                            {!! old('benefits_text') ?? $page->benefits_text !!}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>


                                @php
                                    $config_features = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['fontsize', ['fontsize']],
                                            ['fontname', ['fontname']],
                                            ['color', ['color']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                        'inheritPlaceholder' => true,
                                    ];
                                @endphp
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0 mb-0">
                                        <x-adminlte-text-editor name="features"
                                            label="Continuação dos benefícios (terceira dobra)" label-class="text-black"
                                            igroup-size="md" placeholder="Texto descritivo..." :config="$config_features">
                                            {!! old('features') ?? $page->features !!}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-start flex-wrap">
                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">2 Quartos com suíte</label>
                                        @if ($page->two_rooms == 1)
                                            <x-adminlte-input-switch name="two_rooms" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="two_rooms" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">3 Quartos com suíte</label>
                                        @if ($page->three_rooms == 1)
                                            <x-adminlte-input-switch name="three_rooms" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="three_rooms" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Quadra Poliesportiva</label>
                                        @if ($page->court == 1)
                                            <x-adminlte-input-switch name="court" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="court" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Piscina Adulto</label>
                                        @if ($page->pool == 1)
                                            <x-adminlte-input-switch name="pool" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="pool" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Piscina Infantil</label>
                                        @if ($page->childreen_pool == 1)
                                            <x-adminlte-input-switch name="childreen_pool" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="childreen_pool" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Playground</label>
                                        @if ($page->playground == 1)
                                            <x-adminlte-input-switch name="playground" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="playground" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Salão de Festas</label>
                                        @if ($page->party_room == 1)
                                            <x-adminlte-input-switch name="party_room" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="party_room" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Área Gourmet</label>
                                        @if ($page->gourmet == 1)
                                            <x-adminlte-input-switch name="gourmet" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="gourmet" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Segurança 24h</label>
                                        @if ($page->security == 1)
                                            <x-adminlte-input-switch name="security" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="security" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Área verde</label>
                                        @if ($page->green_area == 1)
                                            <x-adminlte-input-switch name="green_area" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="green_area" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-2 form-group px-0 px-md-2">
                                        <label class="align-self-center mr-2">Comércio</label>
                                        @if ($page->commerce == 1)
                                            <x-adminlte-input-switch name="commerce" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support checked />
                                        @else
                                            <x-adminlte-input-switch name="commerce" data-on-color="success"
                                                data-off-color="danger" data-on-text="Sim" data-off-text="Não"
                                                enable-old-support />
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="benefits_video">Vídeo (link do Youtube)</label>

                                        <input type="text" class="form-control" id="benefits_video"
                                            placeholder="Link" name="benefits_video"
                                            value="{{ old('benefits_video') ?? $page->benefits_video }}">

                                        @if ($page->benefits_video)
                                            <div class="d-flex justify-content-center mt-2">
                                                <iframe class="embed-responsive-item rounded"
                                                    src="{{ $page->benefits_video }}" title="YouTube video player"
                                                    frameborder="0" title="Vídeo" width="640" height="360"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="map">Mapa (link do Google Maps)</label>

                                        <input type="text" class="form-control" id="map" placeholder="Link"
                                            name="map" value="{{ old('map') ?? $page->map }}">

                                        @if ($page->map)
                                            <div class="d-flex justify-content-center mt-2">
                                                <iframe src="{{ $page->map }}" width="640" height="360"
                                                    style="border:0;" allowfullscreen="" loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"
                                                    data-gtm-yt-inspected-8="true"></iframe>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @php
                                    $config_conditions = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['fontsize', ['fontsize']],
                                            ['fontname', ['fontname']],
                                            ['color', ['color']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                        'inheritPlaceholder' => true,
                                    ];
                                @endphp
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0 mb-0">
                                        <x-adminlte-text-editor name="conditions"
                                            label="Texto das condições (sexta dobra)" label-class="text-black"
                                            igroup-size="md" placeholder="Texto descritivo..." :config="$config_conditions">
                                            {!! old('conditions') ?? $page->conditions !!}
                                        </x-adminlte-text-editor>
                                    </div>
                                </div>

                                @php
                                    $config_tour = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['fontsize', ['fontsize']],
                                            ['fontname', ['fontname']],
                                            ['color', ['color']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                        'inheritPlaceholder' => true,
                                    ];
                                @endphp
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0 mb-0">
                                        <x-adminlte-text-editor name="tour" label="Texto da seção tour (quarta dobra)"
                                            label-class="text-black" igroup-size="md" placeholder="Texto descritivo..."
                                            :config="$config_tour">
                                            {!! old('tour') ?? $page->tour !!}
                                        </x-adminlte-text-editor>
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="link_tour">Link para o Tour</label>
                                        <input type="text" class="form-control" id="link_tour" placeholder="Link"
                                            name="link_tour" value="{{ old('link_tour') ?? $page->link_tour }}">
                                    </div>
                                </div>

                                @php
                                    $config_progress = [
                                        'height' => '100',
                                        'toolbar' => [
                                            // [groupName, [list of button]]
                                            ['style', ['style']],
                                            ['font', ['bold', 'underline', 'clear']],
                                            ['fontsize', ['fontsize']],
                                            ['fontname', ['fontname']],
                                            ['color', ['color']],
                                            ['view', ['fullscreen', 'codeview', 'help']],
                                        ],
                                        'inheritPlaceholder' => true,
                                    ];
                                @endphp
                                <div class="d-flex flex-wrap justify-content-start">
                                    <div class="col-12 form-group px-0 mb-0">
                                        <x-adminlte-text-editor name="progress"
                                            label="Texto da seção progresso (sétima dobra)" label-class="text-black"
                                            igroup-size="md" placeholder="Texto descritivo..." :config="$config_progress">
                                            {!! old('progress') ?? $page->progress !!}
                                        </x-adminlte-text-editor>
                                    </div>

                                    <div class="col-12 col-md-1 form-group px-0 pr-md-2">
                                        <label for="installations">Instalações</label></label>
                                        <input type="number" min="0" max="100" class="form-control"
                                            id="installations" placeholder="Valor inteiro" name="installations"
                                            value="{{ old('installations') ?? $page->installations }}">
                                    </div>

                                    <div class="col-12 col-md-1 form-group px-0 pr-md-2">
                                        <label for="foundation">Fundação</label></label>
                                        <input type="number" min="0" max="100" class="form-control"
                                            id="foundation" placeholder="Valor inteiro" name="foundation"
                                            value="{{ old('foundation') ?? $page->foundation }}">
                                    </div>

                                    <div class="col-12 col-md-1 form-group px-0 pr-md-2">
                                        <label for="structure">Estrutura</label></label>
                                        <input type="number" min="0" max="100" class="form-control"
                                            id="structure" placeholder="Valor inteiro" name="structure"
                                            value="{{ old('structure') ?? $page->structure }}">
                                    </div>

                                    <div class="col-12 col-md-1 form-group px-0 pr-md-2">
                                        <label for="front">Fachada</label></label>
                                        <input type="number" min="0" max="100" class="form-control"
                                            id="front" placeholder="Valor inteiro" name="front"
                                            value="{{ old('front') ?? $page->front }}">
                                    </div>

                                    <div class="col-12 col-md-1 form-group px-0 pr-md-2">
                                        <label for="finishing">Acabamento</label></label>
                                        <input type="number" min="0" max="100" class="form-control"
                                            id="finishing" placeholder="Valor inteiro" name="finishing"
                                            value="{{ old('finishing') ?? $page->finishing }}">
                                    </div>
                                </div>



                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 form-group px-0">
                                        <label for="address">Endereço</label>
                                        <input type="text" class="form-control" id="address" placeholder="Endereço"
                                            name="address" value="{{ old('address') ?? $page->address }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="phone">Telefone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Telefone"
                                            name="phone" value="{{ old('phone') ?? $page->phone }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" placeholder="E-mail"
                                            name="email" value="{{ old('email') ?? $page->email }}">
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" id="facebook"
                                            placeholder="Página no Facebook" name="facebook"
                                            value="{{ old('facebook') ?? $page->facebook }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" id="twitter"
                                            placeholder="Página no Twitter" name="twitter"
                                            value="{{ old('twitter') ?? $page->twitter }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" id="instagram"
                                            placeholder="Página no Instgram" name="instagram"
                                            value="{{ old('instagram') ?? $page->instagram }}">
                                    </div>

                                    <div class="col-12 col-md-6 form-group px-0 pl-md-2">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" class="form-control" id="youtube"
                                            placeholder="Página no Youtube" name="twitter"
                                            value="{{ old('youtube') ?? $page->youtube }}">
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
