<template>
    <section class="testimonial-section bg-grey padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <span>Testimonial</span>
                <h2>Oque dizem sobre nós</h2>
            </div><!--/.section-heading-->
            <div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
                <div class="testi-item d-flex align-items-center">
                    <img src="img/testi-1.jpg" alt="img">
                    <div class="testi-content">
                        <p>"Thank you for guiding us through the construction process, understanding, and always ready
                            to accommodate our needs. We love our new space and know that it was built by the very
                            best!"</p>
                        <h3>Kyle Frederick</h3><br>
                        <ul class="rattings">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Director</span>
                    </div>
                    <i class="fa fa-quote-right"></i>
                </div>
                <div class="testi-item d-flex align-items-center">
                    <img src="img/testi-2.jpg" alt="img">
                    <div class="testi-content">
                        <p>"Thank you for guiding us through the construction process, understanding, and always ready
                            to accommodate our needs. We love our new space and know that it was built by the very
                            best!"</p>
                        <h3>Valentin Lacoste</h3><br>
                        <ul class="rattings">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Director</span>
                    </div>
                    <i class="fa fa-quote-right"></i>
                </div>
                <div class="testi-item d-flex align-items-center">
                    <img src="img/testi-3.jpg" alt="img">
                    <div class="testi-content">
                        <p>"Thank you for guiding us through the construction process, understanding, and always ready
                            to accommodate our needs. We love our new space and know that it was built by the very
                            best!"</p>
                        <h3>José Carpio</h3><br>
                        <ul class="rattings">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Director</span>
                    </div>
                    <i class="fa fa-quote-right"></i>
                </div>
            </div>
        </div>
    </section><!--/.testimonial-section-->
</template>

<script>

export default {
    data() {
        return {
            urlBase: 'http://127.0.0.1:8000/api/v1/index',
            items: []
        }
    },
    methods: {

        getImagePath(imageName) {
            // Concatene o nome da imagem com o caminho do diretório public/img
            return '/img/' + imageName;
        }
    },
    mounted() {
        $('#testimonial-carousel').owlCarousel({
            items: 1, // Mostrar apenas um slide por vez
            loop: true, // Fazer loop no carousel
            autoplay: true, // Reprodução automática
            autoplayTimeout: 5000, // Tempo de espera entre cada slide (5 segundos)
            autoplayHoverPause: true, // Pausar a reprodução automática quando o mouse está sobre o carousel
            dots: true, // Exibir pontos indicadores de navegação
            nav: false, // Exibir botões de navegação
            margin: 20, // Margem entre os slides
            responsive: { // Opções de configuração responsiva
                768: {
                    items: 2 // Mostrar dois slides por vez em telas maiores que 768px
                },
                992: {
                    items: 3 // Mostrar três slides por vez em telas maiores que 992px
                }
            }
        });
    }

}
</script>