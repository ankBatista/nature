<template>
    <div id="main-slider" class="dl-slider">
        <div class="single-slide">
            <div class="bg-img kenburns-top-right" style="background-image: url(img/slides/003.jpeg)">
            </div>
            <div class="overlay"></div>
            <div class="slider-content-wrap d-flex align-items-center text-left">
                <div class="container">
                    <div class="slider-content">
                        <div class="dl-caption medium">
                            <div class="inner-layer">
                                <div data-animation="fade-in-right" data-delay="1s">Acesso por cordas</div>
                            </div>
                        </div>
                        <div class="dl-caption dl-border" data-animation="fade-in-left" data-delay="0s"></div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2s">Solução rapida e pratica</div>
                            </div>
                        </div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2.5s">para sua empresa.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--Slide-1-->
        <div class="single-slide">
            <div class="bg-img kenburns-top-right" style="background-image: url(img/slides/WA0008.jpg);">
            </div>
            <div class="overlay"></div>
            <div class="slider-content-wrap d-flex align-items-center text-left">
                <div class="container">
                    <div class="slider-content">
                        <div class="dl-caption medium">
                            <div class="inner-layer">
                                <div data-animation="fade-in-right" data-delay="1s">Acesso por cordas</div>
                            </div>
                        </div>
                        <div class="dl-caption dl-border" data-animation="fade-in-left" data-delay="4s"></div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2s">Chegamos onde outros </div>
                            </div>
                        </div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2.5s">não conseguem.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--Slide-2-->
        <div class="single-slide">
            <div class="bg-img kenburns-top-right" style="background-image: url(img/slides/145219.jpg);">
            </div>
            <div class="overlay"></div>
            <div class="slider-content-wrap d-flex align-items-center text-left">
                <div class="container">
                    <div class="slider-content">
                        <div class="dl-caption medium">
                            <div class="inner-layer">
                                <div data-animation="fade-in-right" data-delay="1s">Acesso por cordas</div>
                            </div>
                        </div>
                        <div class="dl-caption dl-border" data-animation="fade-in-left" data-delay="0s"></div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2s">Estamos por toda parte!</div>
                            </div>
                        </div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2.5s">Projetos urbanos, residenciais e
                                    industriais</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--Slide-3-->

        <div class="single-slide">
            <div class="bg-img kenburns-top-right" style="background-image: url(img/slides/IMG-20200728.jpg);">
            </div>
            <div class="overlay"></div>
            <div class="slider-content-wrap d-flex align-items-center text-left">
                <div class="container">
                    <div class="slider-content">
                        <div class="dl-caption medium">
                            <div class="inner-layer">
                                <div data-animation="fade-in-right" data-delay="1s">Acesso por cordas</div>
                            </div>
                        </div>
                        <div class="dl-caption dl-border" data-animation="fade-in-left" data-delay="0s"></div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2s">Estamos por toda parte!</div>
                            </div>
                        </div>
                        <div class="dl-caption big">
                            <div class="inner-layer">
                                <div data-animation="fade-in-left" data-delay="2.5s">Projetos urbanos, residenciais e
                                    industriais</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--Slide-4-->
    </div><!--/.slider-section-->
</template>

<script>
import axios from 'axios'

export default {
    name: 'CarouselComponent',

    data() {
        return {
            urlBase: window.customConfig.api_url + '/api/v1/index', //Este endereço esta em config/custom.php
            items: []
        }
    },
    methods: {
        carregarLista() {
            axios.get(this.urlBase)
                .then(response => {
                    this.items = response.data;
                    console.log('Dados:', this.items);
                })
                .catch(error => {
                    console.error('Erro ao carregar dados:', error);
                });
        },
        getImagePath(imageName) {
            // Concatene o nome da imagem com o caminho do diretório public/img
            return '/img/' + imageName;
        }
    },
    mounted() {
        this.carregarLista();
    }
}

/*=========================================================================
    Main Slider
=========================================================================*/
$(document).ready(function () {

    $('#main-slider').on('init', function (e, slick) {
        var $firstAnimatingElements = $('div.single-slide:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
    });
    $('#main-slider').on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('div.single-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
    });
    $('#main-slider').slick({
        autoplay: true,
        autoplaySpeed: 10000,
        dots: true,
        fade: true,
        prevArrow: '<div class="slick-prev"><i class="fa fa-chevron-left"></i></div>',
        nextArrow: '<div class="slick-next"><i class="fa fa-chevron-right"></i></div>'
    });
    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }
});
</script>
