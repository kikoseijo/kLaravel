@php
    $d_route = config('ksoft.backend_dashboard_route_name');
    $dashboard_url = $d_route != '' ? route($d_route) : url('/').'" target="_blank';

    if ($admin_menu_location = config('ksoft.menu_admin_config_location')) {
        $admin_menu = config($admin_menu_location);
    }

    if ($settings_menu_location = config('ksoft.menu_settings_config_location')) {
        $settings_menu = config($settings_menu_location);
    }

@endphp
<nav class="navbar navbar-expand-sm navbar-dark bg-dark box-shadow">
  <div class="d-flex justify-content-between container">
    <a href="{!!$dashboard_url!!}" class="my-auto mr-4 brand-margin navbar-brand">
      <span>{{ config('app.name', 'Klaravel by Sunnyface.com')}}</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" />
    </button>
    @include('klaravel::_parts.header_menu', [
        'croute' => Route::currentRouteName(),
        'admin_menu' => $admin_menu ?: [],
        'settings_menu_enabled' => isset($settings_menu) && count($settings_menu)>0,
        'settings_menu' => [
            '<i class="far fa-cog"></i>' => $settings_menu ?? [],
        ],
    ])
  </div>
</nav>
