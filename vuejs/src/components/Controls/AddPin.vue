<template>
  <div>
    <b-button v-b-modal.add-new-pin-modal style="margin-bottom: 10px;"
              variant="success">
      <font-awesome-icon :icon="['fas', 'plus']"/>
      Add New Pin
    </b-button>
    <b-modal ref="addPinModal" id="add-new-pin-modal" title="Add New Pin"
             hide-footer>
      <div>
        <PinForm
            :submit-form="onSubmit"
            :hide-modal="hideModal"
        />
      </div>
    </b-modal>
  </div>
</template>

<script>
import { createNewPin } from '@/requests/pins'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlus } from '@fortawesome/free-solid-svg-icons'
import PinForm from '@/components/Forms/PinForm'

library.add(faPlus)

export default {
  name: 'AddPin',
  components: { PinForm },
  data () {
    return {
      rfidNumber: '',
      latitude: 0,
      longitude: 0,
    }
  },
  methods: {
    onSubmit (data) {
      const pinData = JSON.stringify(data)
      console.log(pinData)
      createNewPin(pinData).then(function () {
        this.onReset()
        this.$emit('handleCreatedNewPin')
      }).catch(function (error) {
        console.error(error)
      })
    },
    hideModal () {
      this.$refs['addPinModal'].hide()
    },
  },
}
</script>

<style scoped>

</style>