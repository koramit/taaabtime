import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import AppLayout from '../js/Components/Layouts/AppLayout.vue';

// noinspection JSUnusedGlobalSymbols,JSIgnoredPromiseFromCall
createInertiaApp({
    resolve: name => {
        return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
            .then(page => {
                page.default.layout = (name.startsWith('Auth/') ) ? null : AppLayout;

                return page;
            });
    },
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
