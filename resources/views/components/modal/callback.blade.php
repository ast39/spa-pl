<!-- Модальное окно заказа обратного звонка -->
<div class="modal-girl modal-callback hide" data-open_modal_content="callback">
    <div class="modal-girl__close" data-close_modal><svg><use xlink:href="#site-close"></use></svg></div>
    
    <div class="modal-girl__wrapper">
        <form class="modal-form" data-form_send="callback" data-action="#" data-type="post">
            <input type="hidden" name="type" value="">
            <input type="hidden" name="type_text" value="">
        
            <div class="modal-form__head">Заказ обратного звонка</div>
            
            <div class="modal-form__content">
                <div class="modal-form__content__one"><input type="text" name="name" placeholder="{{ __('Введите имя') }}" required autocomplete="off"></div>
                <div class="modal-form__content__one"><input type="email" name="email" placeholder="{{ __('Введите почту') }}" required autocomplete="off"></div>
                <div class="modal-form__content__one"><input type="text" name="phone" placeholder="{{ __('Введите телефон') }}" data-let-input="/^[0-9+]+$/" maxlength="15" required autocomplete="off"></div>
            </div>
            
            <div class="modal-form__alert hide" data-alert>
                <div class="modal-form__alert__one">{{ __('Ошибка отправки формы') }}</div>
                <div class="modal-form__alert__one">{{ __('Спасибо за запрос. С вами свяжутся в ближайшее время.') }}</div>
            </div>
            
            <div class="modal-form__btn">
                <button type="submit" class="btn btn-type1">{{ __('Отправить') }}</button>
            </div>
        </form>
    </div>
    
    @push('js')
        <script>
            var alert_text = {
                '1': "{{ __('Ошибка отправки формы') }}",
                '2': "{{ __('Спасибо за запрос. С вами свяжутся в ближайшее время.') }}",
            }
        
            var type_list = {
                '1': "{{ __('Общий запрос') }}",
                '2': "{{ __('Запрос на вакансию') }}",
                '3': "{{ __('Индивидуальный запрос') }}",
                '4': "{{ __('Запрос на заказ девушки') }}",
                '5': "{{ __('Запрос на заказ программы') }}",
            };
        </script>

        <script type="text/javascript" src="{{ asset('/js/planning.js') }}"></script>
    @endpush
</div>