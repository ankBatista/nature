<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bem-vindo</div>
                    <Carousel :getImagePath="getImagePath" />
                    <div class="card-body">
                        <p>Apresentar indicadores do sistema</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Carousel from "./Carousel.vue";

export default {
  components: {
    Carousel
  },
 
};
</script>
