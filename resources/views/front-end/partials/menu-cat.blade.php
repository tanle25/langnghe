 <div class="col-md-1-5 hidden-sm hidden-xs">
    <div class="woocommerce widget_product_categories">
        <h2 class="widget-title-h2">Danh mục</h2>
        <div id='cssmenu'>
            <ul>
                @foreach($types as $type)
                <li  class="has-sub" >
                    <a  class="dropdown-toggle"  href="{{route('category.detail',['slug'=>$type->slug])}}">
                        {{$type->name}} 
                    </a>
                    <i class="fa fa-plus fa-sub sub-dropmenu" aria-expanded="false"></i>
                    <ul>
                        @foreach($type->child->where('status',1)->get() as $child)
                        <li class="has-sub">
                            <a  href="{{route('category.detail',['slug'=>$child->slug])}}">
                                {{$child->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>