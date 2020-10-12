<template>
  <b-container>
    <h1>Dashboard</h1>
    <h2>Hello There!</h2>
    <b-row>
      <b-col>
        <div>
          <h2>Map</h2>
          <GoogleMapLoader :mapConfig="mapConfig" />
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import GoogleMapLoader from "@/components/GoogleMaps/GoogleMapLoader";
import { mapSettings } from '@/constants/mapSettings'

export default {
  name: 'Dashboard',
  components: {
    GoogleMapLoader
  },
  props: {
    username: String
  },
  data() {
    return {
      markers: [
        {
          id: "a",
          position: { lat: 3, lng: 101 }
        },
        {
          id: "b",
          position: { lat: 5, lng: 99 }
        },
        {
          id: "c",
          position: { lat: 6, lng: 97 }
        }
      ]
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
    }
  }
}
</script>