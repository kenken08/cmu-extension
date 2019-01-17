@extends('layouts.admin')

@section('content')
<div class="row mt-5">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / {{$title}}</i>
    </div><hr>
</div>
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
                        <p>Upload the image of the created products or IEC materials of Extension Office.</p>
                    </div>

                    <div class="well well-sm well-toolbar">
                        <a class="btn btn-labeled btn-primary" href="" data-toggle="modal" data-target="#myModal">
                            <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Add Category
                        </a>
                    </div>
                    <table id="tbl-list" data-server="false" class="dt-table table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">Category</th>
                            <th class="text-center">Description</th>
                            <th class="text-center" style="width:200px;">Cover Photo</th>
                            <th class="text-center" style="width:200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="text-uppercase"><a href="/home/gallery/{{$category->id}}/photos">{{ $category->category }}</a></td>
                                    <td>{{ $category->desc }}</td>
                                    <td class="text-center"><img src="/storage/gal_photo/{{$category->gal_photo}}" width="150px" height="75px" alt=""></td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
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