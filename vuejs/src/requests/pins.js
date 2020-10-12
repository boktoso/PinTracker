import axios from 'axios';
const getAllPins = function () {
  return axios.get(process.env.VUE_APP_API_ENDPOINT + 'pin')
}

export { getAllPins }