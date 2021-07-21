@extends('layouts.dashboard')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
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
                    <div class="card-header">
                        <a href="{{ route('event-winner.index') }}" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-left"></i> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('event-winner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="status" value="1">
                            <div class="form-group">
                                <label>Event</label>
                                <select name="event_id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($event as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" id="example">{{ old('note') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Jury Note</label>
                                <textarea name="jury_note" id="example">{{ old('jury_note') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Event Winner File</label>
                                <input type="file" name="excel" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label>Sertif File</label>
                                <input type="file" name="file[]" class="form-control-file" multiple>
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var editor = new FroalaEditor('#example',{
            toolbarButtons: {
            'moreText': {
                'buttons': ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting']
            },
            'moreParagraph': {
                'buttons': ['alignLeft', 'alignCenter', 'formatOLSimple', 'alignRight', 'alignJustify', 'formatOL', 'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent', 'indent', 'quote']
            },
            'moreRich': {
                'buttons': ['insertLink', 'insertImage', 'insertVideo', 'insertTable', 'emoticons', 'fontAwesome', 'specialCharacters', 'embedly', 'insertFile', 'insertHR']
            },
            'moreMisc': {
                'buttons': ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll', 'html', 'help']
            }
        },
        toolbarSticky: true,
        tabSpaces: 4

            // // Change buttons for XS screen.
            // toolbarButtonsXS: [['undo', 'redo'], ['bold', 'italic', 'underline']]
        });
    </script>
@endsection