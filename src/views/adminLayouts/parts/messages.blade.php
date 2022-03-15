@if(session()->get('success'))
    <div class="alert alert-success text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong class="d-block d-sm-inline-block-force"> رسالة نجاح: </strong>
        <p class="mt-3">{!! session('success') !!}</p>
    </div>
@endif

@if(session()->get('error'))
    <div class="alert alert-danger text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong class="d-block d-sm-inline-block-force"> رسالة خطأ: </strong>
        <p  class="mt-3">{!! session('error') !!}</p>
    </div>
@endif