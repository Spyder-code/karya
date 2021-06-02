@extends('layouts.dashboard')

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Setting</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Apps / Setting</a>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title" style="color:rgb(58, 139, 206); font-size: 25px;">Setting landing page</div>
                            <div class="table-responsive">
                                <table id="one_config" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" width="30%"></th>
                                        <th scope="col" width="70%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('setting.update',['setting'=>1]) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <tr>
                                            <td>Event :</td>
                                            <td>
                                                <select name="event_id" id="" class="form-control">
                                                    @foreach ($event as $item)
                                                        <option value="{{ $item->id }}" {{ $setting->event->id==$item->id?'selected':'' }}>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Link Registration :</td>
                                            <td>
                                                <input type="text" name="link_registration" id="" value="{{ $setting->link_registration }}" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Link Guide :</td>
                                            <td>
                                                <input type="text" name="link_guide" id="" class="form-control" value="{{ $setting->link_guide }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Link Poster :</td>
                                            <td>
                                                <input type="text" name="link_poster" id="" class="form-control" value="{{ $setting->link_poster }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Link upload post :</td>
                                            <td>
                                                <input type="text" name="link_upload_post" id="" class="form-control" value="{{ $setting->link_upload_post }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Link winner announcement :</td>
                                            <td>
                                                <input type="text" name="link_announcement" id="" class="form-control" value="{{ $setting->link_announcement }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button class="btn btn-success" type="submit">Update</button>
                                            </td>
                                        </tr>
                                    </form>
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

@endsection
