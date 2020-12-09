<template>
    <div>
        <div class="gallery m-4">
            <div
                class="gallery-item"
                v-for="card in row1Display"
                :key="card.id"
                @click="openCardModal(card)"
            >
                <div
                    class="content"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            card.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            card.image_id +
                            `_up.png') left top no-repeat`,
                        backgroundClip: `content-box, content-box`,
                        backgroundSize: `contain, contain`,
                        borderRadius: `8px`
                    }"
                >
                    <CardDisplay v-bind:cardDetails="card" />
                </div>
            </div>
        </div>
        <div class="tile is-ancestor mx-2 mt-2">
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
        <div class="gallery m-4">
            <div
                class="gallery-item"
                v-for="card in row2Display"
                :key="card.id"
                @click="openCardModal(card)"
            >
                <div
                    class="content"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            card.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            card.image_id +
                            `_up.png') left top no-repeat`,
                        backgroundClip: `content-box, content-box`,
                        backgroundSize: `contain, contain`,
                        borderRadius: `8px`
                    }"
                >
                    <CardDisplay v-bind:cardDetails="card" />
                </div>
            </div>
        </div>
        <div class="tile is-ancestor mx-2 mt-2">
            <div class="tile is-4 p-2">
                <figure class="image">
                    <img v-bind:src="card1" />
                </figure>
            </div>
            <div class="tile is-4 p-2">
                <figure class="image">
                    <img v-bind:src="card5" />
                </figure>
            </div>
            <div class="tile is-4 p-2">
                <figure class="image">
                    <img v-bind:src="card3" />
                </figure>
            </div>
        </div>
        <div class="gallery m-4">
            <div
                class="gallery-item"
                v-for="card in row3Display"
                :key="card.id"
                @click="openCardModal(card)"
            >
                <div
                    class="content"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            card.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            card.image_id +
                            `_up.png') left top no-repeat`,
                        backgroundClip: `content-box, content-box`,
                        backgroundSize: `contain, contain`,
                        borderRadius: `8px`
                    }"
                >
                    <CardDisplay v-bind:cardDetails="card" />
                </div>
            </div>
        </div>

        <div class="modal  is-active" v-if="isCardModalActive">
            <div
                class="modal-background"
                @click="isCardModalActive = !isCardModalActive"
            ></div>
            <div class="modal-card">
                <section
                    class="modal-card-body p-0"
                    v-bind:style="{
                        background:
                            `url('/images/bg_` +
                            cardModal.image_id +
                            `_down.png') right bottom no-repeat, url('/images/bg_` +
                            cardModal.image_id +
                            `_up.png') left top no-repeat`
                    }"
                >
                    <div class="p-4 my-6">
                        <p
                            class="title script-title mb-0 is-size-3"
                            v-bind:style="{ color: cardModal.color }"
                        >
                            {{ cardModal.header_text }}
                        </p>
                        <p
                            class="subtitle is-size-6 my-5"
                            v-bind:style="{ color: cardModal.color }"
                            v-html="nl2br(cardModal.card_text)"
                        ></p>
                        <p
                            class="title serif-title is-size-6 mt-1"
                            v-bind:style="{ color: cardModal.color }"
                        >
                            {{ cardModal.signature_text }}
                        </p>
                        <div class="audio-element" v-if="cardModal.is_audio">
                            <Audio v-bind:color="cardModal.color" />
                        </div>
                    </div>
                </section>
                <ShareComponent v-bind:cardDetails="cardModal" />
            </div>
            <button
                class="modal-close is-large"
                aria-label="close"
                @click="isCardModalActive = !isCardModalActive"
            ></button>
        </div>
        <!--div class="bottom-image-float" v-if="isBottomImageVisible">
            <img <img v-bind:src="eronet" alt="hteronet" />
        </div-->

        <div class="modal  is-active" v-if="isFloaterActive">
            <div
                class="modal-background"
                @click="isFloaterActive = !isFloaterActive"
            ></div>
            <div class="modal-card">
                <section
                    class="modal-card-body p-0"
                >
                    <figure class="image">
                        <img v-bind:src="card1" />
                    </figure>
                </section>
            </div>
            <button
                class="modal-close is-large"
                aria-label="close"
                @click="isFloaterActive = !isFloaterActive"
            ></button>
        </div>




    </div>
</template>

<script>
import CardDisplay from "./CardDisplay.vue";
import Audio from "./Audio.vue";
import ShareComponent from "./ShareComponent.vue";

export default {
    name: "MainComponent",
    components: {
        CardDisplay,
        Audio,
        ShareComponent
    },
    props: {
        cards: Array
    },
    data() {
        return {
            row3Display: [],
            row3Offset: 8,
            cardModal: {},
            isCardModalActive: false,
            isFloaterActive: false,
            //isBottomImageVisible koristi se za malu sliku dole desno kod skrola
            //isBottomImageVisible: false,
            card1: "/images/1.png",
            card2: "/images/2.png",
            card3: "/images/3.png",
            card4: "/images/4.png",
            card5: "/images/5.png",
            card6: "/images/6.png",
            eronet: "/images/eronet-logo.png"
        };
    },
    computed: {
        row1Display: function() {
            return window.innerWidth < 1100
                ? this.cards.slice(0, 3)
                : this.cards.slice(0, 4);
        },
        row2Display: function() {
            return window.innerWidth < 1100
                ? this.cards.slice(3, 6)
                : this.cards.slice(4, 8);
        }
    },
    methods: {
        scroll() {
            window.onscroll = () => {
                let bottomOfWindow =
                    document.documentElement.scrollTop + window.innerHeight ===
                    document.documentElement.offsetHeight;

                if (bottomOfWindow) {
                    if (this.row3Offset + 12 < this.cards.length) {
                        this.cards
                            .slice(this.row3Offset, this.row3Offset + 12)
                            .forEach(card => this.row3Display.push(card));
                        this.row3Offset += 12;
                    } else {
                        this.cards
                            .slice(this.row3Offset, this.cards.length)
                            .forEach(card => this.row3Display.push(card));
                        this.row3Offset += 12;
                    }
                }

                /* koristi se za malu sliku dole desno kod skrola
                this.isBottomImageVisible = this.isBottomImageVisible
                    ? this.isBottomImageVisible
                    : !this.isBottomImageVisible; */
            };
        },
        openCardModal(card) {
            this.cardModal = card;
            this.isCardModalActive = true;
        }
    },
    mounted() {
        this.scroll();
    }
};
</script>

<style>
.modal {
    z-index: 99999 !important;
}

.modal-card {
    background-color: white !important;
    max-width: 350px;
    border-radius: 8px;
    margin: 0;
}

.modal-card-body {
    background-clip: content-box, content-box !important;
    background-size: contain, contain !important;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    min-height: 400px;
}

.modal-card-foot {
    background-color: transparent !important;
}

.is-large.modal-close {
    height: 64px !important;
    max-height: 64px !important;
    max-width: 64px !important;
    min-height: 64px !important;
    min-width: 64px !important;
    width: 64px !important;
}

.bottom-image-float {
    position: fixed;
    bottom: 2%;
    right: 2%;
    max-width: 30%;
}
</style>
