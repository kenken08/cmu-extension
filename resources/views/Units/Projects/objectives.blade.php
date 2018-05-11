@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    @if(isset($project->id))
                        <span>Projects Objective of {{$project->project_name}}</span>
                    @endif
                    
                </h3>
            </div>
            <div class="box-body">
                {!!Form::open(['action' => ['ProjectsController@saveobj'], 'method'=>'POST'])!!}
                {{Form::token()}}
                <input name="project" type="number" value={{$project->id}} class="hidden">
                <table id="table" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Objective Name</th>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Status</th>
                            <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($objectivesdet as $obj)
                            @if($obj->proj_id == $project->id)
                                <input class="hidden" type="text" name="objdet" value="{{$obj->id}}">
                            @endif
                        @endforeach
                        @foreach($objectives as $object)
                            @php($i=1)
                                @if($object->proj_id == $project->id)
                                    <tr>
                                        <td class="text-uppercase hidden"><input type="text" name="id[]" value="{{ $object->id }}"></td>
                                        <td class="text-uppercase">
                                                <strong>{{ $object->objective }}</strong>
                                        </td>
                                        <td class="text-uppercase text-center">
                                            @if($object->status == "Pending")
                                                <span class="label input-lg label-danger">{{ $object->status }}</span>
                                            @else
                                                <span class="label input-lg label-success">{{ $object->status }}</span>
                                            @endif    
                                        </td>
                                        <td>
                                            <div class="btn-toolbar">
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <select class="form-control" name="editobj[]" id="editobj">
                                                            <option class="hidden" value="{{$object->status}}"></option>
                                                            <option value="Pending">Pending</option>
                                                            <option value="Completed">Completed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @php($i++)
                        @endforeach
                    </tbody>
                </table>
                <div class="form-footer">
                    <button class="btn btn-labeled btn-primary btn-submit">
                        <span class="btn-label"><i class="fa fa-fw fa-save"></i></span>Submit
                    </button>
                {!!Form::close()!!}
                    <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                        <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection