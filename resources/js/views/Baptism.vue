<template>
    <MainComponent v-bind:cards="cards" />
</template>

<script>
import MainComponent from "../components/MainComponent.vue";

export default {
    name: "Baptism",
    components: {
        MainComponent
    },
    data() {
        return {
            cards: []
        };
    },
    beforeMount() {
        axios.get("/api/baptism").then(({ data }) => (this.cards = data));
    }
};
</script>
