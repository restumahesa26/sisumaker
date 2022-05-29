<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="{{ route('home') }}" style="text-decoration: none">BADAN PERENCANAAN, PENELITIAN DAN
            PENGEMBANGAN DAERAH</a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ route('home') }}">HOME <span class="sr-only">(current)</span></a>
                </li>
                @if (Auth::user())
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ route('dashboard') }}">DASHBOARD <span class="sr-only">(current)</span></a>
                </li>
                @endif
            </ul>
            <span class="nav-item">
                @if (Auth::user())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn-outline-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">LOG OUT</a>
                </form>

                @else
                    <a class="btn-outline-sm" href="{{ route('login') }}">LOG IN</a>
                @endif
            </span>
        </div>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->
