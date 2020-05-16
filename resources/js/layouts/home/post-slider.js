import { Glide, GlideSlide } from "vue-glide-js";

export default {
    components: {
        [Glide.name]: Glide,
        [GlideSlide.name]: GlideSlide
    },

    data(){
        return {
            options: {
                perView: 2,
                gap: 16,
                autoplay: 5000,
                breakpoints: {
                    767: {
                        perView: 1
                    }
                }
            }
        }
    }
}
