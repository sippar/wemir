@extends("dashboard._layouts.layout")

@section('page-head')
    {{--@parent--}}
@stop

@section('content')
    <div class="content-box"><!-- Start Content Box -->
        <div class="content-box-header">
            <h3>Manage Users</h3>
            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">Edit User</a></li> <!-- href must be unique and match the id of target div -->
                {{--<li><a href="#tab2">Add New</a></li>--}}
            </ul>
            <div class="clear"></div>
        </div> <!-- End .content-box-header -->
        <div class="content-box-content">
            {{ Form::model($user,["method"=>"PUT","route"=>["dashboard.users.update",$user->id],"files"=>false]) }}
                <fieldset><!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
                    <p>
                        {{ Form::label("email","E-mail") }}
                        {{ Form::email("email",$value = null, ["class"=>"text-input  large-input"]) }}
                        {{ $errors->first('email','<span class="input-notification error png_bg">:message</span>') }}

                    </p>
                    <p>
                        {{ Form::label("password","Password") }}
                        {{ Form::password("password",["class"=>"text-input  large-input"]) }}
                        {{ $errors->first('password','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::label("password_confirm","Password Confirm ") }}
                        {{ Form::password("password_confirm", ["class"=>"text-input  large-input"]) }}
                        {{ $errors->first('password_confirm','<span class="input-notification error png_bg">:message</span>') }}
                    </p>
                    <p>
                        {{ Form::submit("Submit",["class"=>"button"]) }}
                    </p>
                </fieldset>
                <div class="clear"></div><!-- End .clear -->
            {{ Form::close() }}
        </div> <!-- End .content-box-content -->
    </div> <!-- End .content-box -->
@stop