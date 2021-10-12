@extends('layouts.master')
@section('title', 'Dashboard')

@push('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@endpush

@section('content')
    <div class="container">
        <h3 class="nameFilter">{{ $title }}</h3>
    	<div class="content-blog">
    		<div class="content-card-blog">
                {{-- count > jika lebih dari 0 maka hasil true --}}
                @if($post->count())
                    <div class="row">
                        @foreach($post as $posts)
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="label">{{ $posts->categori->nama }}</div>
                                    @if($posts->image)
                                        <img src="{{ asset('storage/' . $posts->image) }}" class="card-img-top" alt="{{ $posts->categori->name }}">
                                    @else
                                        <img src="https://source.unsplash.com/400x200?{{ $posts->categori->name }}" class="card-img">
                                    @endif
                                    <div class="card-body">
                                        <h6>{{ $posts->judul }}</h6>
                                         {{-- limit text dan stript tags untuk menghilangkan tags html --}}
                                        <p class="card-text">{{ Str::limit(strip_tags($posts->content), 150, ' (...)') }}</p>
                                    </div>
                                    <div class="info-blog">
                                        {{-- //Time ago laravel --}}
                                        <p>{{ $posts->created_at->diffForHumans() }}</p>
                                        <a href="/blog/detail/{{ $posts->slug }}" class="read-more">Read more...</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="pagination">
                        <nav aria-label="Page navigation example">
                            {{ $post->links('vendor.pagination.custom-pagination') }}
                        </nav>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <strong>Oppss !</strong> Blog tidak dapat ditemukan ..
                    </div>
                @endif
    		</div>
    		<div class="content-sidebar-blog">
                <form action="/blog">
                    @if(request('categori'))
                        <input type="hidden" name="categori" value="{{ request('categori') }}">
                    @endif
    			    <div class="search-blog">
    				    <input type="search" name="search" placeholder="Search..." value="{{ request('search') }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="categori-blog">
                    <h4>Categories</h4>
                    <ul class="categori">
                        @foreach($categori as $cate)
                            <a href="/blog?categori={{ $cate->slug }}" class="text-decoration-none">
                                <li class="{{ request('categori') === $cate->slug ? 'active' : '' }}">{{ $cate->nama }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>

                <div class="recent-post">
                   
                    <h4>Recent Post</h4>
                    @foreach($blogLimit as $limit)
                    <div class="flex-rencent-post">
                        @if($limit->image)
                            <img src="{{ asset('storage/' . $limit->image) }}" alt="{{ $blogs->categori->name }}">
                        @else
                            <img src="https://source.unsplash.com/400x200?{{ $limit->categori->name }}" class="card-img">
                        @endif
                        <div class="recent-post-blog">
                            <p class="mb-0" style="font-weight:600; color:#000000;">{{ $limit->judul }}</p>
                            <p class="mb-1">{{ Str::limit(strip_tags($limit->content), 50, '...') }} </p>
                            <a href="/blog/detail/{{ $limit->slug }}" class="read-rencent-post">Read more...</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="archive-blog">
                    <h4>Archives</h4>
                    <ul class="archive">
                        @foreach($groupDate as $posts)
                        <a href="blog?month={{ $posts->month }}&year={{ $posts->year }}" class="text-decoration-none">    
                            <li>
                                {{ bulan($posts->month) }} {{ $posts->year }} <span>({{ $posts->total }})</span>
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>

                <div class="tags-blog">
                    <h4>Tags</h4>
                    <div class="tags">
                        <div class="row content-tags">
                            {{-- <p class="active">Programmer</p> --}}
                            @foreach ($tags as $tag)
                                <a href="blog?tags={{ $tag->slug_tags }}" class="text-decoration-none">
                                    <p class="{{ request('tags') === $tag->slug_tags ? 'active' : '' }}">{{ $tag->nama_tags }}</p>
                                </a>    
                            @endforeach
                        </div>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
@endsection