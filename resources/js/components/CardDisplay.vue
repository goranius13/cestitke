<template>
    <div class="card py-4">
        <div class="card-content">
            <p
                class="title script-title mb-0 is-size-3"
                v-bind:style="{ color: cardDetails.color }"
            >
                {{ cardDetails.header_text }}
            </p>

            <p
                v-if="cardDetails.card_text.length > 160"
                class="subtitle is-size-6 my-5"
                v-bind:style="{ color: cardDetails.color }"
                v-html="nl2br(cardDetails.card_text.substring(0, 160) + '...')"
            ></p>
            <p
                v-else
                class="subtitle is-size-6 my-5"
                v-bind:style="{ color: cardDetails.color }"
                v-html="nl2br(cardDetails.card_text)"
            ></p>

            <p
                class="title serif-title is-size-6 mt-1"
                v-bind:style="{ color: cardDetails.color }"
            >
                {{ cardDetails.signature_text }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardDisplay",
    props: {
        cardDetails: {
            type: Object,
            default: () => ({})
        }
    }
};
</script>

<style>
.card {
    background-color: transparent;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.card-content {
    background-color: transparent;
    padding: 0.5rem;
    width: 100%;
}

.gallery .gallery-item {
    max-width: 500px;
}

.gallery-item .content {
    height: 100%;
}

.audio-element {
    align-items: center;
    justify-content: center;
    display: flex;
}

.script-title {
    font-family: "Dancing Script", cursive;
}

.serif-title {
    font-family: "Raleway", sans-serif;
    font-weight: 600;
}

.subtitle {
    font-family: "Raleway", sans-serif;
    font-weight: 300;
}
</style>
