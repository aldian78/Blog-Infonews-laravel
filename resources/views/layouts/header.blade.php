<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">InfoNews</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                <a class="nav-link" href="{{ route('about.index') }}">About</a>
                <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
                <a class="btn btn-primary tombol-nav" href="{{ url('/login') }}">Join Us</a>
            </div>
        </div>
    </div>
</nav>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid">
   <div class="container">
        <div>
            <h1 class="display-4">InfoNews presents the <span>latest </span><br> and most <span> trusted news </span></h1>
            <a href="" class="btn btn-primary tombol-nav">OUR WORK</a>
        </div>
        <img src="{{ asset('img/hero1.gif') }}" class="hero-banner">
    </div>
</div>
<!-- End Jumbotron -->
