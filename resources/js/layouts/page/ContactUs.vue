<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <div v-if="$root.isMobile" class="order-2 md:hidden truncate" aria-live="polite">
                <span class="block uppercase text-base font-bold">
                    Contact Us
                </span>
            </div>

            <header-logo v-else />

            <div class="order-3 flex-grow"></div>

            <div class="order-3">
                <mobile-secondary-menu />
            </div>
        </header-component>

        <content-component>
            <div v-if="base_fetching">
                fetching
            </div>

            <template v-else>
                <main-layout>
                    <section>
                        <div class="mb-6 article__content">
                            <section-header class="mb-4">
                                Partner & Advertise with Us
                            </section-header>
                            <p>
                                UrbanCruise connects brands with the best audience in entertainment and more.
                                Whether its sponsored content, custom ad units, display lead acquisition or
                                strategic partnerships. We cater to your advertising objectives with data
                                driven marketing solutions that engages and converts your target audience.
                            </p>

                            <div class="flex flex-wrap justify-center mt-8">
                                <a href="mailto:contact@urbancruise.com.ng" class="button bg-primary text-on-primary">
                                    Email us
                                </a>

                                <a href="tel:+2347037991066" class="button ml-4 bg-gray-400 text-gray-900">
                                    Phone us
                                </a>
                            </div>

                        </div>
                    </section>

                    <template v-slot:sidebar>
                        <sidebar v-if="! $root.isMobile" />
                        <span v-else></span>
                    </template>
                </main-layout>
            </template>
        </content-component>

        <footer-component v-if="! $root.isMobile" />
    </div>
</template>

<script>
import { layout } from "../../mixins/layout/layout";

export default {
    mixins: [layout],

    data(){
        return {

        }
    },

    mounted()
    {
        //
    }
}
</script>
