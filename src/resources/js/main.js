import { createApp } from 'vue';

// import App from './App.vue';
// const app = createApp(App);

// app.mount('#app');

import DashboardsButtons from './views/components/DashboardsButtons.vue';
const buttons = createApp(DashboardsButtons);

buttons.mount('#DashboardsButtons');


import More from './More.vue';
const more = createApp(More);

more.mount('#more');


