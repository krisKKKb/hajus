<template>
  <div class="lg:w-7/12 w-full h-96">
    <div class="h-full w-full" id="map" ref="map"></div>
    <form class="grid w-72 gap-4 mt-4 mx-6" @submit.prevent="submit">
    <!--
      TODO: Lisa vormile 'input' väljad.
    -->
    </form>
  <!--Lisa tabel olemasolevatest markeritest, igale markerile lisa edit/delete funktsionaalsus-->
  </div>
</template>

<script setup>
import { Loader } from "@googlemaps/js-api-loader";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

/*----Requirements-----
  * Andmebaasi tabel ülesandes kirjeldatud väljadega (Migration)

  * Kontroller CRUD funktsioonidega (Controller)

  * Markeri andmemudel - (Model)

  * Igale kontrolleri funktsioonile vastav route - (web.php)

  * HINT:: php artisan make:model MinuModeliNimi -mcr ( m - lisab migration faili, c - lisab kontrolleri faili, r - täidab kontrolleri tühjade CRUD funktsioonidega )
*/

// Kontrollerist saadetud andmed (props) !NB jälgi et sisse tuleva data "key" oleks markers.
const props = defineProps({
  markers: {
    type: Array,
    default: null,
  },
});

let map = ref(null);
let prevMarker;

//kasuta Inertia form helperit useForm
//DOC::https://inertiajs.com/forms
//Jälgi dokumentastioonis vormi input väljade atribuute ja 'form' objekti

const form = useForm({
  //TODO:Lisa vajalikud väljad
});

//Google maps conf
const loader = new Loader({
  apiKey: "",
  version: "weekly",
});
//map käivitatakse
loader.load().then(() => {
  let myLatLng = { lat: 58.24806, lng: 22.50389 };
  map = new google.maps.Map(map.value, {
    zoom: 8,
    center: myLatLng,
  });
//Click event listener mis tagastab kordinaadid kaardil
//Tulemusena peaks kaardile click'ides ilmuma input väljadele kordinaadid
  map.addListener("click", (mapsMouseEvent) => {
    if (prevMarker) {
      prevMarker.setMap(null);
    }
    let data = mapsMouseEvent.latLng.toJSON();
    prevMarker = new google.maps.Marker({
      position: data,
    });
    //TODO:: lisa saadud kordinaadid "form" objekti
    prevMarker.setMap(map);
  });
});

const submit = () => {
  //TODO:: lisa "form" post meetod Näide: form.post(url, options)
  //DOC::https://inertiajs.com/forms
}
</script>

