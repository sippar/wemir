@if(Session::has('message'))
    <div class="success">
        <h4>{{{ Session::get('message') }}}</h4>
    </div>
@elseif(count($errors))
    @foreach($errors->all() as $error)
    <div class="notification error png_bg">
        <a href="#" class="close"><img src="{{ asset("packages/dashboard/resources/images/icons/cross_grey_small.png") }}" title="Close this notification" alt="close"></a>
        <div>
             {{  $error }}
        </div>
    </div>
    @endforeach
@endif