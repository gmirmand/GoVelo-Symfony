var home;
home = {
    container: $('.page-home'), /*<- tu peux définir des selecteur*/
    val: 'Coucou', /*<- ou des variables*/
    init: function () {
        console.log('Home init');

        home.mouseBgEffect();
        home.scrollSlow();
        home.scrollToTop();
        home.appearElem();
    },

    //Effect bg image header
    mouseBgEffect: function () {
        var lFollowX = 0,
            lFollowY = 0,
            x = 0,
            y = 0,
            friction = 1 / 30;
        function moveEffect() {
            x += (lFollowX - x) * friction;
            y += (lFollowY - y) * friction;
            translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.1)';
            $('.bg-header').css({
                '-webit-transform': translate,
                '-moz-transform': translate,
                'transform': translate
            });
            window.requestAnimationFrame(moveEffect);
        }
        $(window).on('mousemove click', function(e) {
            var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
            var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
            lFollowX = (20 * lMouseX) / 100;
            lFollowY = (10 * lMouseY) / 100;
        });
        moveEffect()
    },

    //Scroll ancre menu slow
    scrollSlow: function () {
        $('.main-navigation a[href^="#"]').click(function () {
            var page = $(this).attr('href'); // Page cible
            $('html, body').animate({scrollTop: $(page).offset().top}, 800); // Go
            return false;
        });
    },

    //Go to top
    scrollToTop: function () {
        /*home.container.append(home.val);*/
        $(window).scroll(function(){
            console.log('scroll');
            if ($(this).scrollTop() > 250) {
                $('#scrollToTop').addClass('scrollAnim');
            } else {
                $('#scrollToTop').removeClass('scrollAnim');
            }
        });
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    },

    //Apparition d'element
    appearElem: function () {
        $(window).scroll(function(){
            var posFonc = $('#application-fonctionnalite').position();
            var posAct = $('#actualites').position();

            //deplacement image  explication
            $('#img_explication').css({
                'margin-top': -50+($(this).scrollTop() / 15) + "px"
            });

            //apparition picto fonctionnalites
            if ($(this).scrollTop() > (posFonc.top - 300)) {
                $('.zone_icon').fadeIn(1000);
            }

            //apparition actus
            if ($(this).scrollTop() > (posAct.top - 400)) {
                $('#actu_1').fadeIn(2000);
                $('#actu_2').fadeIn(3500);
                $('#actu_3').fadeIn(4000);
            }
        });
    }
};
