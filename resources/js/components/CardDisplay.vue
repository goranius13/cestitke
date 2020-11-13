<template>
  <div class="card py-4">
    <div class="card-content">
      <p
        class="title script-title mb-0 is-size-3"
        v-bind:style="{ color: color }"
      >
        {{ headingText }}
      </p>
      <p
        class="subtitle is-size-6 my-5"
        v-bind:style="{ color: color }"
        v-html="cardText.replace(/(?:\\r\\n|\\r|\\n)/g, '<br />')"
      ></p>
      <p
        class="title serif-title is-size-6 mt-1"
        v-bind:style="{ color: color }"
      >
        {{ signatureText }}
      </p>
      <div class="audio-element" v-if="isAudio">
        <Audio v-bind:color="color" />
      </div>
    </div>
  </div>
</template>

<script>
import Audio from "./Audio.vue";

export default {
  name: "CardDisplay",
  components: {
    Audio,
  },
  props: {
    color: String,
    headingText: String,
    cardText: String,
    signatureText: String,
    isAudio: Boolean,
  },
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
