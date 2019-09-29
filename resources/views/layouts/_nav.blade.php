<div class="flex flex-end content-right mr-20">
    <a href="{{ route('articles.index') }}"><h2 class="grey normal logout mr-20">{{ __('Articles') }}</h2></a>
    <a href="{{ route('home') }}"><h2 class="grey normal logout mr-20">{{ __('Dashboard') }}</h2></a>

    <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
        <h2 class="grey normal logout">{{ __('Logout') }}</h2>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<h1 class="center grey" style="margin-top:-13px;">{{ __('Example Website') }}</h1>
