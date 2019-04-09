<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('admin.dashboard') }}"> {{ __('nav.brand') }} -
        Dashboard</a>
    <button class="navbar-toggler d-xl-none d-lg-none d-md-block" type="button" data-toggle="collapse"
            data-target="#sideMenu"
            aria-controls="sideMenu" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3 ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span data-feather="log-out"></span> {{ __('nav.logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
