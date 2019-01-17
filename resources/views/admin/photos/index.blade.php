@extends('layouts.admin')

@section('content')
@include('admin.photos.modal')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-table"></i></span>
                        <span>List All Photos</span>
                    </h3>
                </div>

                <div class="box-body">
                    <div class="callout callout-info callout-help">
                        <h4 class="title">{{ $title }}</h4>
                        @if(isset($category->id))
                            <p>List of Photos of {{$category->category}}</p>
                        @endif
                    </div>
                    <div class="well well-sm well-toolbar">
                        <a class="btn btn-labeled btn-primary" href="" data-toggle="modal" data-target="#myModal">
                            <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Add Photos
                        </a>
                    </div>
                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Category</th>
                            <th style="width:200px" class="text-center">Image</th>
                            <th style="width:300px" class="text-center">Description</th>
                            <th style="width:100px" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($photos as $photo)
                            @if($photo->cat_id == $category->id)
                                <tr>
                                    <td>{{ $photo->name }}</td>
                                    @foreach($categories as $cat)
                                        @if($cat->id == $photo->cat_id)
                                            <td>{{ $cat->category}}</td>
                                        @endif
                                    @endforeach
                                    <td class="text-center">
                                        <a target="_blank" href="">
                                            <img style="height: 75px; width: 150px" src="/storage/cover_images/{{$photo->image}}" title="{{ $photo->image }}">
                                        </a>
                                    </td>
                                    <td>{{ $photo->description }}</td>
                                    <td class="text-center">
                                        <a onclick="document.getElementById('delete-gal').submit()" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete {{$photo->name}}">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                        <form id="delete-gal" action="{{ route('delete-gal',$gid) }}" method="POST" enctype="multipart/form-data">@csrf</form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection