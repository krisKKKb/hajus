<template>
  <div class="lg:w-7/12 w-full h-96 lg:h-auto">
    <div class="h-full w-full" id="map" ref="map"></div>
  </div>
</template>

<script setup>
import { Loader } from "@googlemaps/js-api-loader";
import { ref } from "vue";

let map = ref(null);

const loader = new Loader({
  apiKey: "",
  version: "weekly",
});
loader.load().then(() => {
  let myLatLng = { lat: 58.24806, lng: 22.50389 };
  map = new google.maps.Map(map.value, {
    zoom: 8,
    center: myLatLng,
  });
});
</script>

