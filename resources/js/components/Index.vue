<template>
    <Carousel :getImagePath="getImagePath" />
    <!-- Outros componentes ou conteúdo aqui -->


    <section class="about-section padding">
        <div class="container">
            <div class="row about-wrap d-flex align-items-center">
                <div class="col-md-6 xs-padding">
                    <div class="about-content">
                        <h2>Amazônia legal<br></h2>
                        <p> Na era das criptomoedas, maiores fundos da Noruega</p>
                        <p> que geram US$178 BI, Pedem que empresas preservem a Amazônia</p>
                        <a href="#" class="default-btn">Sobre a empresa</a>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="about-bg">
                        <div class="about-bg">
                            <video class="video-bg" autoplay muted loop width="400" height="500">
                                <source :src="getVideoPath('002.mp4')" type="video/mp4">
                                Seu navegador não suporta o elemento de vídeo.
                            </video>
                        </div>
                        <div class="dots"></div>
                        <div class="year-text">
                            <div class="year-content">
                                <h2>8</h2>
                                <span>Anos no mercado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/.about-section-->

    <UpdatesComponent :getImagePath="getImagePath" />
    <TeamComponent />
    <Testimonial />
</template>

<script>
import Carousel from "./Carousel.vue";
import UpdatesComponent from "./UpdatesComponent.vue";
import TeamComponent from "./TeamComponent.vue";
import Testimonial from "./TestimonialComponent.vue";




export default {
    components: {
        Carousel,
        UpdatesComponent,
        TeamComponent,
        Testimonial,

    },
    methods: {
        getVideoPath(videoName) {
            // Concatene o nome do vídeo com o caminho do diretório public/videos
            return '/videos/' + videoName;
        }

    },
    mounted() {

    }

};
</script>

