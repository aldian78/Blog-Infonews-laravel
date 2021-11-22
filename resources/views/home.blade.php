@extends('layouts.master')
@section('title', 'Dashboard')

@push('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <!-- Container -->
    <div class="container">
         <div class="page-news">
            <h2>Latest News</h2>
        </div>
        <div class="row workingspace">
            <div class="col-lg-6">
                <img src="{{ asset('img/workingspace.png') }}" alt="workingspace" class="img-fluid" data-aos="fade-up-right" data-aos-duration="1000">
            </div>
            <div class="col-lg-5">
                <h3>You <span>work</span> like at <span>home</span></h3>
                <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya</p>
                <a href="" class="btn btn-primary tombol-nav">Gallery</a>
            </div>
        </div>

        <div class="page-news">
            <h2>Headlines</h2>
        </div>
        <div class="kategori-news">
            <div class="row">
                @foreach($categori as $categ)
                    <a href="/?categori={{ $categ->slug }}" class="text-decoration-none">
                        <p class="{{ request('categori') === $categ->slug ? 'active' : '' }}">
                            {{ $categ->nama }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center" id="animated">
            <div class="col-12 card-news">
                <div class="row">
                    @foreach ($blog as $blogs)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="label">{{ $blogs->categori->nama }}</div>
                                    @if($blogs->image)
                                        <img src="{{ asset($blogs->image) }}" class="card-img" alt="{{ $blogs->categori->name }}">
                                    @else
                                        <img src="https://source.unsplash.com/400x200?{{ $blogs->categori->name }}" class="card-img">
                                    @endif
                                <div class="card-body">
                                    <h6> {{ $blogs->judul }}</h6>
                                    {{-- limit text dan stript tags untuk menghilangkan tags html --}}
                                    <p class="card-text">{{ Str::limit(strip_tags($blogs->content), 150, ' (...)'); }}</p>
                                </div>
                                <div class="info-news">
                                    <p>{{ $blogs->created_at->diffForHumans() }}</p>
                                    <a href="/blog/detail/{{ $blogs->slug }}" class="read-more">Read more...</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="pagination">
                <nav aria-label="Page navigation example">
                    {{ $blog->links('vendor.pagination.custom-pagination') }}
                </nav>
            </div>
        </div>
    </div>

    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="banner-subscribe">
                    <img src="{{ asset('img/animation-subscribe.gif') }}" alt="Subscribe" data-aos="flip-left"
                        data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                </div>
                <div class="content-subscribe jus">
                    <h4>Do you like InfoNews ?</h4>
                    <p>If you like it, Please <span>support</span> us by <span>subscribing</span> below</p>

                    <form action="/subscribe/store" method="post">
                    @csrf
                        <div class="subscribe-input">
                            <input type="text" name="emailSubscribe" class="form-control" placeholder="Email ..." autocomplete="off">
                            <button class="btn btn-warning">Subscribe</button>
                        </div>
                        @error('emailSubscribe')
                            <p class="text-white mt-2">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="page-news">
        <h2>Contact Us</h2>
    </div>
    <div class="contact">
        <div class="container">
            <div class="unit-contact">
                <div class="col-lg-4 unit">
                    <i class="fas fa-mobile-alt"></i>
                    <p>Call: +1 5589 55488 55</p>
                    <span>Monday-Friday (9am-5pm)</span>
                </div>
                <div class="col-lg-4 unit">
                    <i class="fas fa-envelope"></i>
                    <p>Email: info@example.com</p>
                    <span>Web: www.example.com</span>
                </div>
                <div class="col-lg-4 unit">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Location: A108 Adam Street</p>
                    <span>NY 535022, USA</span>
                </div>
            </div>
            <div class="row">
                <div class="contact-maps">
                    <img src="{{ asset('img/maps.jpg') }}" alt="Google maps" class="content-maps">
                </div>
                <form action="/contacts/store" method="post" style="display: contents">
                @csrf
                    <div class="contact-input" data-aos="fade-up-left" data-aos-duration="1000">
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Nama lengkap ..">
                        @error('nama')
                            <span class="text-danger" style="margin-left: 40px; font-size: 15px;"><i>*{{ $message }}</i></span>
                        @enderror
                        <input type="email" name="email" class="form-control mt-3" value="{{ old('email') }}" placeholder="Email ..">
                        @error('email')
                            <span class="text-danger" style="margin-left: 40px; font-size: 15px;"><i>*{{ $message }}</i></span>
                        @enderror
                        <input type="text" name="subject" class="form-control mt-3" value="{{ old('subject') }}" placeholder="Sebject ..">
                        @error('subject')
                            <span class="text-danger" style="margin-left: 40px; font-size: 15px;"><i>*{{ $message }}</i></span>
                        @enderror
                        <textarea class="mt-3" name="pesan" placeholder="Message">{{ old('pesan') }}</textarea>
                         @error('pesan')
                            <span class="text-danger" style="margin-left: 40px; font-size: 15px;"><i>*{{ $message }}</i></span>
                        @enderror
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('jquery-custom')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success(
                "{{ session('success') }}"
            );
        @endif
    </script>
@endpush