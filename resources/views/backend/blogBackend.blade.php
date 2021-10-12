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
              <h1>Blogs</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data blogs</li>
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
                  <a href="/blogs/create" class="btn btn-success mb-2"><i class="fas fa-plus"> Create</i></a>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Categori</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($blog as $blogback)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $blogback->judul }}</td>
                          <td>{{ $blogback->categori->nama }}</td>
                          <td>{{ $blogback->created_at->format('d F Y') }}</td>
                          <td>
                            <a href="/blogs/{{ $blogback->slug }}" class="btn btn-warning">
                              <i class="fas fa-eye" style="color: white"></i>
                            </a>
                            <a href="/blogs/{{ $blogback->slug }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#modal-delete{{ $blogback->slug }}">
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

    <!-- /.modal -->
    @foreach($blog as $blogs)
    <div class="modal fade" id="modal-delete{{ $blogs->slug }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm delete blogs</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/blogs/{{ $blogs->slug }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <strong>{{ $blogs->judul }}</strong> ?</p>
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
@endpush