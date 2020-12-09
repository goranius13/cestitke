<template>
    <div>
        <div class="columns my-4">
            <div class="column m-4 is-half-desktop">
                <p class="control my-4">
                    <select v-model="card.selected" @change="onCategorySelected()">
                        <option
                            v-for="(item, index) in card.category_id"
                            v-bind:key="index"
                            :value="item.value"
                        >
                            {{ item.text }}
                        </option>
                    </select>
                    <i class="bar"></i>
                </p>

                <p class="control my-4">
                    <input
                        class="input"
                        type="text"
                        v-model="card.header_text"
                        :placeholder="card.header_textPlaceholder"
                        required
                    />
                    <i class="bar"></i>
                </p>

                <p class="control my-4">
                    <textarea
                        class="textarea"
                        v-model="card.card_text"
                        :placeholder="card.card_textPlaceholder"
                        required
                    ></textarea>
                    <i class="bar"></i>
                </p>

                <p class="control my-4">
                    <input
                        class="input"
                        type="text"
                        v-model="card.signature_text"
                        :placeholder="card.signature_textPlaceholder"
                        required
                    />
                    <i class="bar"></i>
                </p>

                <!--p class="checkbox-control my-4">
                    <label>
                        <input type="checkbox" />
                        <i class="helper"></i>
                        Dodaj pjesmu?
                    </label>
                </p-->

                <p class="has-text-left is-flex is-align-items-center my-4">
                    <span class="mr-3 is-align-items-center" style="float: left"
                        >Boja teksta:</span
                    >
                    <v-swatches
                        v-model="card.color"
                        popover-x="left"
                        swatches="text-advanced"
                    ></v-swatches>
                    <button
                        class="button cestitke-red ml-6 is-align-items-center"
                        @click="isImageModalActive = true"
                    >
                        Odaberite pozadinu
                    </button>
                </p>
            </div>

            <div class="column m-4 is-narrow-desktop">
                <div class="gallery my-4" id="gallery">
                    <div class="gallery-item">
                        <div class="content py-2" v-bind:style="bg">
                            <CardDisplay v-bind:cardDetails="cardDetails" />
                        </div>
                    </div>
                </div>
                <p class="my-4">
                    <button class="button cestitke-red ml-3" @click="storeCardToDb">
                        Objavite čestitku
                    </button>
                    <!--Ovaj ispod ide za payment gateway-->
                    <!--button
                        class="button cestitke-red"
                        @click="isPaymentModalActive = true"
                    >
                        Objavite čestitku
                    </button-->
                </p>
            </div>

            <div :class="['modal', { 'is-active': isImageModalActive }]">
                <div class="modal-background"></div>
                <div class="modal-card create-card-modal">
                    <header class="modal-card-head create-card-modal-head">
                        <p class="modal-card-title create-card-modal-title">Odaberite pozadinu</p>
                        <button
                            class="delete"
                            aria-label="close"
                            @click="isImageModalActive = false"
                        ></button>
                    </header>
                    <section class="modal-card-body background-thumbs-body">
                        <vue-select-image
                            :dataImages="dataImages"
                            @onselectimage="onSelectImage"
                        >
                        </vue-select-image>
                    </section>
                    <footer class="modal-card-foot">
                        <button
                            class="button cestitke-red"
                            @click="isImageModalActive = !isImageModalActive"
                        >
                            Spremi
                        </button>
                        <button
                            class="button"
                            @click="isImageModalActive = !isImageModalActive"
                        >
                            Odustani
                        </button>
                    </footer>
                </div>
            </div>

            <div class="modal" :class="{ 'is-active': isPaymentModalActive }">
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

            <div :class="['modal', { 'is-active': isCardInserted }]">
                <div class="modal-background"></div>
                <div class="modal-card create-card-modal">
                    <header class="modal-card-head create-card-modal-head">
                        <p class="modal-card-title create-card-modal-title">Objava čestitke</p>
                        <button
                            class="delete"
                            aria-label="close"
                            @click="isCardInserted = false; isInserteDone = false;"
                            v-if="isInserteDone"
                        ></button>
                    </header>                    
                    <section class="modal-card-body create-card-modal-body" v-if="!isInserteDone">
                        Pričekajte trenutak dok pokušavamo pohraniti Vašu čestitku.
                    </section>
                    <section class="modal-card-body create-card-modal-body" v-if="isInserteDone">
                        <p v-if="isSuccess">
                            Čestitka je uspješno pohranjena. Ubrzo će biti pregledane te ukoliko ne sadrži uvredljiv tekst biti će objavljena.
                        </p>
                        <p v-if="!isSuccess">
                            Došlo je do pogreške prilikom objave Vaše čestitke. Molimo Vas pokušajte ponovno za par minuta.
                        </p>
                    </section>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import CardDisplay from "../components/CardDisplay.vue";
import VSwatches from "vue-swatches";
import "vue-swatches/dist/vue-swatches.css";
import VueSelectImage from "vue-select-image";
require("vue-select-image/dist/vue-select-image.css");

export default {
    name: "Create",
    components: {
        CardDisplay,
        VSwatches,
        VueSelectImage
    },
    data() {
        return {
            card: {
                color: "#d12229",
                header_text: "",
                card_text: "",
                signature_text: "",
                header_textPlaceholder: "Naslov čestitke",
                card_textPlaceholder: "Upišite vaš tekst ovdje",
                signature_textPlaceholder: "Unesite Vaš potpis",
                is_audio: false,
                selected: null,
                category_id: [
                    { value: null, text: "Odaberite kategoriju" },
                    { value: "1", text: "Vjenčanje" },
                    { value: "2", text: "Rođendan" },
                    { value: "3", text: "Blagdan" },
                    { value: "4", text: "Krštenje" },
                    { value: "5", text: "Krizma" },
                    { value: "6", text: "Ostalo" }
                ]
            },
            cardDetails: {
                color: "",
                header_text: "",
                card_text: "",
                signature_text: "",
                is_audio: false,
                image_id: 1,
                payment_id: 0,
                category_id: null
            },
            dataImages: [],
            isImageModalActive: false,
            isPaymentModalActive: false,
            isCardInserted: false,
            isInserteDone: false,
            isSuccess: false,
            bg: {
                background:
                    "url('/images/bg_10_down.png') right bottom no-repeat, url('/images/bg_10_up.png') left top no-repeat",
                backgroundClip: "content-box, content-box",
                backgroundSize: "contain, contain",
                borderRadius: "8px"
            }
        };
    },
    updated() {
        this.cardDetails.color = this.card.color;
        this.cardDetails.category_id = this.card.selected;
        this.cardDetails.header_text =
            this.card.header_text != ""
                ? this.card.header_text
                : this.card.header_textPlaceholder;
        this.cardDetails.card_text =
            this.card.card_text != ""
                ? this.card.card_text
                : this.card.card_textPlaceholder;
        this.cardDetails.signature_text =
            this.card.signature_text != ""
                ? this.card.signature_text
                : this.card.signature_textPlaceholder;
    },
    created() {
        this.cardDetails.color = this.card.color;
        this.cardDetails.header_text = this.card.header_textPlaceholder;
        this.cardDetails.card_text = this.card.card_textPlaceholder;
        this.cardDetails.signature_text = this.card.signature_textPlaceholder;
    },
    methods: {
        onSelectImage: function(data) {
            this.cardDetails.image_id = data.id;
            this.bg.background =
                "url('/images/bg_" +
                data.id +
                "_down.png') right bottom / contain no-repeat content-box, url('/images/bg_" +
                data.id +
                "_up.png') left top / contain no-repeat content-box";
            this.isImageModalActive = false;
        },
        storeCardToDb: function() {
            if(!this.isCardInserted) {
                this.isCardInserted = true;
                axios
                    .post("/api/cards/store", {
                        data: this.cardDetails,
                        _method: "put"
                    })
                    .then(
                        response => {
                            console.log(response);
                            this.isInserteDone = true;
                            this.isSuccess = response.data.success;
                        },
                        error => {
                            console.log(error);
                            this.isInserteDone = true;
                            this.isSuccess = false;
                        }
                    );
            }
        },
        updateThumbnails: function(data) {
            this.dataImages.length = 0;
            data.forEach(id =>
                this.dataImages.push({
                    id: id,
                    src: "/images/thumb/bg_" + id + "_thumb.jpg",
                    alt: "Alt Image " + id
                })
            );
        },
        onCategorySelected: function() {
            axios.get("/api/images/" + this.card.selected).then(
                response => {
                    console.log(response);
                    this.updateThumbnails(response.data);
                },
                error => {
                    console.log(error);
                }
            );
        }
    }
};
</script>