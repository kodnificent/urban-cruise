import { Glide, GlideSlide } from "vue-glide-js";

export default {
    components: {
        [Glide.name]: Glide,
        [GlideSlide.name]: GlideSlide
    },

    data(){
        return {
            options: {
                perView: 3,
                gap: 16,
                autoplay: 5000,
                breakpoints: {
                    767: {
                        perView: 1
                    },
                    1279: {
                        perView: 2
                    }
                }
            }
        }
    }
}
