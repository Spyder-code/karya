@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">List User</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index_admin.html">Apps / List User</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <div
                    class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    <?php echo date("M d"); ?>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="row">
    <div class="col mt-3">
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="d-flex">
                                        <button data-placement="bottom" title="View" class="btn btn-primary mx-1" type="button" data-toggle="modal"
                                        data-target="#preview{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                        <form action="{{ route('user.destroy',['user'=>$item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="preview{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">{{ $item->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{ $item->avatar }}" class="img-fluid">
                                                <p>{{ $item->alamat }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- CSS Here -->
<link href="{{ asset('dashboard/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
<!-- Javascript Here -->
<script src="{{ asset('dashboard/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('dashboard/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
    $('#zero_config').DataTable();
</script>
@endsection
