@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Manajemen Juri</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="juri_admin.html">Apps / Manajemen Juri</a>
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
        <div class="col-sm-8">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-success text-white">Tambah Event</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="forms-sample" action="{{ route('event.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Link embed instagram</label>
                            <input type="text" class="form-control" id="Name" name="instagram_embed">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">List Event</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($event as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('event.update.active',['event'=>$item->id]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="customize-input">
                                                <select
                                                    class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius" name="eventStatus" onchange="submit()">
                                                    <option class="text-dark" {{ $item->active==1?'selected':'' }} value="1">Active</option>
                                                    <option class="text-dark" {{ $item->active!=1?'selected':'' }} value="0">Non Active</option>
                                                </select>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="d-flex">
                                        <button data-placement="bottom" title="View" class="btn btn-primary mx-1" type="button" data-toggle="modal"
                                        data-target="#preview-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                        <form action="{{ route('event.destroy',['event'=>$item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">Tambah Juri</div>
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('user.juri.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="Email" name="email">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="password2">Repeat Password</label>
                                <input type="password" class="form-control" id="Password2" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">List Juri</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="two_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="d-flex">
                                        <button data-placement="bottom" title="View" class="btn btn-primary mx-1" type="button" data-toggle="modal"
                                        data-target="#preview-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                        <form action="{{ route('user.destroy',['user'=>$item->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="preview-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal2Label">Hapus Data</h5>
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
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header bg-warning text-white">Juri pada Event</div>
                        <div class="card-body">
                            <form action="{{ route('event.juri') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Juri</label>
                                    <select name="juri" id="" class="form-control">
                                        @foreach ($data as $item)
                                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Event</label>
                                    <select name="event" id="" class="form-control">
                                        @foreach ($event as $item)
                                            <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Tambahkan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-lg mb-4">
                        <div class="card-header bg-primary text-white">List Juri pada event</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="three_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Juri</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventJuri as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->event->name }}</td>
                                            <td class="d-flex">
                                                <button data-placement="bottom" title="View" class="btn btn-primary mx-1" type="button" data-toggle="modal"
                                                data-target="#preview-{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                                <form action="{{ route('user.destroy',['user'=>$item->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="preview-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal2Label">Hapus Data</h5>
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
    $('#two_config').DataTable();
    $('#three_config').DataTable();
</script>
@endsection
