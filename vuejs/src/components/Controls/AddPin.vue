<template>
  <div>
    <b-button v-b-modal.add-new-pin-modal style="margin-bottom: 10px;" variant="success">Add New Pin</b-button>
    <b-modal ref="addPinModal" id="add-new-pin-modal" title="Add New Pin" hide-footer>
      <div>
        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
          <b-row>
            <b-col>
              <b-form-group id="rfidNumber-input-group" label="RFID Number" label-for="rfidNumber-input"
                            description="RFID Number for the PIN you are tracking.">
                <b-form-input id="rfidNumber-input" v-model="form.rfidNumber" type="text" required
                              placeholder="Enter RFID Number"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group id="latitude-input-group" label="Latitude" label-for="latitude-input">
                <b-form-input id="latitude-input" required v-model="form.latitude" type="text"
                              placeholder="0.0"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group id="longitude-input-group" label="Longitude" label-for="longitude-input">
                <b-form-input id="longitude-input" required v-model="form.longitude" type="text"
                              placeholder="0.0"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <div style="text-align: left;">
                <b-button type="reset">Cancel</b-button>
              </div>
            </b-col>
            <b-col>
              <div style="text-align: right;">
                <b-button type="submit" variant="success">Submit</b-button>
              </div>
            </b-col>
          </b-row>
        </b-form>
      </div>
    </b-modal>
  </div>
</template>

<script>
export default {
  name: 'AddPin',
  data() {
    return {
      form: {
        rfidNumber: '',
        latitude: 0,
        longitude: 0,
      },
      show: true,
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    },
    onReset(evt) {
      evt.preventDefault();
      // Reset our form values
      this.form.rfidNumber = '';
      this.form.latitude = 0;
      this.form.longitude = 0;
      // Trick to reset/clear native browser form validation state
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
      this.hideModal();
    },
    hideModal() {
      this.$refs['addPinModal'].hide();
    }
  },
};
</script>

<style scoped>

</style>