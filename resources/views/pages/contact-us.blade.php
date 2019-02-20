@extends('layouts.app')
@section('content')

<div class="container">
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>


<div class="container" style="display:table; background-color: #fff;">
    <br>
    <div class="card">
        <div class="card-header">
            <h3 align="center" style="color: brown;"><strong> CONTACT US</strong></h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <br>
            <h5 class="jumbotron" style="align:center;background-color:#789">
                Contact us today for enquiries, bookings, partnership and collaboration.
            </h5>

            <div class="jumbotron">
                <h5 style="color:brown; text-align: center;">HEAD OFFICE</h5>
                <hr>
                <p> Helen Plaza, Lakowe, Ibeju-Lekki, Lagos.</p>
                <br>

                <div class="row">
                    <div class="col-md-6">
                        <h4 style="color:brown;">Telephone</h4>
                        <p>+2348068250409, +234906636117</p>
                    </div>
                    <div class="col-md-6">
                        <h4 style="color:brown;">Email</h4>
                        <p>info@annmedia.com</p>
                    </div>
                </div>
            </div>

        </div>



        <!-- <div class="right-half" style="background-color:#fff; position:absolute; right:0px; width:50%; padding-left:50px;"> -->
            <div class="col-lg-6">
                <br>
                <h4 style="color:brown; align:center;">Got Message For Us?</h4>
                <hr>
                <form class="form-horizontal" method="POST" action="{{ route('feedbacks.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-6 control-label"><i class="fa fa-user" style="padding:2px; font-size:20px; width:30px;"></i>Full Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                        <label for="subject" class="col-md-6 control-label">Subject</label>

                        <div class="col-md-8">
                            <input id="subject" type="subject" class="form-control" name="subject" required>

                            @if ($errors->has('subject'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                        <label for="message" class="col-md-4 control-label">Your Message</label>

                        <div class="col-md-8">
                            <textarea id="message" type="textarea" class="form-control" name="message" required></textarea>

                            @if ($errors->has('message'))
                            <span class="help-block">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="phone" class="col-md-4 control-label"><i class="fa fa-phone" style="padding:2px; font-size:20px; width:30px;"></i>Phone Number</label>

                        <div class="col-md-8">
                            <input id="phone" type="phone" class="form-control" name="phone" required>

                            @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label"><i class="fa fa-envelope" style="padding:2px; font-size:20px; width:30px;"></i>E-Mail</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>


                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>




                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-success btn-lg">
                                Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    

    @endsection