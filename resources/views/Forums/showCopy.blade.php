@extends('layouts.website')
@section('content')
<section class="content p-3">
    <div class="body">
        <ol class="breadcrumb bg-light col-md-12">
            <li class="breadcrumb-item">
                <a class="text-secondary" href="/">Home</a>
                <a class="text-secondary" href="/projects">/ Projects</a>
                <span class="text-muted">/ {!! $title !!}</span>
            </li>
        </ol>
    </div>
    @if(count($trainings) <= 0)
        <div class="text-center container animated fadeInLeft">
            <div class="row justify-text-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-fw fa-warning" style="font-size:80px"></i>
                            <h2 class="text-center text-muted" style="margin-top:15px;">No Trainings under {{$project}}!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="container"> @include('website.partials.page_header')</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach($trainings as $training)
                            <div class="row mt-2 mb-8">
                                <div class="col-sm-12">
                                    <div class="card animated fadeIn">
                                        <div class="card-header">
                                            <h5 class="card-title"><i class="fa fa-fw fa-newspaper-o"></i>{{$training->training_name}}</h5>
                                        </div>
                                        <div class="card-body text-justify">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img class="img img-fluid mb-3" src="/images/cmulogob1.png">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="container border-left">
                                                        <p>Sample Description</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-6 text-left">
                                                <small>From: {{date('M d, Y', strtotime($training->fdate_conducted) )}} To: {{date('M d, Y', strtotime($training->tdate_conducted) )}}</small>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <a href="" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-plus"></i>Request for Training</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        @endforeach
                    </div>
                    <div class="side d-sm-block col-sm-8 col-lg-4">
                        <div class="card">
                            <div class="card-body bg-navy-active">
                                <h4 class="header">Trainings List</h4>
                                <ul>
                                    @foreach($trainings as $training)
                                        <li><a href="">{!! $training->training_name !!}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-right pagination-sm">{{$trainings->links()}}</div>
    @endif
@endsection

{{-- TIMELINE FIRST --}}
{{-- <div class="col-md-8">
        <div class="container">
            <div class="page-header">
                
        <h1 id="timeline">Timeline</h1>
        
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                            <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small>
                            </p>
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                            <hr>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-cog"></i>  <span class="caret"></span>
        
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i>
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            
        <h4 class="timeline-title">Mussum ipsum cacilds</h4>
        
                        </div>
                        <div class="timeline-body">
                            <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div> --}}


    {{-- TimeLine 2 --}}
    <div class="col-md-7"><br>
        <h2>{{$project}} Timeline</h2>
        <ul class="timeline">
            <li class="timeline-milestone is-completed timeline-start">
            <div class="timeline-action">
                <h2 class="title">Begin</h2>
                <span class="date">First quarter 2013</span>
                <div class="content">
                We will have a small kickoff
                </div>
            </div>
            </li>
            <li class="timeline-milestone is-current">
            <div class="timeline-action is-expandable expanded">
                <h2 class="title">Initial planning</h2>
                <span class="date">Second quarter 2013</span>
                <div class="content">
                <ul class="file-list">
                    <li><a href="example/video" class="video-link">Introduction video</a></li>
                    <li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li>
                    <li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li>
                    <li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li>
                </ul>
                </div>
            </div>
            </li>
            <li class="timeline-milestone is-future">
            <div class="timeline-action is-expandable">
                <h2 class="title">Start construction</h2>
                <span class="date">Fourth quarter 2013</span>
                <div class="content">
                
                </div>
            </div>
            </li>
            <li class="timeline-milestone is-future timeline-end">
            <div class="timeline-action">
                <h2 class="title">Test and verify</h2>
                <span class="date">Second quarter 2014</span>
                <div class="content">
                
                </div>
            </div>
            </li>
        </ul>
    </div>

    {{-- NEW --}}
     {{-- <div class="col-md-7"><br>
                        <h2>{{$project}} Timeline</h2>
                        <ul class="timeline">
                            <li class="timeline-milestone is-completed timeline-start">
                                <div class="timeline-action">
                                    <h2 class="title">Begin</h2>
                                    <span class="date">First quarter 2013</span>
                                    <div class="content">
                                        We will have a small kickoff
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-milestone is-current">
                                <div class="timeline-action is-expandable expanded">
                                    <h2 class="title">Initial planning</h2>
                                    <span class="date">Second quarter 2013</span>
                                    <div class="content">
                                        <ul class="file-list">
                                            <li><a href="example/video" class="video-link">Introduction video</a></li>
                                            <li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li>
                                            <li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li>
                                            <li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-milestone is-future">
                                <div class="timeline-action is-expandable">
                                    <h2 class="title">Start construction</h2>
                                    <span class="date">Fourth quarter 2013</span>
                                    <div class="content">
                                    
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-milestone is-future timeline-end">
                                <div class="timeline-action">
                                    <h2 class="title">Test and verify</h2>
                                    <span class="date">Second quarter 2014</span>
                                    <div class="content">
                                    
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}

                    {{-- @foreach($objectives as $ob)
                    @if($ob->proj_id==$item->id)
                        <tr>
                            <td>
                                <a href="">
                                    <div class="row">
                                        <div class="form-group col-md-12 animated flipInX">
                                            <div class="col-12" style="margin-left:-35px">
                                                <div class="card black1" style="border:black;border-right: 5px solid #43ac6a!important;">
                                                    <a class="text-white" href="" style="margin-left:10px; margin-top:8.5px" data-toggle="tooltip" title="View Project {!! $item->project_name !!}">
                                                            <label style="margin-left:10px;margin-top:3px" class="btn-xs">{!! $item->project_name !!}</label>
                                                        @if((days($item->date_conducted, $item->to_date) + $ob->total)<=40)
                                                            <label style="margin-right:5px" class="btn btn-sm btn-outline-danger pull-right">{{days($item->date_conducted, $item->to_date) + $ob->total}}%</label>
                                                        @elseif((days($item->date_conducted, $item->to_date) + $ob->total)<=90)
                                                            <label style="margin-right:5px" class="btn btn-sm btn-outline-warning pull-right">{{days($item->date_conducted, $item->to_date) + $ob->total}}%</label>
                                                        @else
                                                            <label style="margin-right:5px" class="btn btn-sm btn-outline-success pull-right">{{days($item->date_conducted, $item->to_date) + $ob->total}}%</label>
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach --}}

                {{-- {{(\Carbon\Carbon::today() >= date('Y-M-d h:m:s', strtotime($act->date_of_activity)))? '#'.dechex(rand(0x000000, 0xFFFFFF)) : 'grey'}} --}}