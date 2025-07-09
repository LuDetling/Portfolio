import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';



/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faGithub, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { faAngleLeft, faAngleRight, faTrash, faPenToSquare, faPlus, faBars } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faGithub, faLinkedin, faAngleLeft, faAngleRight, faTrash, faPenToSquare, faPlus, faBars)

import App from './App.vue'
import router from './router'
// import VueMeta from 'vue-meta'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(PrimeVue, {
    theme: {
        preset: Aura
    }
});

app.component('font-awesome-icon', FontAwesomeIcon)

app.mount('#app')
