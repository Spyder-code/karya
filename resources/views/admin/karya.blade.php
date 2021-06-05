@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">List Karya</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Apps / List Karya</a>
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
    <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $umum->count() }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Karya Umum</h6>
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
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $event->count() }}</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Karya Event
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title" style="color:rgb(58, 139, 206); font-size: 25px;">Naskah Umum</div>
                            <div class="table-responsive">
                                <table id="one_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">User Upload</th>
                                        <th scope="col" width="100px">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Publish On</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($umum as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <span>{{ $item->postStatus->name }}</span>
                                            {{-- <form action="{{ route('post.update.status',['post'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="customize-input">
                                                    <select
                                                        class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius" name="status" onchange="submit()">
                                                        @foreach ($status as $statusI)
                                                            <option {{ $statusI->id==$item->status?'selected':'' }} value="{{ $statusI->id }}">{{ $statusI->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form> --}}
                                        </td>
                                        <td>{{ $item->schedule==null?'unscheduled':date('d F Y - H:i', strtotime($item->schedule)) }}</td>
                                        <td class="d-flex">
                                            {{-- <button data-placement="bottom" title="View" class="btn btn-warning text-white mx-1" type="button" data-toggle="modal"
                                        data-target="#previewa{{ $item->id }}"><i class="fas fa-eye"></i></button> --}}
                                            <a href="{{ route('post.edit',['post' => $item->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-primary mx-1" ><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('post.destroy',['post'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger mx-1" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- <div class="modal fade" id="previewa{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal2Label">{{ $item->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $item->content !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title" style="color:rgb(58, 139, 206); font-size: 25px;">Naskah Event</div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">User Upload</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" width="120">Status</th>
                                        <th scope="col">Created On</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($event as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->postStatus->name }}</td>
                                        <td>{{ date('d F Y - H:i',strtotime($item->created_at)) }}</td>
                                        <td class="d-flex">
                                            <button data-placement="bottom" title="View" class="btn btn-warning text-white mx-1" type="button" data-toggle="modal"
                                        data-target="#preview{{ $item->id }}"><i class="fas fa-eye"></i></button>
                                            <a href="{{ route('post.edit',['post' => $item->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-primary mx-1" ><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('post.destroy',['post'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger mx-1" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="preview{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal2Label">{{ $item->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! $item->content !!}
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
    $('#one_config').DataTable();
    $('#two_config').DataTable();
</script>
@endsection
