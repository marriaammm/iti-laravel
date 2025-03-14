import './bootstrap';
import { createApp, h } from 'vue'; // Import `h` function
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from 'ziggy-js';
import { Ziggy } from './ziggy';
// Remove the manual Vue app creation
// const app = createApp({});
// app.component('view-ajax', ViewAjax);
// app.mount('#app');

// Initialize Inertia.js
createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
          .use(plugin)
          .use(ZiggyVue, Ziggy) // Add this line
          .mount(el);
    },
});