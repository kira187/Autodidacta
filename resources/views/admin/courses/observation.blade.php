@extends('layouts.dashboard')
@section('title-page')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Revisión de curso</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.courses.show', $course) }}">Curso</a></li>
                            <li class="breadcrumb-item active">Revisión</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="blog-edit-wrapper">
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-body">
                <div class="media">
                <div class="avatar mr-75">
                    <img src="{{ $course->teacher->profile_photo_url }}" width="38" height="38" alt="Avatar" />
                </div>
                <div class="media-body">
                    <h6 class="mb-25">{{ $course->teacher->name }}</h6>
                    <p class="card-text">Ultima actualización: {{ $course->updated_at->format('d/m/Y') }}</p>
                </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 col-12">
                    <div class="form-group mb-2">
                        <label for="blog-edit-title">Titulo</label>
                        <input type="text" class="form-control" value="{{ $course->title }}" disabled/>
                    </div>
                    </div>
                    <div class="col-md-6 col-12">
                    <div class="form-group mb-2">
                        <label for="blog-edit-category">Category</label>
                        <input type="text" class="form-control" value="{{ $course->category->name }}" disabled/>
                    </div>
                    </div>
                    <div class="col-md-6 col-12">
                    <div class="form-group mb-2">
                        <label for="blog-edit-slug">Slug</label>
                        <input type="text" class="form-control" value="{{ $course->slug }}" disabled/>
                    </div>
                    </div>
                    <div class="col-md-6 col-12">
                    <div class="form-group mb-2">
                        <label for="blog-edit-status">Status</label>
                        <input type="text" class="form-control" value="{{ $course->status == 2 ? 'Revisión' : 'Borrador' }}" disabled/>
                    </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-2">
                            {!! Form::open(['route' => ['admin.courses.reject', $course]]) !!}
                                <div class="form-group">
                                    {!! Form::label('body', 'Observaciones del curso') !!}
                                    {!! Form::textarea('body', null) !!}

                                    @error('body')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    {!! Form::submit('Rechazar curso', ['class' => 'btn btn-primary mr-1']) !!}
                                    <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-outline-secondary">Cancelar</a>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#body' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
@endsection