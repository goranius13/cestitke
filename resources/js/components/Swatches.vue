<template>
  <div class="form__field columns mb-6">
    <div class="column form__label">
      <strong>Odaberite boju:</strong>
    </div>
    <div class="column is-align-content-flex-start form__input">
      <v-swatches
        v-model="color"
        :swatches="swatches"
        :shapes="shapes"
        row-length="5"
        popover-x="left"
      ></v-swatches>
    </div>
  </div>
</template>

<script>
import VSwatches from "vue-swatches";

// Import the styles too, globally
import "vue-swatches/dist/vue-swatches.css";

export default {
  components: { VSwatches }, // window['vue-swatches'] - from CDN
  data() {
    return {
      color: "#8b5aff",
      swatches: [
        ["#F64272", "#F6648B", "#F493A7", "#F891A6", "#FFCCD5"],
        ["#8b5aff", "#a27bff", "#b99cff", "#d0bdff", "#e8deff"],
        ["#51e5db", "#74ebe3", "#96f0ea", "#b9f5f1", "#dcfaf8"],
        ["#ffa51a", "#ffb748", "#ffc976", "#ffdba3", "#ffedd1"],
      ],
      shapes: "circles",
    };
  },
  updated() {
    Event.$emit("changed-color", this.color);
  },
};
</script>

<style>
.form__label strong,
.vue-swatches {
  float: left;
}
</style>
