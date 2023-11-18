@if ($message = Session::get('error'))
    <div class="alert alert-danger bg-gradient-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="las la-times"></i>
        </button>
        <strong>{{$message}}</strong>
    </div>
@endif
@if ($message = Session::get('success'))
    <div class="alert alert-success bg-gradient-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="las la-times"></i>
        </button>
        <strong>{{$message}}</strong>
    </div>
@endif
