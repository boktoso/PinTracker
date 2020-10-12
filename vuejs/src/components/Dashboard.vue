<template>
  <b-container>
    <h1 class="dashboard-header">Dashboard</h1>
    <b-row>
      <b-col>
        <PinTable />
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
// import MapWidget from "@/components/MapWidget";
import PinTable from "@/components/PinTable";

export default {
  name: 'Dashboard',
  components: {
    // MapWidget, // Disable Map to conserve on Google API Calls for POC
    PinTable
  }
}
</script>

<style scoped>
  .dashboard-header {
    text-align: center;
    margin-top: 60px;
  }
</style>