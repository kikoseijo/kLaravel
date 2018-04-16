<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@includeIf('parts.hiddenCredits')
<!-- crud.blade.php -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($model_name)
            {{ title_case(str_plural($model_name)) }} |
        @endisset
        {{ config('app.name', 'Klaravel, by Sunnyface.com') }} | Admin area
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    @foreach (config('ksoft.module.crud.assets', []) as $useAssets)
       <link href="{{ asset($useAssets) }}" rel="stylesheet">
    @endforeach
    @stack('stylesheets')
    <script>
        window.Larapp = {!! json_encode([
            'csrfToken' => csrf_token(),
            'state' => ['user' => Auth::user()],
        ]) !!};
        @stack('js')
    </script>
</head>
<body class=" bg-white">
    <div id="app" class="crud-wrapper">
        @includeIf(config('ksoft.module.crud.header', 'klaravel::_parts.header'))
        <div class="album py-5 bg-light klara-content">
            @includeIf(config('ksoft.module.crud.errors', 'klaravel::ui.errors'))
            @yield('content')
        </div>
        @includeIf(config('ksoft.module.crud.footer', 'klaravel::_parts.footer'))
        @stack('modals')
        <notifications></notifications>
    </div>
    <!-- Scripts -->
    @if (app()->isLocal())
      <script src="{{ mix('js/app.js') }}"></script>
    @else
      <script src="{{ mix('js/manifest.js') }}"></script>
      <script src="{{ mix('js/vendor.js') }}"></script>
      <script src="{{ mix('js/app.js') }}"></script>
    @endif
    @stack('scripts')
    @include('klaravel::_kLara._parts._scripts')
</body>
</html>
