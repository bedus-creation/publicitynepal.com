@extends("layout.app-backend")
@include('admin.sidebar')
@include('utils.success-error')

@section('head')
<link rel="stylesheet" href="{{asset('css/file.upload.css')}}">
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{url('admin/advertisements/'.$advertisement->id)}}">
        @method('PUT')
        @csrf
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                @yield('success-error')
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Advertisement Title</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="{{$advertisement->name}}">
                    </div>    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Select Advertise Page </label>
                    </div>
                    <div class="col-md-8">
                        <select name="page" class="form-control">
                            <option value="home" {{$advertisement->page=='home' ? 'selected':'' }}>Home Page</option>
                            <option value="category" {{$advertisement->page=='category' ? 'selected':'' }}>Category Page</option>
                            <option value="news" {{$advertisement->page=='news' ? 'selected':'' }}>News Page</option>
                        </select>
                    </div>    
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Advertisement Order </label>
                    </div>
                    <div class="col-md-8">
                        <input type="number" name="order" class="form-control" value="{{$advertisement->order}}">
                    </div>     
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Redirection Url</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="url" class="form-control" value="{{$advertisement->url}}">
                    </div>    
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>Advertisement Picture</label>
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" name="cover"
                        value="{{$advertisement->cover}}">
                        <div class="btn btn-secondary form-control" id="cover">
                            set Picture
                        </div>
                        <span id="cover-image">
                            <img src="{{$advertisement->cover}}" class="img-fluid">
                        </span>
                    </div>
                </div>
            </div>  
            <div class="col-md-11">
                <button class="btn btn-success float-right">Save Advertisement</button>
            </div>
        </div>
    </form>
</div>


@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/file.upload.js')}}"></script>
<script>
    $('#cover').aammui({
        baseUrl:'{{url('')}}/',
        inputId:"cover",
        imageId:'cover-image',
        serverUploadUrl:'{{url('')}}/media/upload',
        serverAllFileUrl:'/getfiles'
    });
</script>
@endsection