@extends('layouts.dashboard')
@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profil</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Apps</a></li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Profil</li>
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
@if ($message = Session::get('danger'))
<div class="row">
    <div class="col mt-3">
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
    </div>
</div>
@endif

<div class="container-fluid">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7-sm">
                            <div class="card-profile-image text-center">
                                <img src="{{ Auth::user()->avatar!=null?Auth::user()->avatar:new YoHang88\LetterAvatar\LetterAvatar(Auth::user()->name, 'square', 64) }}"class="rounded-circle img-fluid" style="height: 200px; max-width:200px">
                                <form action="{{ route('user.update.image',['user'=>Auth::id()]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <label for="image" class="badge badge-info" style="position: relative; top:-27px; right: 50px; border-radius:100%; height:30px"><i class="fas fa-pencil-alt mt-1"></i></label>
                                    <input onchange="submit()" type="file" name="image" id="image" hidden>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <form action="{{ route('user.update',['user'=>Auth::id()]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>Name</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>Email</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="email" readonly value="{{ Auth::user()->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>Address</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header text-white bg-warning">Change Password</div>
                <div class="card-body">
                    <form action="{{ route('user.update.password',['user'=>auth::id()]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
