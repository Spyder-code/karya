@extends('layouts.dashboard')

@section('style')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <style>
        .event-name {
            font-family: 'Caveat', cursive;
            font-size:60pt;
            text-shadow: 4px 4px rgb(48, 146, 170);
            text-transform: uppercase
        }
    </style>
@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Nilai Karya</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="karya_admin.html">Apps / Nilai Karya</a>
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
    {{-- <div class="card-group">
        <div class="card border-right">
            <div class="card-body">
                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <div>
                        <div class="d-inline-flex align-items-center">
                            <h2 class="text-dark mb-1 font-weight-medium">12</h2>
                        </div>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Post Complete</h6>
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
                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">12</h2>
                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Post Uncomplete
                        </h6>
                    </div>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="check-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        @foreach ($data as $item)
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="text-center">
                            <h4>{{ $item->title }}</h4>
                            <h6>Oleh : {{ $item->author }}</h6>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p>{{  Str::limit($item->post_excerpt, 100)  }}</p>
                    </div>
                    <div class="card-footer border border-light">
                        <div class="row">
                            <div class="col-3">
                                <button data-placement="bottom" title="View" class="btn btn-outline-primary" type="button" data-toggle="modal" data-target="#previewa{{ $item->id }}"><i class="fas fa-eye"></i></button>
                            </div>
                            <div class="col mt-2">
                                <div class="{{ $item->point>0?'text-success':'text-warning' }} d-flex"><span>{{ $item->point>0?'Complete':'Uncomplete' }}</span> <i class="ml-2 fas {{ $item->point>0?'fa-check':'fa-pencil-alt' }}"></i></div>
                            </div>
                            <div class="col mt-2">
                                <h3 class="text-primary">{{ $item->point }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="previewa{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal2Label"><b>{{ $item->title }}</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! $item->content !!}
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('post.update.point',['post'=>$item->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <label>Input Nilai</label>
                                <input type="number" value="{{ $item->point }}" name="point" class="form-control border border-primary">
                                <button type="submit" class="btn mt-2 btn-success">Nilai</button>
                                <button type="button" class="btn mt-2 btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
