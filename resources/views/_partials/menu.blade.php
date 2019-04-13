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
                        <li><a href="#homepage">Homepage</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#others">Others</a></li>
                        <li><a href="#contact">Contact</a></li>
                        @if(Auth::check() ? Auth::user()->isAdmin() : false)
                            <li><a href="#"></a></li>
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
