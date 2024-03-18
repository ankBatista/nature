<template>
    <section class="service-section bg-grey padding">
        <div class="dots"></div>
        <div class="container">
            <div class="section-heading text-center mb-40">
                <span>Objetivo</span>
                <h2>Áreas de atuação</h2>
            </div><!--/.section-heading-->
            <div class="service-wrap row">
                <div class="col-lg-4 col-sm-6 padding-15">
                    <div class="service-item">
                        <div class="service-thumb">
                            <img :src="getImagePath('service-1.jpg')" alt="thumb">
                        </div>
                        <div class="service-content">
                            <i class="fas fa-2x fa-leaf"></i>
                            <h3>Meio Ambiente</h3>
                            <p>Somos a primeira criptomoeda criada para defender uma causa</p>
                            <a href="#">Ver</a>
                        </div>
                    </div>
                </div><!--Item 1-->
                <div class="col-lg-4 col-sm-6 padding-15">
                    <div class="service-item">
                        <div class="service-thumb">
                            <img :src="getImagePath('service-2.jpg')" alt="thumb">
                        </div>
                        <div class="service-content">
                            <i class="fas fa-2x fa-leaf"></i>
                            <h3>Global</h3>
                            <p>Somos a primeira criptomoeda "verde" do planeta.</p>
                            <a href="#">Ver</a>
                        </div>
                    </div>
                </div><!--Item 3-->
                <div class="col-lg-4 col-sm-6 padding-15">
                    <div class="service-item">
                        <div class="service-thumb">
                            <img :src="getImagePath('service-3.jpg')" alt="thumb">
                        </div>
                        <div class="service-content">
                            <i class="fas fa-2x fa-leaf"></i>
                            <h3>Humanização</h3>
                            <p>Trabalhamos em defeza de povos indigenas...
                            </p>
                            <a href="#">Ver</a>
                        </div>
                    </div>
                </div><!--Item 3-->
            </div>
        </div>
    </section><!--/.service-section-->
</template>

<script>

export default {
    data() {
        return {
            urlBase: window.customConfig.api_url+'/api/v1/index',
            items: []
        }
    },
    methods: {

        getImagePath(imageName) {
            // Concatene o nome da imagem com o caminho do diretório public/img
            return '/img/' + imageName;
        }
    },

}
</script>
