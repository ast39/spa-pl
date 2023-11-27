<section class="menu flex">
    <div class="menu-wrapper flex">
        <a href="{{ route('main.index') }}" class="menu-line1"><img src="{{ asset('images/temporary/kaliningrad/logorandevy.png') }}" class="logo"></a>
        <div class="menu-line1">
            <div class="menu-line1 sandwich-content" data-open_sandwich_content="menu">
                <a href="{{ route('girls.index') }}" class="menu-line2">{{ __('Массажистки') }}</a>
                <a href="{{ route('programs.index') }}" class="menu-line2">{{ __('Программы') }}</a>
                <a href="{{ route('interior.index') }}" class="menu-line2">{{ __('Интерьер') }}</a>
                <a href="{{ route('vacancies.index') }}" class="menu-line2">{{ __('Вакансии') }}</a>
                <a href="{{ route('contacts.index') }}" class="menu-line2">{{ __('Контакты') }}</a>
                <a href="{{ route('news.index') }}" class="menu-line2">{{ __('Новости') }}</a>
            </div>

            <div class="menu-line2 lang presandwich">
                <div class="menu-langs" data-open_block="langs"><svg class="flagsico"><use xlink:href="#circle-flags512-{{ app()->getLocale() }}"></use></svg> <svg class="flagarrow"><use xlink:href="#insta-arrow"></use></svg></div>

                <div class="menu-langs__list hide" data-open_block_content="langs">
                    @foreach (config('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a href="{{ route('lang.switch', $lang) }}" class="menu-langs__list__one">
                                <svg class="flagsico"><use xlink:href="#circle-flags512-{{ $lang }}"></use></svg> <span>{{ $language }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="menu-line2 sandwich" data-open_sandwich="menu">
                <svg class="sandwichico"><use xlink:href="#site-menu"></use></svg>
            </div>
        </div>
    </div>
</section>
