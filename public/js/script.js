(function (){
    let player_list = {};
    
    $(document).ready(function() {
        funcModal();
        
        funcScrollWindows();
        funcOpenBlockClick();
        funcOpenSandwichClick();
        funcRotateText();
        
        funcSliderGirl();
        funcSliderGirlView();
        funcSliderInterier();
        funcInitVideo();
        
        funcCallback();
        funcAnchor();
        funcGallery();
        
        
    });
    
    /* ---------- Функция запуска системы галереи ---------- */
    function funcGallery(){
        if($('[data-masonry]').length > 0){
            $('[data-masonry]').each(function(){
                let block = $(this);
                
                block.masonry({
                    itemSelector: '.masonry-gallery__one',
                    columnWidth: 249.3
                });
            });
        }
    }
    
    /* ---------- Функция плавного якоря ---------- */
    function funcAnchor(){
        opacityAnchor();
        $(window).resize(function(){ opacityAnchor(); });
        $(window).scroll(function(){ opacityAnchor(); });

        $('body').on('click', '[data-anchor]', function(){
            $("html, body").animate({scrollTop: $('[data-anchor_block="' + $(this).data('anchor') + '"]').offset().top - 20}, 500);
        });
        
        function opacityAnchor(){
            $('[data-anchor]').each(function(){
                let block = $(this);
                
                if(block.attr('data-anchor_show') !== undefined){
                    if($(window).scrollTop() > parseFloat(block.data('anchor_show'))){
                        block.removeClass('opacity');
                    } else {
                        block.addClass('opacity');
                    }
                }
            });
        }
    }
    
    /* ---------- Функция заказа обратного звонка ---------- */
    function funcCallback(){
        /* ---------- Открытие формы в модальном окне ---------- */
        $('body').on('click', '[data-open_modal="callback"]', function(){
            let block = $(this),
                type = block.data('type'),
                modal = $('[data-open_modal_content="' + block.data('open_modal') + '"]'),
                type_text = type_list[type];

            if (type == '4' && block.attr('data-callback_girl') !== undefined) { type_text = type_text + ': ' + block.data('callback_girl'); }
            if (type == '5' && block.attr('data-callback_program') !== undefined) { type_text = type_text + ': ' + block.data('callback_program'); }

            modal.find('input[name="type"]').val(type);
            modal.find('input[name="type_text"]').val(type_text);
            modal.find('[data-alert]').addClass('hide').removeClass('success');
            modal.find('[data-form_send="callback"]')[0].reset();
        });
        
        /* ---------- Отправка формы обратного звонка ---------- */
        $('body').on('submit', '[data-form_send="callback"]', function(){
            let block = $(this);
            
            block.find('[data-alert]').addClass('hide').removeClass('success');
            
            $.ajax({
                type: block.data('type'),
                url: block.data('action'),
                data: { '_token': token },
                dataType: "json",
                beforeSend: function(){
                    block.find('[type="submit"]').addClass('loadblock s50');
                },
                success:function(msg){
                    block.find('[type="submit"]').removeClass('loadblock s25');
                    
                    if(!msg.error){
                        form.find('[data-alert]').removeClass('hide').html(alert_text[1]);
                    } else {
                        form.find('[data-alert]').removeClass('hide').addClass('success').html(alert_text[2]);
                    }
                }
            });
            
            return false;
        });
    }
    
    /* ---------- Функция работы с модальным окном ---------- */
    function funcModal(){
        /* открытие модального окна */
        $('body').on('click', '[data-open_modal]', function(){
            let block = $(this);
            
            if (typeof block.attr('data-open_modal_slider') === 'undefined' || (typeof block.attr('data-open_modal_slider') !== 'undefined' && block.hasClass('modal-active'))) {
                $('[data-open_modal_content]').addClass('hide');

                if ($('[data-open_modal_content="' + $(this).data('open_modal') + '"]').length > 0) {
                    $('[data-open_modal_content="' + $(this).data('open_modal') + '"]').removeClass('hide');
                    funcSliderGirlView();
                    $('html').css({ 'overflow': 'hidden' });
                    
                    funcGallery();
                }
            }
        });

        /* закрытия модального окна */
        $('body').on('click', '[data-close_modal]', function(){
            $('[data-open_modal_content]').addClass('hide');
            $('html').css({ 'overflow': '' });
            funcstopVideo();
        });
    }
    
    <!--------------------------- Функция инициализации видео блока --------------------------->
    function funcInitVideo(){
        if($('[data-init_video]').length > 0){
            $('[data-init_video]').each(function(){
                let block = $(this),
                    block_video = block.data('init_video'),
                    block_poster = block.data('poster'),
                    video_id = block.attr('id');
                    
                player_list[video_id] = jwplayer(video_id).setup({
                    responsive: true,
                    aspectratio: "16:9",
                    image: block_poster,
                    file: block_video,
                    stretching: 'fill'
                });
            });
        }
    }
    
    <!--------------------------- Функция остановки видео блока при запуске функции --------------------------->
    function funcstopVideo(){
        if (Object.keys(player_list).length != 0) {
            $.each(player_list, function(k, v){
                player_list[k].stop();
            });
        }
    }
    
    
    <!--------------------------- Функция определения скроллинга страницы --------------------------->
    function funcScrollWindows(){
        scrollWindows();
        $(window).scroll(function() { scrollWindows(); });
        
        function scrollWindows(){
            if($(window).scrollTop() > 1){ $('section.menu').addClass('active'); } else { $('section.menu').removeClass('active'); }
        }
    }
    
    <!--------------------------- Функция крутилка интерьера --------------------------->
    function funcSliderInterier(){
        let slick = $('[data-slick_interior]');
        
        if(slick.length > 0){
            slick.on('init', function(event, slick) {
                slick.slickGoTo(0);
            });
            
            slick.slick({
                dots: false,
                infinite: true,
                arrow: true,
                swipeToSlide: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                variableWidth: true,
                focusOnSelect: true,
                prevArrow: $('.interior-photo__arrow__one.left'),
                nextArrow: $('.interior-photo__arrow__one.right'),
                autoplay: true,
                autoplaySpeed: 3000
            });

            slick.on('afterChange', function (event, slick, currentSlide) {
                $('[data-slick_interior]').find('.modal-active').removeClass('modal-active');
                $(slick.$slides[currentSlide]).addClass('modal-active');
            });
        }
    }
    
    
    <!--------------------------- Функция крутилка девочек в подробном виде --------------------------->
    function funcSliderGirlView(){
        let slick1 = $('.modal-girl__photo__full'),
            slick2 = $('.modal-girl__photo__preview');
        
        if(slick1.length > 0){
            if(slick1.find('.slick-list').length > 0) { slick1.slick('unslick'); }
            if(slick2.find('.slick-list').length > 0) { slick2.slick('unslick'); }
            
            slick1.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: true,
                fade: true,
                asNavFor: '.modal-girl__photo__preview',
                prevArrow: $('.modal-girl__photo__full__arrow__one.left'),
                nextArrow: $('.modal-girl__photo__full__arrow__one.right'),
                autoplay: true,
                autoplaySpeed: 3000
            });
            
            slick2.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                focusOnSelect: true,
                vertical: true,
                asNavFor: '.modal-girl__photo__full',
                autoplay: true,
                autoplaySpeed: 3000
            });
        }
    }
    
    
    <!--------------------------- Функция крутилка девочек --------------------------->
    function funcSliderGirl(){
        let slick = $('[data-slider_girl]');
        
        if(slick.length > 0){
            slick.on('init', function(event, slick) {
                slick.slickGoTo(0);
            });

            slick.slick({
                dots: false,
                infinite: true,
                arrow: true,
                swipeToSlide: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '0px',
                variableWidth: true,
                focusOnSelect: true,
                prevArrow: $('.women-slider__wrapper__arrow__one.left'),
                nextArrow: $('.women-slider__wrapper__arrow__one.right'),
                autoplay: true,
                autoplaySpeed: 3000
            });

            slick.on('afterChange', function (event, slick, currentSlide) {
                $('[data-slider_girl]').find('.modal-active').removeClass('modal-active');
                $(slick.$slides[currentSlide]).addClass('modal-active');
            });
        }
    }
    
    
    <!--------------------------- Функция ротация текста --------------------------->
    function funcRotateText(){
        rotateText();
        setInterval(rotateText, 10000);
        
        function rotateText(){
            let rotate_list = [];
            
            if($('[data-rotate_text]').length > 0){
                $('[data-rotate_text]').each(function(){
                    let type = $(this).data('rotate_text');
                    
                    if($.inArray(type, rotate_list) === -1){
                        rotate_list.push(type);
                    }
                });
                
                $.each(rotate_list, function(k, v){
                    let rotate_block_start = $('[data-rotate_text="' + v + '"]').first();
                        
                    rotate_block = ($('.active[data-rotate_text="' + v + '"]').length > 0) ? $('.active[data-rotate_text="' + v + '"]') : rotate_block_start;
                    rotate_block_next = (rotate_block.next().length > 0) ? rotate_block.next() : rotate_block_start;
                    
                    rotate_block.removeClass('active');
                    rotate_block_next.addClass('active');
                });
            }
        }
    }
    
    
    <!--------------------------- Функция открытия блока по клику --------------------------->
    function funcOpenBlockClick(){
        $('body').on('click', '[data-open_block]', function(){
            let block   = $(this),
                id      = block.data('open_block'),
                status  = block.hasClass('active') ?? false;
            
            $('[data-open_block="' + id + '"]').addClass('active');
            $('[data-open_block_content="' + id + '"]').removeClass('hide');
            
            setTimeout(function(){
                if(!status){
                    $('[data-open_block="' + id + '"]').addClass('active');
                    $('[data-open_block_content="' + id + '"]').removeClass('hide');
                }
            }, 1);
        });
        
        /* Клик вне области первого уровня навигационного меню */
        $('body').click(function(event){
            let eventblock = $(event.target).parents('[data-open_block_content]').html();

            if(typeof eventmodal == "undefined"){
                closeOpenBlockClick();
            }
        });
        
        function closeOpenBlockClick(){
            $('[data-open_block]').removeClass('active');
            $('[data-open_block_content]').addClass('hide');
        }
    }
    
    
    <!--------------------------- Функция открытия мобильного меню по клику --------------------------->
    function funcOpenSandwichClick(){
        $('body').on('click', '[data-open_sandwich]', function(){
            let block   = $(this),
                id      = block.data('open_sandwich'),
                status  = block.hasClass('active') ?? false;
            
            closeOpenBlockClick();
            
            setTimeout(function(){
                if(!status){
                    $('[data-open_sandwich="' + id + '"]').addClass('active');
                    $('[data-open_sandwich_content="' + id + '"]').addClass('show');
                }
            }, 1);
        });
        
        /* Клик вне области первого уровня навигационного меню */
        $('body').click(function(event){
            let eventblock = $(event.target).parents('[data-open_sandwich_content]').html();

            if(typeof eventmodal == "undefined"){
                closeOpenBlockClick();
            }
        });
        
        function closeOpenBlockClick(){
            $('[data-open_sandwich]').removeClass('active');
            $('[data-open_sandwich_content]').removeClass('show');
        }
        
    }
    
    <!--------------------------- Отключение скроллбара и разрешение мышкой скролить --------------------------->
    $.fn.attachDragger = function(){
        var attachment = false, lastPosition, position, difference;
        $( $(this).selector ).on("mousedown mouseup mousemove",function(e){
            if( e.type == "mousedown" ) attachment = true, lastPosition = [e.clientX, e.clientY];
            if( e.type == "mouseup" ) attachment = false;
            if( e.type == "mousemove" && attachment == true ){
                position = [e.clientX, e.clientY];
                difference = [ (position[0]-lastPosition[0]), (position[1]-lastPosition[1]) ];
                $(this).scrollLeft( $(this).scrollLeft() - difference[0] );
                $(this).scrollTop( $(this).scrollTop() - difference[1] );
                lastPosition = [e.clientX, e.clientY];
            }
        });
        
        $(window).on("mouseup", function(){
            attachment = false;
        });
    }
})();