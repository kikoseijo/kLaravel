<!-- klaravel::_parts.menu.user_dropdown -->
@component('klaravel::ui.dropdown', [
    'title' => '<i class="far fa-user-circle"></i> ',
    'active' => 'ksoft' == $preroute || str_contains($croute, ['kSessions', 'kLogs', 'kCache', 'kBackup'])
])
    @if (config('ksoft.enable_plugins_menu'))
        <a href="{{ route('ksoft.plugins.index') }}" class="dropdown-item{{ str_contains($croute, 'ksoft.plugins.index') ? ' active' : '' }}">Install plugin</a>
    @endif
    @if (config('ksoft.module.activity_log.enabled'))
        <a href="{{ route('kLogs.index') }}" class="dropdown-item{{ str_contains($croute, 'kLogs') ? ' active' : '' }}">Activity Logs</a>
    @endif
    @if (config('ksoft.module.sessions.enabled'))
        <a href="{{ route('kSessions.index') }}" class="dropdown-item{{ str_contains($croute, 'kSessions') ? ' active' : '' }}">DB Sessions</a>
    @endif
    @if (config('ksoft.module.caches.enabled'))
        <a href="{{ route('kCache.index') }}" class="dropdown-item{{ str_contains($croute, 'kCache') ? ' active' : '' }}">DB Cache</a>
    @endif
    @if (config('ksoft.module.backup.enabled'))
        <a href="{{ route('kBackup.index') }}" class="dropdown-item{{ str_contains($croute, 'kBackup') ? ' active' : '' }}">Backups</a>
    @endif
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout&nbsp;&nbsp;&nbsp;<span class="text-danger"><i class="far fa-sign-out-alt"></i></span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endcomponent
