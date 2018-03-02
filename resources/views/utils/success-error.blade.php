@section('success-error')

@if(Session::has('success'))
{{Session::get('success')}}
@elseif(Session::has('error'))
{{Session::get('error')}}
@endif
@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert-danger">
    {{ $error }}
</div>
@endforeach
@endif
@endsection