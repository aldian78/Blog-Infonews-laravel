@extends('layouts.master')
@section('title', 'Dashboard')

@push('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
    <div class="container">
    	<div class="about">
    		<div class="row">
    			<div class="col-lg-6">
    				<img src="{{ asset('img/about1.jpg') }}" alt="Koran">
    			</div>
    			<div class="col-lg-6">
    				<h4>Our story</h4>
    				<p class="out-story">Phasellus egestas nisi nisi, lobortis ultricies risus semper nec. Vestibulum pharetra ac ante ut pellentesque. Curabitur fringilla dolor quis lorem accumsan, vitae molestie urna dapibus. Pellentesque porta est ac neque bibendum viverra. Vivamus lobortis magna ut interdum laoreet. Donec gravida lorem elit, quis condimentum ex semper sit amet. Fusce eget ligula magna. Aliquam aliquam imperdiet sodales. Ut fringilla turpis in vehicula vehicula. Pellentesque congue ac orci ut gravida. Aliquam erat volutpat. Donec iaculis lectus a arcu facilisis, eu sodales lectus sagittis. Etiam pellentesque, magna vel dictum rutrum, neque justo eleifend elit, vel tincidunt erat arcu ut sem. Sed rutrum, turpis ut commodo efficitur, quam velit convallis ipsum, et maximus enim ligula ac ligula. Vivamus tristique vulputate ultricies. Sed vitae ultrices orci.</p>
    				<div class="about-blog">
    					<p>Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.</p>
    					<span> - InfoNews</span>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
@endsection