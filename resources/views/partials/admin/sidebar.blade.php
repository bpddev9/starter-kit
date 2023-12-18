<div class="sidebar-user">
    <div class="d-flex justify-content-center">
        <div class="flex-grow-1 ps-2">
            <a class="sidebar-user-title" href="#">
                {{ request()->user()->name }}
            </a>
        </div>
    </div>
</div>


<ul class="sidebar-nav">
    <li class="sidebar-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.dashboard') }}'>
            <i class="align-middle" data-feather="codesandbox"></i> <span class="align-middle">Dasboard</span>
        </a>
    </li>

    <li class="sidebar-header">
        Game
    </li>

    <li class="sidebar-item {{ Route::is('admin.game') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.game') }}'>
            <i class="align-middle" data-feather="target"></i> <span class="align-middle">Games</span>
        </a>
    </li>

    <li class="sidebar-item {{ Route::is('admin.value') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.value') }}'>
            <i class="align-middle" data-feather="key"></i> <span class="align-middle">Values</span>
        </a>
    </li>

    <li class="sidebar-item {{ Route::is('admin.promocode') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.promocode') }}'>
            <i class="align-middle" data-feather="smartphone"></i> <span class="align-middle">Promocodes</span>
        </a>
    </li>

    <li class="sidebar-item {{ Route::is('admin.ticket') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.ticket') }}'>
            <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Tickets</span>
        </a>
    </li>

    <li class="sidebar-item {{ Route::is('admin.winner') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.winner') }}'>
            <i class="align-middle" data-feather="smile"></i> <span class="align-middle">Winners</span>
        </a>
    </li>

    <li class="sidebar-header">
        Section
    </li>

    <li class="sidebar-item {{ Route::is('admin.faq') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.faq') }}'>
            <i class="align-middle" data-feather="help-circle"></i> <span class="align-middle">FAQ</span>
        </a>
    </li>

    <li class="sidebar-item {{ Route::is('admin.rule') ? 'active' : '' }}">
        <a class='sidebar-link' href='{{ route('admin.rule') }}'>
            <i class="align-middle" data-feather="server"></i> <span class="align-middle">Rule</span>
        </a>
    </li>

    <li class="sidebar-item {{ Route::is('admin.setting*') ? 'active' : '' }}">
        <a class="sidebar-link {{ Route::is('admin.setting*') ? '' : 'collapsed' }}" data-bs-target="#notesss" data-bs-toggle="collapse">
            <i class="align-middle" data-feather="tool"></i> <span class="align-middle">Setting</span>
        </a>
        <ul class="sidebar-dropdown list-unstyled {{ Route::is('admin.setting*') ? 'show' : '' }} collapse" id="notesss" data-bs-parent="#sidebar">
            <li class="sidebar-item {{ Route::is('admin.setting.app') ? 'active' : '' }}">
                <a class='sidebar-link' href='{{ route('admin.setting.app') }}'>App Setting</a>
            </li>
            <li class="sidebar-item {{ Route::is('admin.setting.game') ? 'active' : '' }}">
                <a class='sidebar-link' href='{{ route('admin.setting.game') }}'>Game Setting</a>
            </li>
        </ul>
    </li>
</ul>