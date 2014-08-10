@section('content')
<div class="form-box" id="login-box">
<div class="header">Sign In</div>
{{ Form::open(array('route' => 'auth.store')) }}
    <div class="body bg-gray">
        <div class="form-group">
            {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'you@domain.com', 'autofocus' => 'autofocus')) }}
        </div>
        <div class="form-group">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'password')) }}
        </div>
    </div>
    <div class="footer">                                                               
        <button type="submit" class="btn bg-olive btn-block">Sign me in</button>  
        <!-- 
        <p><a href="#">I forgot my password</a></p>
        
        <a href="register.html" class="text-center">Register a new membership</a> -->
    </div>
{{ Form::close() }}
<br>
<br>
<br>
<!-- <div class="margin text-center">
    <span>Sign in using social networks</span>
    <br/>
    <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
    <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
    <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

</div> -->
@stop