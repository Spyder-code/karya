@extends('layouts.dashboard')

@section('style')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
    <style>
        .event-name {
            font-family: 'Caveat', cursive;
            font-size:60pt;
            text-shadow: 4px 4px rgb(255, 255, 255);
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
                        <li class="breadcrumb-item"><a href="karya_admin.html">Apps / List Karya</a>
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
                            <h2 class="text-dark mb-1 font-weight-medium">{{ $event->count() }}</h2>
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
        @foreach ($event as $item)
            <div class="col-6 col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">On {{ date('d F y', strtotime($item->event->created_at)) }}</div>
                    <div class="card-body text-center" style="background-image: url({{ asset('images/bg-event.jpg') }})">
                        <h1 class="event-name">{{ $item->event->name }}</h1>
                    </div>
                    <div class="card-footer border border-light">
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('juri.event.show',['event'=>$item->event_id]) }}" class="btn btn-outline-info mr-2">Lihat</a>
                            </div>
                            <div class="col">
                                @if ($percent[$loop->index]==100)
                                    <span class="text-success">Complete</span>
                                @else
                                    <span class="text-warning">Uncomplete</span>
                                @endif
                                <div class="progress">
                                    <div class="progress-bar bg-success progress-bar-animated" role="progressbar" style="width: {{ $percent[$loop->index] }}%;" aria-valuenow="{{ $percent[$loop->index] }}" aria-valuemin="0" aria-valuemax="100">{{ $postCount[$loop->index] }}/{{ $postCountEvent[$loop->index] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
