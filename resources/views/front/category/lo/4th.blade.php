<div class="card h-100 border-0">
    @if(count($data->posts)>0)
    <a href="{{url('/news/'.$data->posts[0]->id)}}">
        <div class="position-absolute pl-4 pr-4 pt-2 pb-2 p c-c-t">{{ $data->name }}</div>
        <div class="c-i-m bg-i" style="background:url('{{$data->posts[0]->featured_photo}}');">
        </div>
        <div class="card-body">
            <p class="c_title mb-0 text-justify">{{str_limit($data->posts[0]->title,50,'....')}}</p>
            <small class="text-muted c-d-t"><i class="fa fa-calendar c-d-t text-muted pr-2"></i>
                {{$data->posts[0]->created_at->diffForHumans()}}</small>
            <p class="pt-1  text-justify">{!! \Str::limit(strip_tags($data->posts[0]->content), $limit =
                90, $end =
                '....') !!}</p>
        </div>
    </a>
    @endif
    @if(count($data->posts)>0)
    @foreach($data->posts->slice(1,3) as $key=> $item)
    <a href="{{url('/news/'.$item->id)}}">
        <div class="">
            <div class="media">
                <div class="mi4" style="background:url('{{$item->featured_photo}}');"></div>
                <div class="media-body pl-2">
                    <p class="mb-0 pb-1 c_title" style="font-size:16px;">{{$item->title}}</p>
                    <span class="text-muted c-d-t"><i class="fa fa-calendar c-d-t text-muted pr-2"></i>
                        {{$item->created_at->diffForHumans()}}</span>
                </div>
            </div>
        </div>
    </a>
    {!!($key<3)?'<hr>':''!!}
        @endforeach
        @endif
</div>