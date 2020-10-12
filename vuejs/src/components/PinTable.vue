<template>
  <div>
    <AddPin></AddPin>
    <b-table striped hover :items="pins" :fields="fields"></b-table>
  </div>
</template>

<script>
import {getAllPins} from '@/requests/pins';
import moment from 'moment';
import AddPin from '@/components/Controls/AddPin';

const formatPinData = (data) => {
  var newData = [];
  data.forEach((pin) => {
    newData.push({
      rfid: pin.rfidNumber,
      latitude: pin.latitude,
      longitude: pin.longitude,
      updated: moment(pin.updated_at).format('MM/DD/YYYY h:mm:ss A Z'),
    });
  });
  return newData;
}

export default {
  name: 'PinTable',
  components: {AddPin},
  comments: {
    AddPin
  },
  data() {
    return {
      fields: [
        {
          key: 'rfid',
          label: 'RFID'
        },
        {
          key: 'latitude'
        },
        {
          key: 'longitude'
        },
        {
          key: 'updated',
          label: 'Last Updated',
          sortable: true
        }
      ],
      pins: null,
    };
  },
  mounted() {
    getAllPins().then(response => (this.pins = formatPinData(response.data))).catch(error => console.log(error));
  },
};
</script>