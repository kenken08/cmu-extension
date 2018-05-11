@extends('layouts.app')

@section('content')
<br>
        {{-- <h1>{{$title}}</h1>
        <p>This are the following services</p>
        @if(count($services) > 0)
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{$service}}</li>
                @endforeach
            </ul>
        @endif --}}
        <p>{{$res}}</p>

@endsection