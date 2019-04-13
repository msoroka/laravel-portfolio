<div id="ms-nav">
    <div class="menu-brand">
        <p class="brand-name"><a href="{{ route('home') }}">msoroka.dev</a></p>
    </div>

    <div class="menu-wrap">
        <input type="checkbox" class="toggler">
        <div class="hamburger">
            <div></div>
        </div>
        <div class="menu">
            <div>
                <div>
                    <ul>
                        <li><a href="{{ route('home') }}">Homepage</a></li>
                        <li><a href="#">Skills</a></li>
                        <li><a href="#">Experience</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#"></a></li>
                        @if(Auth::check() ? Auth::user()->isAdmin() : false)
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @endif
                        @if(Auth::check())

                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('nav.logout') }}</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
