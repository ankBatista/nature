<template>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div id="main-slider" class="dl-slider carousel-inner">
            <div class="single-slide">
                <div class="carousel-item" v-for="(item, index) in items" :key="index" :class="{ active: index === 0 }">
                    <div class="bg-img kenburns-top-right">
                        <img :src="getImagePath(item.banner)" class="d-block w-100" :alt="item.title">
                    </div>
                    <div class="slider-content-wrap d-flex align-items-center text-left">
                        <div class="slider-content">
                            <div class="dl-caption medium">
                                <div class="inner-layer">
                                    <div data-animation="fade-in-top" data-delay="1s">{{ item.title }}</div>
                                </div>
                            </div>
                            <div class="dl-caption big">
                                <div class="inner-layer">
                                    <div data-animation="fade-in-bottom" data-delay="2s">{{ item.caption }}</div>
                                </div>
                            </div>
                            <div class="dl-caption big">
                                <div class="inner-layer">
                                    <div data-animation="fade-in-bottom" data-delay="2.5s">be closer than you think.</div>
                                </div>
                            </div>
                            <div class="dl-caption small">
                                <div class="inner-layer">
                                    <div data-animation="fade-in-bottom" data-delay="3s">Business is the activity of making money.</div>
                                </div>
                            </div>
                            <div class="dl-btn-group">
                                <div class="inner-layer">
                                    <a href="#" class="dl-btn" data-animation="fade-in-bottom" data-delay="3.5s">View Projects <i class="arrow_right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            urlBase: 'http://127.0.0.1:8000/api/v1/index',
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
</script>
