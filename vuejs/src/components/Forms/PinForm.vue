<template>
  <ValidationObserver v-slot="{ invalid }">
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-row>
        <b-col>
          <ValidationProvider name="rfidNumber"
                              :rules="{ required: true, min: 5 }"
                              v-slot="{ errors }">
            <b-form-group id="rfidNumber-input-group" label="RFID Number"
                          label-for="rfidNumber-input"
                          description="RFID Number for the PIN you are tracking.">
              <b-form-input id="rfidNumber-input"
                            v-model="form.rfidNumber" type="text" required
                            placeholder="Enter RFID Number"></b-form-input>
              <span class="error">{{ errors[0] }}</span>
            </b-form-group>
          </ValidationProvider>
        </b-col>
      </b-row>
      <b-row>
        <b-col>
          <ValidationProvider name="latitude" :rules="{required: true}"
                              v-slot="{ errors }">
            <b-form-group id="latitude-input-group" label="Latitude"
                          label-for="latitude-input">
              <b-form-input id="latitude-input" required
                            v-model="form.latitude" type="text"
                            placeholder="0.0"></b-form-input>
              <span class="error">{{ errors[0] }}</span>
            </b-form-group>
          </ValidationProvider>
        </b-col>
        <b-col>
          <ValidationProvider nam="longitude" :rules="{required: true}"
                              v-slot="{ errors }">
            <b-form-group id="longitude-input-group" label="Longitude"
                          label-for="longitude-input">
              <b-form-input id="longitude-input" required
                            v-model="form.longitude" type="text"
                            placeholder="0.0"></b-form-input>
              <span class="error">{{ errors[0] }}</span>
            </b-form-group>
          </ValidationProvider>
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
            <b-button type="submit" variant="success" :disabled="invalid">
              Submit
            </b-button>
          </div>
        </b-col>
      </b-row>
    </b-form>
  </ValidationObserver>
</template>

<script>
export default {
  name: 'PinForm',
  data () {
    return {
      form: {
        rfidNumber: '',
        latitude: 0,
        longitude: 0,
      },
      show: true
    }
  },
  methods: {
    onSubmit (evt) {
      evt.preventDefault()
      this.submitForm({
        rfidNumber: this.form.rfidNumber,
        latitude: this.form.latitude,
        longitude: this.form.longitude,
      });
    },
    onReset (evt) {
      evt.preventDefault()
      // Reset our form values
      this.form.rfidNumber = ''
      this.form.latitude = 0
      this.form.longitude = 0
      // Trick to reset/clear native browser form validation state
      this.show = false
      this.$nextTick(() => {
        this.show = true
      })
      this.hideModal()
    },
  },
  props: {
    rfidNumber: String,
    latitude: Number,
    longitude: Number,
    submitForm: Function,
    hideModal: Function,
  },
}
</script>

<style scoped>
.error {
  color: red;
}
</style>