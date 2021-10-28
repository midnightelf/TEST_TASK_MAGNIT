import { createApp, h } from "vue"
import { createInertiaApp } from "@inertiajs/inertia-vue3"
import { InertiaProgress } from "@inertiajs/progress"
import { VuesticPlugin } from "vuestic-ui";
import "vuestic-ui/dist/vuestic-ui.css";
import route from "ziggy-js";

InertiaProgress.init()

createInertiaApp({
    resolve: name => require(`./${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VuesticPlugin)
            .mixin({ methods: { route } })
            .mount(el)
    },
})

require('./bootstrap');
