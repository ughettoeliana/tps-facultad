Vue.component('city-searchbar', {
  props: ['onSearch'],
  data(){
    return {
      value: '',
    }
  },

  methods: {
    onKeyPress(e) {
      if (e.key == "Enter" && this.value) {
        this.onSearch(this.value);
        this.value = '';
      }
    }
  },

  template: ` 
    <div class="search-box">
      <input
        type="text"
        class="search-bar"
        placeholder="Search the city..."
        v-model="value"
        v-on:keypress="onKeyPress"
      />
    </div>`

})


Vue.component('city-card', {
  props: ['cityHistory', 'name',
    'temp',
    'weather'
  ],

  template: `<div>
    <div class="cityHistory-box">
      <h2 class="cityHistory-title">{{ name }}</h2>
      <h3 class="cityHistory-temp">{{ temp }}°c</h3>
      <p class="cityHistory-weather">{{ weather }}</p>
      </div>
    </div>`
});

const app = new Vue({
  el: '#app',
  data: {
    searchQuery: '',
    cityHistory: [],
    hasError: false,
    searchList: []
  },

  methods: {

    parseWeatherResponse(res) {
      return {
        id: res.id,
        name: res.name,
        country: res.sys.country,
        temp: Math.round(res.main.temp),
        weather: res.weather[0].main,
      }
    },

    dateBuilder() {
      const months = [
        'January',
        'Februery',
        'March',
        'April',
        'May',
        'June',
        'July',
        'September',
        'November',
        'December',
      ];
      const days = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
      ];
      let d = new Date();
      let day = days[d.getDay()];
      let month = months[d.getMonth()];
      let date = d.getDate();
      let year = d.getFullYear();

      return `${day} ${date} ${month} ${year}`;
    },

    async onSearch(searchValue) {
      this.hasError = false
      const rawCity = await this.fetchWeather(searchValue);
      // Borramos la busqueda anterior de la misma ciudad.
      this.cityHistory = this.cityHistory.filter(item => item.id !== rawCity.id);
      const newCity = this.parseWeatherResponse(rawCity);
      this.cityHistory.push(newCity);
    },

    async fetchWeather(searchQuery) {
      const baseUrl = 'https://api.openweathermap.org/data/2.5/weather?q=';
      const apiKey = 'ba9d29841e8cf91d17e903bbcc9dc4a1';
      this.hasError = false

      return fetch(`${baseUrl}${searchQuery}&appid=${apiKey}&units=metric`)
        .then(res => res.json())
        .catch(e => { this.hasError = true });
    },

  },

  watch: {
    cityHistory(newCity) {
      localStorage.cityHistory = JSON.stringify(newCity);
    },

  },

  mounted() {
    if (localStorage.cityHistory) {
      this.cityHistory = JSON.parse(localStorage.cityHistory);
    }
  },

  computed: {
    hasWeather() {
      return this.cityHistory.length > 0;
    },

    activeCity() {
      return this.cityHistory[this.cityHistory.length - 1];
    },

    weatherClass() {
      return this.activeCity?.temp > 16 ? 'warm' : '';
    },

  },

});

