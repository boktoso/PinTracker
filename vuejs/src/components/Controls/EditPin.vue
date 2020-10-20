<template>
  <div>
    <b-modal ref="editPinModal" id="edit-pin-modal" title="Edit Pin" hide-footer v-model="showModal">
      <div>
        <PinForm
            :rfid-number="pin.rfidNumber"
            :latitude="pin.latitude"
            :longitude="pin.longitude"
            :submit-form="onSubmit"
            :hide-modal="hideModal"
        />
      </div>
    </b-modal>
  </div>
</template>

<script>
import PinForm from '@/components/Forms/PinForm'

export default {
  name: 'EditPin',
  components: { PinForm },
  methods: {
    onSubmit (data) {
      const pinData = JSON.stringify(data)
      console.log(pinData, this.id)
    },
    hideModal () {
      this.$refs['editPinModal'].hide()
    },
  },
  data () {
    return {
      pin: {
        id: String,
        rfidNumber: String,
        latitude: Number,
        longitude: Number,
      }
    }
  },
  props: {
    value: Boolean,
  },
  computed: {
    showModal: {
      get () {
        return this.value
      },
      set (val) {
        this.$emit('input', val)
      },
    },
  },
}
</script>

<style scoped>

</style>