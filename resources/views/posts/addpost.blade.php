@extends('layouts.app')

@section('content')
<br>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form form-group">
            <div class="card card-header bg-dark border-bottom-0">
                    <strong class="text text-lg-left text-light">Create Post</strong>
            </div>
            <div class="card card-body">
                <div class="form-inline">
                        {{form::submit('Add Post', ['class'=>'btn btn-info'])}} &nbsp;
                        {{form::file('cover_image', ['class'=>'btn btn-sm btn-outline-info'])}}
                </div>          
                <p>        
                <div class="form-group">
                    {{Form::text('title','', ['class'=>'form-control', 'placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body', 'Body')}}
                    {{Form::textarea('body','', ['id'=>'article-ckeditor','class'=>'form-control border-success', 'placeholder'=>'Body Text'])}}
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@endsection