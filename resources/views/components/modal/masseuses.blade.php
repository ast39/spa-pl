@php
    use App\Http\Libs\Helper;
@endphp

@foreach($girls_list as $k => $v)
    @php $photos = Helper::getPhotosGirl($v['folder']) @endphp
    
    <!-- Модальное окно девушки -->
    <div class="modal-girl hide" data-open_modal_content="girl_{{ $v['folder'] }}">
        <div class="modal-girl__close" data-close_modal><svg><use xlink:href="#site-close"></use></svg></div>
        
        <div class="modal-girl__wrapper">
            <div class="modal-girl__photo">
                <div class="modal-girl__photo__one">
                    <div class="modal-girl__photo__adaptive">
                        <div class="modal-girl__photo__full">
                            @foreach($photos as $k_photo => $v_photo)
                                <a href="{{ asset('images/girls/'.$v['folder'].'/'.$v_photo.'') }}" data-fancybox="girl_{{ $v['folder'] }}" class="modal-girl__photo__full__one"><img src="{{ asset('images/girls/'.$v['folder'].'/preview/'.$v_photo.'') }}"></a>
                            @endforeach
                        </div>
                        
                        <div class="modal-girl__photo__full__arrow">
                            <div class="modal-girl__photo__full__arrow__one left"><svg><use xlink:href="#site-right"></use></svg></div>
                            <div class="modal-girl__photo__full__arrow__one right"><svg><use xlink:href="#site-right"></use></svg></div>
                            <div class="modal-girl__photo__full__arrow__one full"></div>
                        </div>
                    </div>
                    
                    <div class="modal-girl__photo__adaptive">
                        <div class="modal-girl__photo__preview">
                            @foreach($photos as $k_photo => $v_photo)
                                <div class="modal-girl__photo__preview__one"><img src="{{ asset('images/girls/'.$v['folder'].'/preview/'.$v_photo.'') }}"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <div class="modal-girl__photo__one">
                    <div class="modal-girl__video">
                        <div id="girl_{{ $v['folder'] }}" class="modal-girl__video__html5" data-init_video="{{ asset('images/girls/'.$v['folder'].'/video.mp4') }}" data-poster="{{ asset('images/temporary/kaliningrad/girl9.jpg') }}"></div>
                    </div>

                    <div class="modal-girl__info">
                        <div class="modal-girl__info__name">{{ $v['name'] }}</div>
                        
                        <div class="modal-girl__info__size">
                            <div class="modal-girl__info__size__one">
                                <div class="modal-girl__info__size__count">{{ __('Возраст') }}</div>
                                <div class="modal-girl__info__size__text">{{ $v['age'] }}</div>
                            </div>
                            
                            <div class="modal-girl__info__size__one">
                                <div class="modal-girl__info__size__count">{{ __('Размер груди') }}</div>
                                <div class="modal-girl__info__size__text">{{ $v['bust_size'] }}</div>
                            </div>
                            
                            <div class="modal-girl__info__size__one">
                                <div class="modal-girl__info__size__count">{{ __('Рост') }}</div>
                                <div class="modal-girl__info__size__text">{{ $v['height'] }}</div>
                            </div>
                            
                            <div class="modal-girl__info__size__one">
                                <div class="modal-girl__info__size__count">{{ __('Вес') }}</div>
                                <div class="modal-girl__info__size__text">{{ $v['weight'] }}</div>
                            </div>
                        </div>
                        
                        <div class="modal-girl__info__btn">
                            <div class="btn btn-type1 pulse" data-open_modal="callback" data-type="4" data-callback_girl="{{ $v['name'] }}">{{ __('Хочу её') }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-girl__info">
                <div class="modal-girl__info__name">{{ __('Мастер эротического массажа') }} {{ $v['name'] }}</div>
                <div class="modal-girl__info__desc__text"><?= htmlspecialchars_decode($v['info']) ?></div>
            </div>
        </div>
    </div>
@endforeach