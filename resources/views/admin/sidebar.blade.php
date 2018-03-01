@section('sidebar')
<div id="sidebar">
    <div class="col-sm-12 mb-4">
        <div class="card bg-sidebar">
            <div class="d-flex justify-content-center mt-2">
                <div class="rounded-circle text-center" style="background: url('http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png') no-repeat; height: 120px; width: 120px; background-size: cover;background-position: center center;">
                </div>
            </div>
            <div class="card-header">
                <a href="{{url('/admin/dashboard')}}" >Dashboard</a>
            </div>
            <ul class="list-group list-group-flush">
             <li class="list-group-item">
                <a class="d-flex flex-row justify-content-start" href="{{url('')}}">
                    <div class=""><i class="fa fa-home"></i></div>
                    <div class="pl-3" style="cursor: pointer;">Home</div>
                </a>
            </li>
            <li class="list-group-item">
                <a class="d-flex flex-row justify-content-start" data-toggle="dropdown">
                    <div class=""><i class="fa fa-map-marker"></i></div>
                    <div class="pl-3" style="cursor: pointer;">&nbsp; Locations</div>
                </a>
                <div class="dropdown-menu bg-sidebar border p-0" aria-labelledby="dropdownMenu2">
                    <a  href="{{url('admin/location/add-district')}}" class="dropdown-item" type="button">
                        Add District
                    </a>
                    <a  href="{{url('admin/location/add-city')}}" class="dropdown-item" type="button">
                        Add Cities
                    </a>
                    <a  href="{{url('admin/location')}}" class="dropdown-item" type="button">
                        ALL Location
                    </a>
                </div>
            </li>
            <li class="list-group-item">
                <div class="d-flex flex-row justify-content-start">
                    <div class="text-danger"><i class="fa fa-power-off"></i></div>
                    <a class="pl-3" href="{{url('account/logout')}}" style="cursor: pointer;">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</div>
</div>
@endsection