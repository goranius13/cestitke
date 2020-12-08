<template>
    <section>
        <div class="is-flex is-justify-content-center">
            <div
                class="gallery m-5"
                style="max-width: 350px;"
                v-if="typeof(this.card.image_id) !== 'undefined'"
            >
                <div class="gallery-item">
                    <div class="modal-card single-card">
                        <section
                            class="modal-card-body p-0"
                            v-bind:style="{
                                background:
                                    `url('/images/bg_` +
                                    card.image_id +
                                    `_down.png') right bottom no-repeat, url('/images/bg_` +
                                    card.image_id +
                                    `_up.png') left top no-repeat`
                            }"
                        >
                            <div class="p-4 my-6">
                                <p
                                    class="title script-title mb-0 is-size-3"
                                    v-bind:style="{ color: card.color }"
                                >
                                    {{ card.header_text }}
                                </p>
                                <p
                                    class="subtitle is-size-6 my-5"
                                    v-bind:style="{ color: card.color }"
                                    v-html="nl2br(card.card_text)"
                                ></p>
                                <p
                                    class="title serif-title is-size-6 mt-1"
                                    v-bind:style="{ color: card.color }"
                                >
                                    {{ card.signature_text }}
                                </p>
                                <div class="audio-element" v-if="card.is_audio">
                                <Audio v-bind:color="card.color" />
                            </div>
                            </div>
                        </section>
                        <ShareComponent v-bind:cardDetails="card" />
                    </div>
                </div>
            </div>
        </div>

        <div class="tile is-ancestor mx-2 mb-4">
            <div class="tile is-6 p-2">
                <figure class="image">
                    <img v-bind:src="card4" />
                </figure>
            </div>
            <div class="tile is-6 p-2">
                <figure class="image">
                    <img v-bind:src="card6" />
                </figure>
            </div>
        </div>
    </section>
</template>

<script>
import Audio from "../components/Audio.vue";
import ShareComponent from "../components/ShareComponent.vue";

export default {
    name: "SingleCard",
    components: {
        Audio,
        ShareComponent
    },
    data() {
        return {
            card: [],
            card4: "/images/4.png",
            card6: "/images/6.png"
        };
    },
    beforeMount() {
        axios
            .get("/api/cards/" + this.$route.params.card_id)
            .then(({ data }) => (this.card = data));
    }
};
</script>

<style>
.single-card {
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
    transition: all 1.5s ease;
    padding: 4px;
}
</style>