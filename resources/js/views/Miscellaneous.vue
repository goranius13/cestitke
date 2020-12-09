<template>
    <MainComponent v-bind:cards="cards" />
</template>

<script>
import MainComponent from "../components/MainComponent.vue";

export default {
    name: "Miscellaneous",
    components: {
        MainComponent
    },
    data() {
        return {
            cards: []
        };
    },
    beforeMount() {
        axios.get("/api/miscellaneous").then(({ data }) => (this.cards = data));
    }
};
</script>
