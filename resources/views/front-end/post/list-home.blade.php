<div class="container">
    <div class="box-news">
        <div class="clearfix"></div>
        <div class="block-content">
            <div class="row">
                @php
                $cat1 = $cats->first();
                if($cats->count() == 2){
                    $cat2 = $cats->last();
                }else $cat2 = null;
                @endphp
                @if($cat1 != null)
                <div class="col-md-4">
                    <div class="box-news-col">
                        <div class="header-news-index">
                           <a href="{{route('post.list',['slug'=>$cat1->slug])}}"><h3 class="h3-news-index">{{$cat1->name}}</h3></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-content">
                            <div class="row">
                                @foreach($cat1->posts()->where('status',1)->orderby('created_at', 'desc')->take(5)->get() as $post)
                                <div class="media">
                                    <a class="pull-left pull-left-img-news" href="{{$post->link}}" target="_blank">
                                      <img class="media-object" src="{{$post->image}}" alt="{{$post->name}}">
                                    </a>
                                    <div class="media-body">
                                    <h4 class="media-heading media-heading-cc"> <a href="{{route('post.detail',$post->slug)}}">{{$post->name}}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(isset($info->video) && isset($info->image_video) && isset($info->title_video))
                <div class="col-md-4">
                    <div class="box-news-col">
                        <div class="header-news-index">
                            <h3 class="h3-news-index">Video</h3>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-content">
                            <div class="row">
                                {!! $info->video !!}
                                <div class="title_video">
                                {{ $info->title_video }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($cat2!= null)
                <div class="col-md-4">
                    <div class="box-news-col">
                        <div class="header-news-index">
                           <a href="{{route('post.list',['slug'=>$cat2->slug])}}"><h3 class="h3-news-index">{{$cat2->name}}</h3></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="block-content">
                            <div class="row">
                                @foreach($cat2->posts()->where('status',1)->orderby('created_at', 'desc')->take(5)->get() as $post)
                                <div class="media">
                                    <a class="pull-left pull-left-img-news" href="{{$post->link}}" target="_blank">
                                      <img class="media-object" src="{{$post->image}}" alt="{{$post->name}}">
                                    </a>
                                    <div class="media-body">
                                    @if($post->link != null)
                                    <h4 class="media-heading media-heading-cc"> <a href="{{$post->link}}" target="_blank">{{$post->name}}</a></h4>
                                    @else
                                    <h4 class="media-heading media-heading-cc"> <a href="{{route('post.detail',$post->slug)}}">{{$post->name}}</a></h4>
                                    @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
