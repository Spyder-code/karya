@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Event Winner</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Apps / Event Winner / The Winner</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right">
                <div
                    class="custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                    {{ date("M d") }}
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

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid">
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $data->count() }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Winner</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $sertif_success_send }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Sertif Terkirim</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $sertif_fail_send }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Sertif Belum Terkirim</h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                    <button data-toggle="modal" data-target="#exampleModal" class="btn btn-success mr-5"><i class="fas fa-plus"></i> Add Winner</button>
                    <form class="forms-sample" action="{{ route('sertif.send') }}" method="POST">
                        @csrf
                        <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                        <button type="submit" class="btn btn-primary mr-2" onclick="return confirm('Are yu sure')"><i class="fas fa-envelope"></i> Kirim sertif via Email</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title" style="color:rgb(58, 139, 206); font-size: 25px;">{{ $announcement->event->name }}</div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Grade</th>
                                        <th scope="col">Status Sertif</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->grade }}</td>
                                        <td>
                                            @if ($item->sertif_status==0)
                                                <div class="alert alert-danger">
                                                    <strong>Email Belum terkirim</strong>
                                                </div>
                                            @else
                                                <div class="alert alert-success">
                                                    <strong>Email Berhasil terkirim</strong>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <button data-toggle="modal" data-target="#modalUpdate-{{ $item->id }}" data-placement="bottom" title="Edit" class="btn btn-primary mx-1" ><i class="fas fa-pencil-alt"></i></button>
                                            <form action="{{ route('winner.destroy',['winner'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger mx-1" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- Modal --}}
                                    <div class="modal fade" id="modalUpdate-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('winner.update',['winner'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" value="{{ $item->name }}" name="name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" value="{{ $item->email }}" name="email" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" value="{{ $item->title }}" name="title" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Instagram</label>
                                                            <input type="text" value="{{ $item->instagram }}" name="instagram" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Institution</label>
                                                            <input type="text" value="{{ $item->institution }}" name="institution" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Grade</label>
                                                            <input type="text" value="{{ $item->grade }}" name="grade" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- Modal end --}}
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

<!-- Modal add-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('winner.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="announcement_id" value="{{ $announcement->id }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add winner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}">
                    </div>
                    <div class="form-group">
                        <label>Institution</label>
                        <input type="text" name="institution" class="form-control" value="{{ old('institution') }}">
                    </div>
                    <div class="form-group">
                        <label>Grade</label>
                        <input type="text" name="grade" class="form-control" value="{{ old('grade') }}">
                    </div>
                    <div class="form-group">
                        <label>Setifikat (.pdf)</label><br>
                        <input type="file" name="file" value="{{ old('file') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
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
