@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    @if(isset($project->id))
                        <span>Objective of {{$project->project_name}}</span>
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
                                        <td class="text-uppercase hidden" style="vertical-align:middle;"><input type="text" name="id[]" value="{{ $object->id }}"></td>
                                        <td class="text-uppercase" style="vertical-align:middle;">
                                                <strong>{{ $object->objective }}</strong>
                                        </td>
                                        <td class="text-uppercase text-center" style="vertical-align:middle;">
                                            @if($object->status == "Pending")
                                                <span class="label input-lg label-warning">{{ $object->status }}</span>
                                            @else
                                                <span class="label input-lg label-success">{{ $object->status }}</span>
                                            @endif    
                                        </td>
                                        @if($object->status != 'Completed')
                                            <td>
                                                <select class="form-control" name="editobj[]" id="editobj">
                                                    <option class="hidden" value="{{$object->status}}"></option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <select class="form-control" name="editobj[]" id="editobj">
                                                    <option class="hidden" selected value="{{$object->status}}"></option>
                                                    <option disabled>Completed</option>
                                                </select>
                                            </td>
                                        @endif
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