import { createApp } from 'vue'
import router from './router'
import axiosClient from './axios'
import App from './App.vue'
import './css/index.css'

const app = createApp(App)
app.use(router)
app.config.globalProperties.$http = axiosClient;
app.provide('$http', axiosClient)
app.mount('#app')
