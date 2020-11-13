<template>
  <div class="card" v-bind:style="{ borderColor: card.color }">
    <div class="card-content">
      <p class="title">
        {{ card.headingText }}
      </p>
      <p class="subtitle my-6" style="white-space: pre-line">
        {{ card.cardText }}
      </p>
      <p class="title is-size-4">
        {{ card.signatureText }}
      </p>
    </div>
    <footer class="card-footer">
      <p class="card-footer-item">
        <Audio v-bind:color="card.color" />
      </p>
    </footer>
  </div>
</template>

<script>
import Audio from "./Audio.vue";

export default {
  name: "Card",
  components: {
    Audio
  },
  data() {
    return {
      card: {
        color: "#8b5aff",
        headingText: "Naslov čestitke",
        cardText: "Tekst čestitke",
        signatureText: "Vaš potpis"
      }
    };
  },
  created() {
    Event.$on("changed-card-data", newCard => {
      this.card.headingText =
        newCard.headingText != "" ? newCard.headingText : "Naslov čestitke";
      this.card.cardText =
        newCard.cardText != "" ? newCard.cardText : "Tekst čestitke";
      this.card.signatureText =
        newCard.signatureText != "" ? newCard.signatureText : "Vaš potpis";
      this.card.color =
        newCard.color != this.card.color ? newCard.color : this.card.color;
    });
  }
};
</script>

<style></style>
