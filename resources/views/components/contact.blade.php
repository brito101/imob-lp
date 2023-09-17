@if ($errors->any())
    <x-adminlte-card theme="warning" title="Atenção" icon="fas fa-lg fa-exclamation-triangle" removable>
        @foreach ($errors->all() as $error)
            <span class="d-block">{{ $error }}</span>
        @endforeach
    </x-adminlte-card>
@endif

@if (session('success'))
    <x-adminlte-card theme="success" title="Obrigado!">
        {{ session('success') }}
    </x-adminlte-card>
@endif

@if (session('error'))
    <x-adminlte-card theme="danger" title="Erro">
        {{ session('error') }}
    </x-adminlte-card>
@endif
