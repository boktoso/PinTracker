<template>
  <div>
    <AddPin @created="handleCreatedNewPin"/>
    <EditPin v-model="showEditModal" :pin="editPinData"/>
    <b-table striped hover sticky-header :items="pins" :fields="fields">
      <template #cell(actions)="row">
        <b-button size="sm" @click="handleEditPin(row.item)">
          <font-awesome-icon :icon="['fas', 'pencil-alt']"/>
          EDIT
        </b-button>
      </template>
    </b-table>
  </div>
</template>

<script>
import { getAllPins } from '@/requests/pins'
import moment from 'moment'
import AddPin from '@/components/Controls/AddPin'
import EditPin from '@/components/Controls/EditPin'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPencilAlt } from '@fortawesome/free-solid-svg-icons'

library.add(faPencilAlt)

const formatPinData = (data) => {
  var newData = []
  data.forEach((pin) => {
    newData.push({
      ...pin,
      updated: moment(pin.updated_at).format('MM/DD/YYYY h:mm:ss A Z'),
    })
  })
  return newData
}

export default {
  name: 'PinTable',
  components: { AddPin, EditPin },
  comments: {
    AddPin,
    EditPin,
  },
  data () {
    return {
      fields: [
        {
          key: 'rfidNumber',
          label: 'RFID',
        },
        {
          key: 'latitude',
        },
        {
          key: 'longitude',
        },
        {
          key: 'updated',
          label: 'Last Updated',
          sortable: true,
        },
        {
          'key': 'actions',
          'label': 'Actions',
          sortable: false,
        },
      ],
      pins: null,
      showEditModal: false,
      currentPin: {
        id: 0,
        rfidNumber: '',
        latitude: 0,
        longitude: 0,
      },
    }
  },
  mounted () {
    this.reloadTable()
    this.$root.$on('bv::modal::hidden ', (bvEvent, modalId) => {
      if (modalId === 'edit-pin-modal') {
        this.showEditModal = false
      }
    })
  },
  methods: {
    handleCreatedNewPin () {
      this.reloadTable()
    },
    handleEditPin (data) {
      const pinData = JSON.parse(JSON.stringify(data));
      this.currentPin = {
        ...pinData
      };
      this.showEditModal = true
    },
    reloadTable () {
      getAllPins().then(response => (this.pins = formatPinData(response.data))).catch(error => console.log(error))
    },
  },
  computed: {
    editPinData: {
      get () {
        return JSON.parse(JSON.stringify(this.currentPin));
      },
      set (val) {
        this.$emit('input', val)
      },
    },
  },
}
</script>