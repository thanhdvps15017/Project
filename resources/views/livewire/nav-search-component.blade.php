<div>
    <form action="{{route('search')}}" role="search" method="get" id="searchform" class="searchform">
        <input type="text" name="q" id='s' placeholder="Nhập ở đây" wire:model='q'>
        <input type="submit" id="searchsubmit" value="Tìm kiếm">
    </form>
    @if($q)
    <ul class="result-search">
        @foreach($results as $result)
            @php $img = json_decode($result->images) @endphp
        <li>
            <div class="result-item">
                <div class="result-item__img">
                    <a href="{{route('single-product',[$result->slug])}}">
                        {!! App\Http\Controllers\Controller::get_img_attachment($img[0])!!}
                    </a>
                </div>
                <div class="result-item__info">
                    <h3 class="result-item__name">
                        <a href="{{route('single-product',[$result->slug])}}">{{$result->name}}</a>
                    </h3>
                    <span class="search_price">Giá: <strong>{{number_format($result->price, 0, ',', '.')}} vnđ</strong></span>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    @endif
</div>
