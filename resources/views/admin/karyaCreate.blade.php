@extends('layouts.dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('ckeditor.css') }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Form Unggah Karya</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('home.admin') }}">Karya</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.tambah.karya') }}">Create</a>
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
            <div class="card border-left border-purple shadow-lg">
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
                    <form class="forms-sample pt-4" action="{{ route('karya.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <label for="judul">Judul Karya</label>
                                <input type="text" value="{{ old('title') }}" class="form-control" name="title" id="judul">
                            </div>
                            <div class="col">
                                <label for="Tipe">Tipe Karya</label>
                                <select class="form-control" id="tipe" name="type">
                                    <option value="0"></option>
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" id="event" name="event">
                                    @foreach ($event as $item)
                                        <option {{ $item->active==0?'disabled':'' }} value="{{ $item->id }}" selected>{{ $item->name }} <i class="{{ $item->active==0 ? 'fas fa-lock':'' }}"></i></option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="kategori">Kategori Karya</label><br>
                                @foreach ($category as $item)
                                    <label class="m-1"><input type="checkbox" name="kategori[]" value="{{ $item->id }}"> {{ $item->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm">
                                <label for="email">Alamat Email</label>
                                <input type="email" class="form-control" readonly name="email" value="{{ Auth::user()->email }}" id="email">
                            </div>
                            <div class="col">
                                <label for="nomor">Nomor Whatsapp</label>
                                <input type="text" class="form-control" readonly name="phone" value="{{ Auth::user()->phone }}" id="nomor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Author</label>
                            <input type="text" value="{{ old('author') }}" class="form-control" name="author" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="editor">Post Excerpt</label>
                            <textarea name="post_excerpt" class="form-control" cols="30" rows="10">{{ old('post_excerpt') }}</textarea>
                        </div>
                        <div class="form-group pb-2">
                            <label for="editor">Editor Content</label>
                            <textarea name="content" class="ck-blurred ck-editor__editable ck-rounded-corners ck-editor__editable_inline" id="editor">
                                {{-- <p>Ini adalah editor content.</p> --}}
                                {!! old('content') !!}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    ClassicEditor
        .create(document.querySelector('#editor'),{
            minHeight:'500px'
        })
        .catch(error => {
            console.error(error);
        });

    $('#event').hide();
    $('#tipe').change(function (e) {
        e.preventDefault();
        var val = $(this).val();
        if(val==1){
            $('#event').show();
        }else{
            $('#event').hide();
        }
    });
</script>
@endsection
