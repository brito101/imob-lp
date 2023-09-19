@extends('adminlte::page')

@section('title', '- Editar Página')
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

                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="col-12 col-md-6 form-group px-0 pr-md-2">
                                        <label for="benefits_video">Vídeo (link do Youtube)</label>

                                        <input type="text" class="form-control" id="benefits_video" placeholder="Link"
                                            name="benefits_video"
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
                                        <x-adminlte-text-editor name="conditions" label="Texto das condições (sexta dobra)"
                                            label-class="text-black" igroup-size="md" placeholder="Texto descritivo..."
                                            :config="$config_conditions">
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
