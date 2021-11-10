// Api key : f9106b567d165e07fdd2e9a9e81dd8e5;

// Selection des éléments

const iconElement = document.querySelector('.weather.icon');
const tempElement = document.querySelector('.temperature.value p');
const descElement = document.querySelector('.temperature-description');
const locationElement = document.querySelector('.location p');
const notificationElement = document.querySelector('.notification');

// App data

const weather = {};
weather.temperature = {
  unit: 'celsius'
};

// Const and viarables
const KELVIN = 273;
// API KEY
const key = 'f9106b567d165e07fdd2e9a9e81dd8e5';