@php
    use App\Http\Libs\Helper;
    
    $interior = Helper::getPhotosInterier();
@endphp

<!-- Интерьер -->
<section class="section-padding interior">
    <div class="section-wrapper">
        <div class="section-wrapper__head">
            Интерьер салона
            <div class="section-wrapper__desc">Во всех комнатах новый ремонт в гармоничных тонах. В салоне всегда чисто, комфортная мебель. Оборудован душ и всем клиентам выдаются одноразовые принадлежности. В комнатах приглушённое освещение, расслабляющая музыка и самые красивые девушки!</div>
        </div>
    </div>
    
    <div class="interior-photo__wrapper">
        <div class="interior-photo" data-slick_interior>
            @foreach($interior as $k => $v)
                <a href="{{ asset('images/interier/'.$v) }}" class="interior-photo__one" style="background-image: url({{ asset('images/interier/preview/'.$v) }})" data-fancybox="interior"></a>
            @endforeach
        </div>
        
        <div class="interior-photo__arrow">
            <div class="interior-photo__arrow__one left"><svg><use xlink:href="#site-right"></use></svg></div>
            <div class="interior-photo__arrow__one right"><svg><use xlink:href="#site-right"></use></svg></div>
        </div>
    </div>
</section>