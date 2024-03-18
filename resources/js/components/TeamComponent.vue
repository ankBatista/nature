<template>
    <section class="team-section padding">
            <div class="container">
                <div class="section-heading text-center mb-40">
                   <span>Team</span>
                   <h2>Speciallized team</h2>
                </div><!--/.section-heading-->
                <div class="row team-wrap">
                    <div class="col-lg-3 col-sm-6 padding-15">
                        <div class="team-item">
                           <div class="overlay"></div>
                            <img src="img/team-1.jpg" alt="team">
                            <div class="team-content">
                                <h3>Jhon Castellon</h3>
                                <span>Architect</span>
                            </div>
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 padding-15">
                        <div class="team-item">
                           <div class="overlay"></div>
                            <img src="img/team-2.jpg" alt="team">
                            <div class="team-content">
                                <h3>José Carpio</h3>
                                <span>Designer</span>
                            </div>
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 padding-15">
                        <div class="team-item">
                           <div class="overlay"></div>
                            <img src="img/team-3.jpg" alt="team">
                            <div class="team-content">
                                <h3>Valentin Lacoste</h3>
                                <span>Developer</span>
                            </div>
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 padding-15">
                        <div class="team-item">
                           <div class="overlay"></div>
                            <img src="img/team-4.jpg" alt="team">
                            <div class="team-content">
                                <h3>Kyle Frederick</h3>
                                <span>Marketer</span>
                            </div>
                            <ul class="team-social">
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                                <li><a href="#"><i class="ti-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/.team-section-->
</template>

<script>

export default {
    data() {
        return {
            urlBase: window.customConfig.api_url+'/api/v1/index', //Este endereço esta em config/custom.php
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