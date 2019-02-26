@section('success-error')

@if(Session::has('success'))
<div class="alert alert-success mt-1 mb-1">
    {{Session::get('success')}}
</div>
@elseif(Session::has('error'))
<div class="alert alert-error mt-1 mb-1">
    {{Session::get('error')}}
</div>
@endif
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
</div>
@endforeach
@endif
@endsection