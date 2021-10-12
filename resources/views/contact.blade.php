@extends('layouts.master')
@section('title', 'Dashboard')

@push('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
     <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
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
                    <div class="contact-input">
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
            toastr.info(
                "{{ session('success') }}"
            );
        @endif
    </script>
@endpush