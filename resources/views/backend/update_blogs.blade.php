@extends('backend.layouts.masterBackend')

@push('custom-css')
  <link rel="stylesheet" type="text/css" href="{{ asset('trix-editor/trix.css') }}">
  <script type="text/javascript" src="{{ asset('trix-editor/trix.js') }}"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"/>

  {{-- menghilangkan button upload file trix editor --}}
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display: none;
    }
  </style>
@endpush

@section('content-backend')
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit blogs</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit Blog</li>
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
                  <h3 class="card-title text-danger"><i>Fill in everything correctly*</i></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/blogs/{{ $blog->slug }}" method="post" enctype="multipart/form-data">
                      @method('put')
                      @csrf
                      <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Title</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $blog->judul) }}" id="judul" placeholder="Title blogs" autofocus>
                            @error('judul')
                            <span id="judul-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug) }}" id="slug" placeholder="Slug">
                            @error('slug')
                            <span id="slug-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categori">Categori</label>
                            <select name="categori_id" id="categori" class="custom-select">
                                @foreach($categori as $cat)
                                  @if(old('categori_id', $blog->categori_id) == $cat->id )
                                    <option value="{{ $cat->id }}" selected>{{ $cat->nama }}</option>
                                  @else
                                    <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                                  @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <div class="row">
                            @if($blog->image)
                              <img src="{{ asset('storage/' . $blog->image) }}" class="img-preview img-fluid mb-3 col-sm-3">
                            @else
                              <img class="img-preview img-fluid mb-3 col-sm-3">
                            @endif
                          </div>
                          <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" 
                            id="image" onchange="previewImage()">
                            <label class="custom-file-label" for="image">Choose file</label>
                            @error('image')
                            <span id="image-error" class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            @error('content')
                              <p style="font-size: 80%; color: #dc3545">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="content" value="{{ old('content', $blog->content) }}" id="content">
                            <trix-editor input="content"></trix-editor>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select a Tags"
                              data-dropdown-css-class="select2-purple" style="width: 100%">
                              @foreach($tagging as $tag)
                                @if (old('tags'))
                                  <option value="{{ $tag->id }}" {{(collect(old('tags'))->contains($tag->id)) ? 'selected':''}}>
                                    {{ $tag->nama_tags }}
                                  </option>
                                @else
                                  <option value="{{ $tag->id }}" @foreach ($blog->tags as $tg)
                                      @if($tag->id == $tg->id)
                                        selected
                                        @endif
                                      @endforeach>{{ $tag->nama_tags }}
                                  </option>
                                @endif
                              @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      <!-- /.card-body -->
                    </form>
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

@push('custom-script')
    {{-- Tags input --}}
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- bs-custom-file-input --}}
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
      //Initialize Select2 Elements
      $(".select2").select2({
        theme: "bootstrap4",
      });

      //file input gambar
      $(function () {
        bsCustomFileInput.init();
      });

      //Fetch API Javascript 
      const title = document.querySelector('#judul');
      const slug = document.querySelector('#slug');
      
      title.addEventListener('change', function() {
        fetch('/blogs/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });

      //menghilangkan fungsi upload file trix editor
      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      });

      //preview image hanya berjalan dibrowser terbaru
      function previewImage()
      {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endpush
