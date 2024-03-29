<template>
    <div>
        <header-component>
            <nav-bar :with-back-btn="true" />

            <div v-if="$root.isMobile" class="order-2 md:hidden truncate" aria-live="polite">
                <span class="block uppercase text-base font-bold">
                    About Us
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
                                What we do
                            </section-header>
                            <p>
                                We are here to entertain you.To put you on a cruise. We've got you covered on entertainment,
                                lifestyle, scoops, online brand promotions, business and inspiration.
                            </p>
                            <p class="mb-6">Join the family and let's write our story together.</p>

                            <section-header class="mb-4">
                                Our values
                            </section-header>
                            <p>
                                UrbanCruise believes that values reflects the heart which
                                is why our foundation has been built on:
                            </p>
                            <ul class="mb-6">
                                <li>
                                    <strong>Spirit of Adventure</strong>: You get to experience the shared thrill, excitement
                                    and fun of being on a cruise. Its a promise we'll keep.
                                </li>
                                <li>
                                    <strong>Balance</strong>: We are open-minded and strive to satisfy your thirst and hunger
                                    with educating and entertaining contents.
                                </li>
                                <li>
                                    <strong>Relationship</strong>: We know fun is better shared, So is making impacts.
                                    We are open to strategic partnership and friendships.
                                </li>
                                <li>
                                    <strong>Proactive</strong>: Our team is geared towards providing timely, quality and relevant contents
                                    to you because you simply deserve the best
                                </li>
                            </ul>

                            <section-header class="mb-4">
                                Our team
                            </section-header>

                            <div v-if="fetching_team" class="team">
                                <team-skeleton v-for="index in [1,2,3,4]" :key="index" />
                            </div>
                            <team-component v-else :team="team" />
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
            team: [],
            fetch_team_error: false,
            fetching_team: false,
        }
    },

    methods: {
        getTeam()
        {
            this.fetching_team = true;
            this.fetch_team_error = false;

            return axios.get('/team').then(res => {
                this.team = res.data.data;
            }).catch(err=>{
                this.fetch_team_error = true;
            }).then(()=>{
                this.fetching_team = false;
            });
        }
    },

    mounted()
    {
        this.getTeam();
    }
}
</script>
