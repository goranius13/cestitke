<template>
    <MainComponent v-bind:cards="cards" />
</template>

<script>
import MainComponent from "../components/MainComponent.vue";

export default {
    name: "Wedding",
    components: {
        MainComponent
    },
    data() {
        return {
            cards: []
        };
    },
    beforeMount() {
        axios.get("/api/weddings").then(({ data }) => (this.cards = data));
    }
};
</script>
