<style>
    .lnt{
        font-size:30px;
        text-align: center;
        padding: 0 10px;
        font-family: 'Eczar', serif;
        font-weight: 600;
        line-height: 1.5;
    }
    .lnt24{
        font-size:24px;
        text-align: center;
        padding: 0 10px;
        font-family: 'Eczar', serif;
        font-weight: 600;
        line-height: 1.5;
    }
    .lnt18{
        font-size:14px;
        text-align: justify;
        padding: 0 10px;
        font-family: 'Eczar', serif;
        font-weight: 600;
        line-height: 1.5;
    }
    .ig8{
        height: 18rem;
    }
    a:hover {
        text-decoration: none;  
    }
    .card-footer{
        line-height: 1.5;
        text-align: justify;
        font-size:16px;
        font-family: 'Eczar', serif;
        padding: 20px 15px;
    }
    .nav-c{
        display: flex;
        justify-content: center;
    }
    .nav li{
        width: 33%;
        text-align: center;
    }
    .nav-c>li>a{
        font-family: 'Eczar', serif;
        line-height: 1.5;
        font-size: 18px;
        border-left:1px solid #f1f1f1;
        border-right:1px solid #f1f1f1;
    }
    .nav-c >li>a {
        border-bottom: 4px solid #666;
    }
    .nav-c >li .active{
        border-bottom: 4px solid red;
    }
    .mi4{
        margin: 10px;
        height: 120px;
        background-size: cover !important;
        background-position: center !important ;
        width:140px;
    }
    .mi2{
        margin: 10px;
        height: 40px;
        background-size: cover !important;
        background-position: center !important ;
        width:60px;
    }
</style>
<div class="container">
    <div class="col-md-9 mt-4">
        <div class="row">
            <div class="col-md-6 pt-0 mb-3" style="padding:0 5px">    
            @if(count($news->relations)>0)
                <div class="card border-0 l-n-h" style="background:#fafafa;">	
                    <a href ="{{url('news'.'/'.$news->relations[0]->posts->id)}}" class="">
                        <div class="card-block">
                            <p class="lnt" >
                                {{$news->relations[0]->posts->title}}
                            </p>
                        </div>
                        <div style="background:url('{{$news->relations[0]->posts->featured_photo}}')" class="ig8">
                        </div>
                        <div class="card-footer text-dark">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! \Str::limit(strip_tags($news->relations[0]->posts->content), $limit = 250, $end = '....') !!}
                        </div>
                    </a>
                </div>
            @endif
            </div>
            <div class="col-md-6">
                <ul class="nav nav-c mb-3" id="nav-tab" role="tablist">
                    <li class="">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">
                            {{$tab1->name}}
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                            {{$tab2->name}}
                        </a>
                    </li>
                    <li class="">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">
                            {{$tab3->name}}
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        @if(count($tab1->relations)>0)
                        @foreach($tab1->relations->slice(0,2) as $item)
                        <a href="{{url('/news/'.$item->posts->id)}}">
                        <div class="">
                            <div class="lnt24">
                                {{$item->posts->title}}
                            </div>
                            <div class="media">
                                <div class="mi4" style="background:url('{{$item->posts->featured_photo}}');" ></div>
                                <div class="media-body m-1">
                                    {!! \Str::limit(strip_tags($item->posts->content), $limit = 150, $end = '....') !!}
                                </div>
                            </div>
                        </div>
                        </a>
                        <hr>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        @if(count($tab2->relations)>0)
                        @foreach($tab2->relations->slice(0,6) as $key=> $item)
                        <a href="{{url('/news/'.$item->id)}}">
                        <div class="">
                            <div class="media">
                                <div style="padding:10px;">
                                    {{ $key+1}} .    
                                </div>
                                <div class="mi2" style="background:url('{{$item->posts->featured_photo}}');" ></div>
                                <div class="media-body m-1 lnt18">
                                    {{$item->posts->title}}
                                </div>
                            </div>
                        </div>
                        </a>
                        <hr>
                        @endforeach
                        @endif
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        @if(count($tab3->relations)>0)
                        @foreach($tab3->relations->slice(0,6) as $key=> $item)
                        <div class="">
                            <div class="media">
                                <div style="padding:10px;">
                                    {{ $key+1}} .    
                                </div>
                                <div class="mi2" style="background:url('{{$item->posts->featured_photo}}');" ></div>
                                <div class="media-body m-1 lnt18">
                                    {{$item->posts->title}}
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(count($news->relations)>0)
                <div class="row card-group">
                    @foreach($news->relations->slice(1, 6) as $item)
                    <div class="col-md-4 pt-0 mb-3" style="padding:0 5px">
                        <div class="card h-100  border-0" style="background:#fafafa;">	
                            <a href ="{{url('news'.'/'.$item->posts->id)}}" class="">
                                <div class="card-block">
                                    <p class="content pt-4" >
                                        {{$item->posts->title}}
                                        <br>
                                        <small class="text-muted"><i class="fa fa-clock-o text-muted"></i>&nbsp;{{
                                            $item->posts->created_at->diffForHumans()}}
                                        </small>
                                    </p>
                                </div>
                                <div style="background:url('{{$item->posts->featured_photo}}')" class="ig4">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
