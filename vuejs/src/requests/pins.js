import axios from 'axios';
const getAllPins = function () {
  return axios.get(process.env.VUE_APP_API_ENDPOINT + 'pin')
}

const createNewPin = function(pinData) {
  return axios.post(process.env.VUE_APP_API_ENDPOINT + 'pin', pinData);
}

const updatePin = function (pinData) {
  return axios.put(process.env.VUE_APP_API_ENDPOINT + 'pin/' + pinData.id, pinData);
}
export { getAllPins, createNewPin, updatePin }