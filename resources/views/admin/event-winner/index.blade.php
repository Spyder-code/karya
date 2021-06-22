@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Event Winner</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Apps / Event Winner</a>
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
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $data->count() }}</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Event</h6>
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
                <div class="card-header">
                    <a href="{{ route('event-winner.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title" style="color:rgb(58, 139, 206); font-size: 25px;">Event</div>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Event</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Jury note</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->event->name }}</td>
                                        <td>{{ Str::substr($item->note, 0, 200,'...') }}</td>
                                        <td>{{ Str::substr($item->jury_note, 0, 200,'...') }}</td>
                                        <td>{{ date('d F Y',strtotime($item->created_at)) }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('event-winner.edit',['event_winner' => $item->id]) }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-primary mx-1" ><i class="fas fa-pencil-alt"></i></a>
                                            <a href="{{ route('event-winner.show',['event_winner' => $item->id]) }}" data-toggle="tooltip" data-placement="bottom" title="View" class="btn btn-warning mx-1 text-white" ><i class="fas fa-eye"></i></a>
                                            <form action="{{ route('event-winner.destroy',['event_winner'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button data-toggle="tooltip" data-placement="bottom" title="Delete" class="btn btn-danger mx-1" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-trash-alt"></i></button>
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
