<template>
    <MainComponent v-bind:cards="cards" />
</template>

<script>
import MainComponent from "../components/MainComponent.vue";

export default {
    name: "Chrism",
    components: {
        MainComponent
    },
    data() {
        return {
            cards: []
        };
    },
    beforeMount() {
        axios.get("/api/chrism").then(({ data }) => (this.cards = data));
    }
};
</script>
