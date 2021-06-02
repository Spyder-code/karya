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
        @if (Auth::id()==1)
            <div class="col-sm-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form action="{{ route('post.update.schedule',['post'=>$post->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>Status:</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" readonly value="{{ $post->postStatus->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-4">
                                    <label>Publish:</label>
                                </div>
                                <div class="col">
                                    <select id="tipe" name="tipe" class="form-control">
                                        <option value="0" selected></option>
                                        <option value="1">Publish Now</option>
                                        <option value="2">Scheduled</option>
                                    </select>
                                    <input type="datetime-local" id="date" name="schedule" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <div class="col">
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
                    <form class="forms-sample pt-4" action="{{ route('post.update',['post'=>$post->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <div class="col-sm-5">
                                <label for="judul">Judul Karya</label>
                                <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="judul">
                            </div>
                            <div class="col">
                                <label for="Tipe">Tipe Karya</label>
                                <select class="form-control" id="Tipe" name="type">
                                    @foreach ($type as $item)
                                        <option value="{{ $item->id }}" {{ $item->id==$post->id?'selected':'' }}>{{ $item->name }}</option>
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
                                <input type="email" class="form-control" readonly name="email" value="{{ $post->user->email}}" id="email">
                            </div>
                            <div class="col">
                                <label for="nomor">Nomor Whatsapp</label>
                                <input type="text" class="form-control" readonly name="phone" value="{{ $post->user->phone }}" id="nomor">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Author</label>
                            <input type="text" class="form-control" value="{{ $post->author }}" name="author" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="editor">Post Excerpt</label>
                            <textarea name="post_excerpt" class="form-control" cols="30" rows="10">{{ $post->post_excerpt }}</textarea>
                        </div>
                        <div class="form-group pb-2">
                            <label for="editor">Editor Content</label>
                            <textarea name="content" class="ck-blurred ck-editor__editable ck-rounded-corners ck-editor__editable_inline" id="editor">
                                {{ $post->content }}
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
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

    $(function(){
        $('#date').hide();
        $('#tipe').change(function (e) {
            e.preventDefault();
            var val = $(this).val();
            if (val == 2) {
                $('#date').show();
            } else {
                $('#date').hide();
            }
        });
    })
</script>
@endsection
