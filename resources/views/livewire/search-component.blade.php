<div>
    {{-- Do your work, then step back. --}}
    <div class="search-form">
        <div class="position-relative">
            <input wire:model="keyword" type="text" placeholder=" Tìm kiếm thông tin" >
            <div class="position-absolute result-list">
                <ul>
                    @if ($keyword != null)
                        @if ($searchResults->count() < 1)
                            <li>khong tim thay</li>
                        @else
                        @foreach ($searchResults as $result )
                        <li> <a href="{{url('san-pham/'.$result->slug)}}">{{$result->name}}</a> </li>

                        @endforeach

                        @endif
                    @endif

                </ul>
            </div>
        </div>
        <button class="iconSearchHeader" ><i class="fa fa-search"></i></button>
        <div id="mapId"></div>
    </div>
</div>
