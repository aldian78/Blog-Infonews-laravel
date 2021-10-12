@extends('backend.layouts.masterBackend')

@section('content-backend')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Detail Blogs</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{ $blog->slug }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="d-flex justify-content-center my-2">
                      @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid pad mb-3" width="600" height="600">
                      @else
                        <img src="https://source.unsplash.com/600x600?{{ $blog->categori->name }}" class="img-fluid pad mb-3" width="600" height="600">
                      @endif
                    </div>
                    <h3 class="my-3">{{ $blog->judul }}</h3>
                    <span class="float-left text-muted">Categori : {{ $blog->categori->nama }} | {{ $blog->created_at->diffForHumans() }}</span>
                    <br>
                      @foreach ($blog->tags as $tag)
                        <span class="mt-2 badge badge-danger">{{ $tag->nama_tags }}</span>  
                      @endforeach
                    <br>
                    <p class="mt-3" style="text-align: justify;">
                        {{-- !! agar tidak membaca tags html --}}
                        {!! $blog->content !!}
                    </p>
                    <a href="/blogs" class="btn btn-primary float-left mt-3"><i class="fas fa-backspace"></i> Back</a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
@endsection

