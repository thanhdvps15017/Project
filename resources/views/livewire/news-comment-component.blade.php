<div>
    <div class="grid-container">
        <div class="section_heading">
            <div class="sec_title">
                Bình luận
            </div>
        </div>
        <div class="comment_wrapper">
            <div class="comment_box">
                <h3 class=""><span>{{$newsComments->count()}}</span> bình luận</h3>
                <div class='comment_list'>
                    @foreach($newsComments as $newsComment)
                    <div class="comment_item">
                        <div class="comment_avatar">
                            <img src="{{asset($newsComment->user->avatar)}}" alt="">
                        </div>
                        <div class="comment_content">
                            <div class="comment_content_title">
                                <h5 class="comment_name">{{$newsComment->user->name}}</h5>
                                <span class="comment_date"><i class="far fa-clock"></i>{{date('d-m-Y', strtotime($newsComment->created_at))}}</span>
                            </div>
                            <p class="comment_message">{{$newsComment->message}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper form-comment">
                <form wire:submit.prevent="storeComment" method="POST">
                    <div class="avatar_current">
                        <img src="{{asset(Auth::user()->avatar)}}" alt="">
                    </div>
                    <div class="add_comment_box">
                        <textarea name="message" id="message" rows="3" wire:model.defer="message" placeholder="Để lại bình luận của bạn"></textarea>
                        @error('message')
                        <small style="color: red">{{$message}}</small>
                        @enderror
                        <button type="submit" class="btn-submit">
                            <span>GỬI</span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.711 3.36355L2.24282 8.29049C2.09586 8.33194 1.96506 8.41725 1.86789 8.53503C1.77072 8.65281 1.71181 8.79744 1.69904 8.9496C1.68627 9.10175 1.72024 9.25418 1.79642 9.38651C1.8726 9.51884 1.98736 9.62476 2.12535 9.69013L10.1514 13.4919C10.3079 13.5661 10.434 13.6921 10.5081 13.8487L14.3099 21.8747C14.3753 22.0127 14.4812 22.1274 14.6135 22.2036C14.7458 22.2798 14.8983 22.3138 15.0504 22.301C15.2026 22.2882 15.3472 22.2293 15.465 22.1321C15.5828 22.035 15.6681 21.9042 15.7095 21.7572L20.6365 4.28898C20.6727 4.16067 20.674 4.02503 20.6403 3.89603C20.6067 3.76703 20.5392 3.64933 20.445 3.55506C20.3507 3.46079 20.233 3.39335 20.104 3.35969C19.975 3.32603 19.8394 3.32736 19.711 3.36355Z" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.3934 13.6066L14.636 9.36395" stroke="#FFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>