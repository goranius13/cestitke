<template>
    <MainComponent v-bind:cards="cards" />
</template>

<script>
import MainComponent from "../components/MainComponent.vue";

export default {
    name: "Birthday",
    components: {
        MainComponent
    },
    data() {
        return {
            cards: []
        };
    },
    beforeMount() {
        axios.get("/api/birthdays").then(({ data }) => (this.cards = data));
    }
};
</script>
