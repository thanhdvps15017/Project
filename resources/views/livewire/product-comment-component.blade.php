{{--<div>--}}
{{--    <div class="comment_wrap">--}}
{{--        <h3 class=""><span>{{$productComments->count()}}</span> bình luận</h3>--}}
{{--        <ul class='comment-list'>--}}
{{--            @foreach($productComments as $productComment)--}}
{{--                <li class="comment-item">--}}
{{--                    <div class="comment-item__avatar"></div>--}}
{{--                    <div class="comment-item__content">--}}
{{--                        <div class="comment-item__content--title">--}}
{{--                            <h5 class="comment-item__name">{{$productComment->user->name}}</h5>--}}
{{--                            <span class="comment-item__date"><i class="far fa-clock"></i>{{$productComment->created_at->diffForHumans()}}</span>--}}
{{--                        </div>--}}
{{--                        <p class="comment-item__message">{{$productComment->message}}</p>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="form-comment">--}}
{{--   --}}
{{--	--}}
{{--        <div>--}}
{{--            <label for="">Nội dung</label>--}}
{{--            <textarea name="message" id="message" rows="4" wire:model.defer="message" placeholder="Để lại ý kiến của bạn"></textarea>--}}
{{--            @error('message')--}}
{{--            <small style="color: red">{{$message}}</small>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <button class="btn-submit" wire:click.prevent='storeComment'>--}}
{{--            <span>Gửi</span>--}}
{{--            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                <path d="M3.75 12H20.25" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                <path d="M13.5 5.25L20.25 12L13.5 18.75" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--            </svg>--}}
{{--        </button>--}}
{{--    --}}
{{--</div>--}}
