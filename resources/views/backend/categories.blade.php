@extends('backend.layouts.masterBackend')

@push('custom-css')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@endpush

@section('content-backend')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data categories</li>
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
                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-success mb-2" type="submit" data-toggle="modal" data-target="#modal-tambah">
                        <i class="fas fa-plus"> Create</i>
                    </button>
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Categori</th>
                        <th>Slug</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($categori as $kategori)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $kategori->nama }}</td>
                          <td>{{ $kategori->slug }}</td>
                          <td>{{ $kategori->created_at->format('d F Y') }}</td>
                          <td>
                            <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#modal-edit{{ $kategori->slug }}">
                              <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#modal-delete{{ $kategori->slug }}">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
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

    <!-- /.modal tambah -->
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create categori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/category" method="post">
                    @csrf
                    <div class="modal-body">
                       <div class="form-group">
                            <label for="judul">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Nama categori" id="nama" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="Slug" id="slug">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

     <!-- /.modal edit -->
    @foreach($categori as $cat)
    <div class="modal fade" id="modal-edit{{ $cat->slug }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change categori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/category/{{ $cat->slug }}" method="post">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                       <div class="form-group">
                            <label for="namaEdit">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $cat->nama) }}" id="namaEdit" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="slugEdit">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $cat->slug) }}" id="slugEdit">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- /.modal delete-->
    <div class="modal fade" id="modal-delete{{ $cat->slug }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm delete categori</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/category/{{ $cat->slug }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <strong>{{ $cat->nama }}</strong> ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yakin</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
<!-- /.modal -->
@endsection

@push('custom-backend')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>

    <script> 
        @if(Session::has('success'))
        toastr.success(
            "{{ session('success') }}"
        );
        @endif
        
        @if(Session::has('update'))
        toastr.info(
            "{{ session('update') }}"
        );
        @endif

        @if(Session::has('delete'))
        toastr.warning(
            "{{ session('delete') }}"
        );
        @endif
    </script>
    <script>
        //Fetch API Javascript 
        const nama = document.querySelector('#nama');
        const slug = document.querySelector('#slug');
        
        nama.addEventListener('change', function() {
            fetch('/category/checkSlug?title=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });

        const namaEdit = document.querySelector('#namaEdit');
        const slugEdit = document.querySelector('#slugEdit');
        
        namaEdit.addEventListener('change', function() {
            fetch('/category/checkSlug?title=' + namaEdit.value)
            .then(response => response.json())
            .then(data => slugEdit.value = data.slug)
        });
    </script>
@endpush