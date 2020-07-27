<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <div v-if="$root.isMobile" class="order-2 md:hidden truncate" aria-live="polite">
                <span class="block uppercase text-base font-bold">
                    Write for Us
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
                            <section-header v-if="$root.isTablet" class="mb-6">
                                Write for us
                            </section-header>
                            <p>
                                Interested In Being A Writer For UrbanCruise?
                                We are always looking for insightful and creative writers who
                                are motivated to develop and deliver engaging content.
                            </p>

                            <section-header class="mb-6 mt-6">What We Are Looking For</section-header>
                            <p>
                                If you can produce quality content with expert knowledge in one or
                                more of UrbanCruise’s featured categories.
                                Interesting Facts are that you get credit as the author. Also, you
                                get compesated for contents written.
                            </p>

                            <section-header class="mb-6 mt-6">Apply Today!</section-header>

                            <p>
                                If you know you have what it takes to be part of the UrbanCruise writers' family, apply today.
                                <strong>Note</strong>: we do not accept any guest posts at the moment.
                            </p>
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
