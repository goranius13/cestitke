<template>
    <div class="columns mb-6">
        <div class="column">
            <form class="mb-4" v-on:submit.prevent>
                <div class="field">
                    <label class="label is-align-content-flex-start"
                        >Naslov</label
                    >
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            v-model="card.headingText"
                            :placeholder="card.headingTextPlaceholder"
                        />
                    </div>
                </div>

                <div class="field">
                    <label class="label is-align-content-flex-start"
                        >Čestitka</label
                    >
                    <div class="control">
                        <textarea
                            class="textarea"
                            v-model="card.cardText"
                            :placeholder="card.cardTextPlaceholder"
                        ></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label is-align-content-flex-start"
                        >Potpis</label
                    >
                    <div class="control">
                        <input
                            class="input"
                            type="text"
                            v-model="card.signatureText"
                            :placeholder="card.signatureTextPlaceholder"
                        />
                    </div>
                </div>
                <div class="form__field columns mb-4">
                    <div class="column form__label">
                        <strong>Odaberite boju:</strong>
                    </div>
                    <div class="column is-align-content-flex-start form__input">
                        <v-swatches
                            v-model="card.color"
                            :swatches="swatches"
                            :shapes="shapes"
                            row-length="5"
                            popover-x="left"
                        ></v-swatches>
                    </div>
                </div>

                <div class="form__field columns mb-4">
                    <div class="column">
                        <button
                            class="button is-primary"
                            @click="isImageModalActive = true"
                        >
                            Odaberite pozadinu
                        </button>
                    </div>
                    <div class="column">
                        <button
                            class="button is-primary"
                            @click="isPaymentModalActive = true"
                        >
                            Izvršite plaćanje
                        </button>
                    </div>
                </div>

                <div class="modal" :class="{ 'is-active': isImageModalActive }">
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Odaberite pozadinu</p>
                            <button
                                class="delete"
                                aria-label="close"
                                @click="isImageModalActive = false"
                            ></button>
                        </header>
                        <section class="modal-card-body">
                            <vue-select-image
                                :dataImages="dataImages"
                                @onselectimage="onSelectImage"
                            >
                            </vue-select-image>
                        </section>
                        <footer class="modal-card-foot">
                            <button
                                class="button is-success"
                                @click="
                                    isImageModalActive = !isImageModalActive
                                "
                            >
                                Spremi
                            </button>
                            <button
                                class="button"
                                @click="
                                    isImageModalActive = !isImageModalActive
                                "
                            >
                                Odustani
                            </button>
                        </footer>
                    </div>
                </div>

                <div
                    class="modal"
                    :class="{ 'is-active': isPaymentModalActive }"
                >
                    <div class="modal-background"></div>
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Plaćanje</p>
                            <button
                                class="delete"
                                aria-label="close"
                                @click="isPaymentModalActive = false"
                            ></button>
                        </header>
                        <section class="modal-card-body">
                            <div id="smart-button-container">
                                <div style="text-align: center;">
                                    <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </form>
        </div>
        <div class="column is-full-mobile">
            <div class="gallery my-4" id="gallery">
                <div class="gallery-item">
                    <div class="content py-4" :style="bg">
                        <CardDisplay
                            v-bind:color="card.color"
                            v-bind:headingText="
                                card.headingText != ''
                                    ? card.headingText
                                    : card.headingTextPlaceholder
                            "
                            v-bind:cardText="
                                card.cardText != ''
                                    ? card.cardText
                                    : card.cardTextPlaceholder
                            "
                            v-bind:signatureText="
                                card.signatureText != ''
                                    ? card.signatureText
                                    : card.signatureTextPlaceholder
                            "
                            v-bind:isAudio="false"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardDisplay from "./CardDisplay.vue";
import VSwatches from "vue-swatches";
import "vue-swatches/dist/vue-swatches.css";
import VueSelectImage from "vue-select-image";
require("vue-select-image/dist/vue-select-image.css");

export default {
    name: "Inputs",
    components: {
        CardDisplay,
        VSwatches,
        VueSelectImage
    },
    data() {
        return {
            card: {
                color: "#8b5aff",
                headingText: "",
                cardText: "",
                signatureText: "",
                headingTextPlaceholder: "Naslov čestitke",
                cardTextPlaceholder: "Upišite vaš tekst ovdje",
                signatureTextPlaceholder: "Unesite Vaš potpis"
            },
            dataImages: [
                {
                    id: "1",
                    src: "/images/thumb/bg_1_thumb.jpg",
                    alt: "Alt Image 1"
                },
                {
                    id: "2",
                    src: "/images/thumb/bg_2_thumb.jpg",
                    alt: "Alt Image 2"
                },
                {
                    id: "3",
                    src: "/images/thumb/bg_3_thumb.jpg",
                    alt: "Alt Image 3"
                },
                {
                    id: "4",
                    src: "/images/thumb/bg_4_thumb.jpg",
                    alt: "Alt Image 4"
                },
                {
                    id: "5",
                    src: "/images/thumb/bg_5_thumb.jpg",
                    alt: "Alt Image 5"
                },
                {
                    id: "6",
                    src: "/images/thumb/bg_6_thumb.jpg",
                    alt: "Alt Image 6"
                }
            ],
            swatches: [
                ["#F64272", "#F6648B", "#F493A7", "#F891A6", "#FFCCD5"],
                ["#8b5aff", "#a27bff", "#b99cff", "#d0bdff", "#e8deff"],
                ["#51e5db", "#74ebe3", "#96f0ea", "#b9f5f1", "#dcfaf8"],
                ["#ffa51a", "#ffb748", "#ffc976", "#ffdba3", "#ffedd1"]
            ],
            shapes: "circles",
            isImageModalActive: false,
            isPaymentModalActive: false,
            bg: {
                background:
                    "url('/images/bg_1_up.png') right bottom no-repeat, url('/images/bg_1_down.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            }
        };
    },
    updated() {
        Event.$emit("changed-card-data", this.card);
    },
    methods: {
        onSelectImage: function(data) {
            this.bg.background =
                "url('/images/bg_" +
                data.id +
                "_down.png') right bottom / contain no-repeat content-box, url('/images/bg_" +
                data.id +
                "_up.png') left top / contain no-repeat content-box";
        }
    }
};
</script>

<style>
.label {
    float: left;
}

.gallery {
    display: grid;
    grid-column-gap: 16px;
    grid-row-gap: 16px;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    /*grid-auto-rows: 8px;*/
}
.gallery .card {
    max-width: 100%;
    border-radius: 8px;
    /*box-shadow: 4px 4px 8px #bbb;*/
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
    transition: all 1.5s ease;
    min-height: 400px;
}
.gallery .card:hover {
    /*box-shadow: 8px 8px 16px #bbb;*/
    box-shadow: 0 4px 2px -1px rgba(0, 0, 0, 0.2),
        0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 2px 6px 0 rgba(0, 0, 0, 0.12);
}
.gallery .card {
    padding: 4px;
}
.gallery .gallery-item {
    transition: grid-row-start 300ms linear;
    transition: transform 300ms ease;
    transition: all 0.5s ease;
    cursor: pointer;
}
.gallery .gallery-item:hover {
    transform: scale(1.025);
}
@media (max-width: 600px) {
    .gallery {
        grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)) !important;
    }
    .vueAudioBetter {
        width: 200px !important;
    }
    .vueAudioBetter .slider {
        display: none;
    }
}
@media (max-width: 400px) {
    .gallery {
        grid-template-columns: repeat(auto-fill, minmax(100%, 1fr)) !important;
    }
}
@-moz-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@-webkit-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@-o-keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
@keyframes zoomin {
    0% {
        max-width: 50%;
        transform: rotate(-30deg);
        filter: blur(4px);
    }
    30% {
        filter: blur(4px);
        transform: rotate(-80deg);
    }
    70% {
        max-width: 50%;
        transform: rotate(45deg);
    }
    100% {
        max-width: 100%;
        transform: rotate(0deg);
    }
}
</style>
