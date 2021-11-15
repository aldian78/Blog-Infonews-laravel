@extends('layouts/master')
@section('title', 'Dashboard')

@push('css-custom')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <div class="container">
    	<div class="content-blog">
    		<div class="detail-blog">
    			<div class="row">
    				<div class="col-lg">
                        {{-- @foreach($blog as $blogs) --}}
    					<div class="content-detail-blog">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" class="img-detail-blog" alt="{{ $blog->categori->name }}">
                            @else
                                <img src="https://source.unsplash.com/400x200?{{ $blog->categori->name }}" class="card-img">
                            @endif
    						<h2 class="mt-4">{{ $blog['judul'] }}</h2>
    						<div class="categori-detail-blog">
    							<span>By : {{ $blog->user['name'] }} |</span>
    							<span>Categories : {{ $blog->categori['nama'] }} |</span>
    							<span>{{ $blog['created_at']->diffForHumans() }} |</span>
    							<span><i class="far fa-comments"></i> 10 |</span>
                                <span>
                                    <form action="/like/store" method="post" id="like">
                                    @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blog['id'] }}"> 
                                        @forelse ($blog['like'] as $check)
                                            @if(Request::ip() == $check->ip_address || $blog['id'] == $check->blog_id)
                                                <i class="far fa-thumbs-up active" style="cursor: pointer" id="likes"></i> {{ $countLike }}
                                            @endif
                                        @empty
                                                <i class="far fa-thumbs-up" style="cursor: pointer" id="likes"></i> {{ $countLike }}
                                            {{-- @endif --}}
                                        @endforelse
                                    </form>
                                </span>
                            </div>
                            <p class="text-danger mt-2 mb-2"><i>*Klik icon like jika menyukai blog ini</i> </p>
    						<div class="body-detail-blog">
    							<p>{!! $blog['content'] !!}</p>
    						</div>
	    					<div class="tags-detail-blog">
	    						<h4>Tags</h4>
	    						<div class="tags-detail">
                                    @foreach($blog['tags'] as $tag)
	    							    <p>{{ $tag->nama_tags }}</p>
                                    @endforeach
	    						</div>
	    					</div>
    					</div>
                        {{-- @endforeach --}}
    				</div>
    			</div>
    			<div class="comments-detail-blog">
    				<h4>Leave a Comments</h4>
    				<p>Your email address will not be published. Required fields are marked *</p>
    				<textarea placeholder="Comments ..."></textarea>
    				<button type="submit" class="btn btn-primary">Submit</button>
    			</div>
    		</div>
    		<div class="content-sidebar-blog">
                <form action="/blog"> 
                    <div class="search-blog">
                        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <div class="categori-blog">
                    <h4>Categories</h4>
                    <ul class="categori">
                        @foreach($categori as $cate)
                            <a href="/blog?categori={{ $cate->slug }}" class="text-decoration-none">
                                <li>{{ $cate->nama }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>

                <div class="recent-post">
                <h4>Recent Post</h4>
                   @foreach($blogLimit as $limit)
                    <div class="flex-rencent-post">
                        @if($limit->image)
                            <img src="{{ asset('storage/' . $limit->image) }}" alt="{{ $limit->categori->name }}">
                        @else
                            <img src="https://source.unsplash.com/400x200?{{ $limit->categori->name }}" class="card-img">
                        @endif
                        <div class="recent-post-blog">
                            <p class="mb-0" style="font-weight:600; color:#000000;">{{ $limit->judul }}</p>
                            <p class="mb-1">{{ Str::limit($limit->content, 50, '...') }} </p>
                            <a href="/blog/detail/{{ $limit->slug }}" class="read-rencent-post">Read more...</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="archive-blog">
                    <h4>Archives</h4>
                    <ul class="archive">
                        @foreach($groupDate as $posts)
                        <a href="/blog?month={{ $posts->month }}&year={{ $posts->year }}" class="text-decoration-none">    
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
                            @foreach($tags as $tag)
                                <a href="/blog?tags={{ $tag->slug_tags }}" class="text-decoration-none">
	    					        <p>{{ $tag->nama_tags }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
@endsection
@push('jquery-custom')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script>
        document.getElementById("likes").onclick = function() {
            document.getElementById("like").submit();
        }
    </script>

    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('like'))
            toastr.success(
                "{{ session('like') }}"
            );
        @endif

        @if(Session::has('unlike'))
            toastr.error(
                "{{ session('unlike') }}"
            );
        @endif
    </script>
@endpush