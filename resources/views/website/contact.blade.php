@extends('layouts.website')

@section('content')
<div class="body">
    <ol class="breadcrumb col-md-12">
        <div class="container">
            <li class="breadcrumb-item">
                <a class="text-secondary" href="/">Home</a>
                <span class="text-muted">/ {!! $title !!}</span>
            </li>
        </div>
    </ol>
</div>
    {{-- <section class="content bg-default padding padding-top padding-bottom">  
        <div class="container">
            <div class="row">
                <div class="body col-sm-7 col-lg-8">
                    @include('website.partials.page_header')
                    <h2>Send us a Message</h2>
                        {!! Form::open(['action' => 'MessageController@send', 'method' => 'POST'])!!}
                        {!! csrf_field() !!}
                        @if(!\Auth::check())
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone number">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ form_error_class('message', $errors) }}">
                                    <label>Message</label>
                                    <textarea rows="5" name="message" class="form-control" placeholder="Write your message" style="height:200px;" required></textarea>
                                    {!! form_error_message('message', $errors) !!}
                                </div>
                            </div>
                        </div>

                        @include('website.partials.form.feedback')

                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <button type="submit" class="btn btn-primary btn-submit">Send
                                    Message
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <div class="side hidden-xs col-sm-5 col-lg-4">
                    <div class="box">
                        <div class="card text-center border-warning" style="margin-top:50px; margin-bottom:50px"> 
                            <div class="box">
                                <div class="text-center animated flipInY">
                                    <img src="/images/cmu.png" class="img img-circle" alt="Contact" style="width:110px; height:110px;margin-top:-50px;">
                                </div>
                                <div class="card-body text-center animated flipInX">
                                    <p>Central Mindanao University</p>
                                    <h4>Extension Office</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact1">
        <div class="container wow fadeInUp">
            <div class="section-header">
            <h3 class="section-title">Contact</h3>
            <p class="section-description">Send us a Message</p>
            </div>
        </div>
    
        <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->
    
        <div class="container wow fadeInUp">
            <div class="row justify-content-center">
    
            <div class="col-lg-3 col-md-4">
    
                <div class="info">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p>P-12, College Park, Musuan<br>Philippines, Region 10</p>
                </div>
    
                <div>
                    <i class="fa fa-envelope"></i>
                    <p>info@extensionoffice.com</p>
                </div>
    
                <div>
                    <i class="fa fa-phone"></i>
                    <p>+639067578290</p>
                </div>
                </div>
    
                <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
    
            </div>
    
            <div class="col-lg-5 col-md-8">
                <div class="form">
                {{-- <div id="sendmessage">Your message has been sent. Thank you!</div> --}}
                <div id="errormessage"></div>
                {!! Form::open(['action' => 'MessageController@send', 'method' => 'POST'])!!}
                {!! csrf_field() !!}
                @if(Auth::check())
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{user()->firstname.' '.user()->lastname}}" readonly/>
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="{{user()->email}}" readonly/>
                    <div class="validation"></div>
                    </div>
                @else
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value=""/>
                    <div class="validation"></div>
                    </div>
                @endif

                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                    </div>
                
                    <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_key') }}"></script>
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('#form-contact-us').submit(function () {
                return submitForm($(this));
            });

            /**
             * Helper to submit the forms via ajax
             * @param form
             * @returns {boolean}
             */
            function submitForm($form)
            {
                var inputs = [];
                if (!FORM.validateForm($form, inputs)) {
                    return false;
                }

                FORM.sendFormToServer($form, $form.serialize());
                return false;
            }

            var map = initGoogleMap('js-map-contact-us', -22.9666717, 14.5019224, 14);
//            addGoogleMapsMarker(map, -22.6228835, 17.0939617, false);
        });
    </script>
@endsection
