<template>
    <div class="audio-container">
        <mini-audio
            audioSource="/audio/test.mp3"
            v-bind:style="{ background: color }"
        ></mini-audio>
    </div>
</template>

<script>
export default {
    name: "Audio",
    props: {
        color: String
    },
    created() {
        Event.$on("changed-color", newColor => (this.color = newColor));
    }
};
</script>

<style>
.form__label strong,
.vue-swatches {
    float: left;
}
</style>
