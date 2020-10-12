<template>
  <div>
    <h2>Map</h2>
    <template>
      <GoogleMapLoader
          :mapConfig="mapConfig"
          :apiKey="apiKey"
      >
        // insert your google maps api key to render styled map
        <template slot-scope="{ google, map }">
          <GoogleMapMarker
              v-for="marker in markers"
              :key="marker.id"
              :marker="marker"
              :google="google"
              :map="map"
          />
          <GoogleMapLine
              v-for="line in lines"
              :key="line.id"
              :path.sync="line.path"
              :google="google"
              :map="map"
          />
        </template>
      </GoogleMapLoader>
    </template>
  </div>
</template>

<script>
import GoogleMapLoader from "@/components/GoogleMaps/GoogleMapLoader";
import GoogleMapMarker from "@/components/GoogleMaps/GoogleMapMarker";
import GoogleMapLine from "@/components/GoogleMaps/GoogleMapLine";
import { mapSettings } from '@/constants/mapSettings'

export default {
  name: "MapWidget",
  components: {
    GoogleMapLoader,
    GoogleMapMarker,
    GoogleMapLine
  },
  props: {
    username: String
  },
  data() {
    return {
      markers: [
        {
          id: "a",
          position: { lat: 35.2249083, lng: -80.850937 }
        },
        {
          id: "b",
          position: { lat: 35.2259411, lng: -80.845226 }
        },
        {
          id: "c",
          position: { lat: 35.2335351, lng: -80.8409702 }
        }
      ],
      lines: []
    };
  },
  computed: {
    mapConfig() {
      return {
        ...mapSettings,
        center: this.mapCenter
      };
    },
    mapCenter() {
      return this.markers[1].position;
    },
    apiKey() {
      return process.env.VUE_APP_GOOGLE_API_KEY;
    }
  }
}
</script>

<style scoped>

</style>