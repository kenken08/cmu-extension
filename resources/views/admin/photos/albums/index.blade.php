@extends('layouts.admin')

@section('content')
    @include('admin.photos.albums.modal')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All Photo Albums</span>
                    </h3>
                </div>

                <div class="box-body">
                    <div class="callout callout-info callout-help">
                        <h4 class="title">{{$title}}</h4>
                        <p>Upload the image of the created products of extension office with description.</p>
                    </div>

                    <div class="well well-sm well-toolbar">
                        <a class="btn btn-labeled btn-primary" href="" data-toggle="modal" data-target="#myModal">
                            <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Add Category
                        </a>
                    </div>
                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td><a href="/home/gallery/{{$category->id}}/photos">{{ $category->category }}</a></td>
                                    <td>{{ $category->desc }}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-info btn-xs" data-toggle="tooltip" title="Add Photos to {{ $category->category }}">
                                                    <i class="fa fa-image"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection