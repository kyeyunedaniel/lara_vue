<template>
  <div :style="{ backgroundColor: '#B3E5FC' }">
    <div class="weather-app">
      Weather App
      <div class="weather-info">
        <p>{{ weatherData.name }}</p>
        <!-- <p>{{ weatherData.main.temp }}°C</p> -->
        <!-- Display other weather information -->
      </div>
    </div>

    <v-col cols="12" sm="4" class="p-2 ">
      <!-- <v-card color="#1F7087" theme="dark" rounded="3"> -->
        <v-card color="transparent" theme="light">
        <div class="d-flex flex-no-wrap justify-space-between">
          <div>
            <v-card-title class="text-h5"> Supermodel </v-card-title>

            <v-card-subtitle>Foster the People</v-card-subtitle>

            <v-card-actions>
              <v-btn class="ms-2" variant="outlined" size="small">
                VIEW WEATHER
              </v-btn>
            </v-card-actions>
          </div>

          <v-avatar class="ma-3" size="125" rounded="0">
            <v-img
              src="https://cdn.vuetifyjs.com/images/cards/foster.jpg"
            ></v-img>
          </v-avatar>
        </div>
      </v-card>
    </v-col>

    <v-col cols="12" sm="8">
      <v-card color="#1F7087" theme="dark" rounded="3">
        <!-- <v-card color="transparent" theme="dark"> -->
        <div class="d-flex flex-no-wrap justify-space-between">
          <div>
            <v-card-title class="text-h5"> Supermodel </v-card-title>

            <v-card-subtitle>Foster the People</v-card-subtitle>

            <v-card-actions>
              <v-btn class="ms-2" variant="outlined" size="small">
                START RADIO
              </v-btn>
            </v-card-actions>
          </div>

          <v-avatar class="ma-3" size="125" rounded="0">
            <v-img
              src="https://cdn.vuetifyjs.com/images/cards/foster.jpg"
            ></v-img>
          </v-avatar>
        </div>
      </v-card>
    </v-col>


  </div>
</template>
  
  <script>
//   import axios from 'axios';

export default {
  data() {
    return {
      apiKey: "01fc6cba533dec90a1d1732cc84816a3",
      weatherData: {},
      city: "",
      gridBoxes: Array.from({ length: 12 }), // Create an array of 12 items
    };
  },
  mounted() {
    // this.fetchWeather();
  },

  methods: {
    async fetchWeather() {
      // const city = 'YourCityName';
      // const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${this.apiKey}&units=metric`;

      // try {
      //   const response = await axios.get(url);
      //   this.weatherData = response.data;
      // } catch (error) {
      //   console.error('Error fetching weather data:', error);
      // }

      const options = {
        method: "GET",
        url: "https://open-weather13.p.rapidapi.com/city/Kampala",
        headers: {
          "X-RapidAPI-Key":
            "205b879a1dmsh14aefc5c66ee8c5p1e5cfejsnf0691d836243",
          "X-RapidAPI-Host": "open-weather13.p.rapidapi.com",
        },
      };

      try {
        const response = await axios.request(options);
        console.log(response.data.main.temp);
        this;
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>
  
<style scoped>
.box-card {
  background-color: transparent;
  border: 2px solid #42a5f5;
  text-align: center;
  padding: 20px;
  transition: transform 0.3s, border-color 0.3s;
  cursor: pointer;
}

.box-card:hover {
  transform: translateY(-10px);
  border-color: #2196f3;
}

.box-content {
  font-size: 18px;
  font-weight: bold;
  color: #333;
}
</style>





