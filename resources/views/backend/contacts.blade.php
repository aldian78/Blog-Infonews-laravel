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
              <h1>Hastag</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data hastag</li>
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
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($contacts as $contact)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $contact->nama }}</td>
                          <td>{{ $contact->email }}</td>
                          <td>{{ $contact->subject }}</td>
                          <td>{{ $contact->created_at->format('d F Y') }}</td>
                          <td>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal-detail{{ $contact->id }}">
                              <i class="fas fa-eye" style="color: white"></i>
                            </button>
                            <a href="/sendEmail/{{ $contact->id }}" class="btn btn-primary"><i class="far fa-paper-plane"></i></a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete{{ $contact->id }}">
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
    
    <!-- /.modal delete-->
    @foreach($contacts as $contact)
    <div class="modal fade" id="modal-detail{{ $contact->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label for="hastag">Nama</label>
                        <input type="text" name="nama_tags" class="form-control" value="{{ $contact->nama }}" placeholder="Nama hastag" id="hastag" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="slug">Email</label>
                        <input type="text" name="slug_tags" class="form-control" value="{{ $contact->email }}" placeholder="Slug" id="slug">
                    </div>
                    <div class="form-group">
                        <label for="slug">Subject</label>
                        <input type="text" name="slug_tags" class="form-control" value="{{ $contact->subject }}" placeholder="Slug" id="slug">
                    </div>
                    <div class="form-group">
                        <label for="slug">Message</label>
                        <textarea rows="3" class="form-control">{{ $contact->pesan }} </textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                  </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-delete{{ $contact->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm delete contacts</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/contacts/{{ $contact->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus <strong>{{ $contact->nama }}</strong> ?</p>
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

        @if(Session::has('success'))
        toastr.success(
            "{{ session('success') }}"
        );
        @endif
    </script>
@endpush