<template>
    <div class="region-links">
        <inertia-link v-for="(link, index) in links" :key="index"
                      :href="route('index', {region_id:link.region_id})"
                      class="region-group__link"
                      :class="{active_link: href === route('index', {region_id:link.region_id})}">
            {{ link.region_name }}
        </inertia-link>
    </div>
</template>

<script>
import { Link as InertiaLink } from "@inertiajs/inertia-vue3";

export default {
    name: "RegionGroup",
    // props: [ 'links' ],
    data() {
        return {
            href: window.location.href,
            links: [
                {region_id:24, region_name: 'Красноярский край'},
                {region_id:23, region_name: 'Краснодарский край'},
                {region_id:64, region_name: 'Саратовская область'},
            ],
        }
    },
    components: {
        InertiaLink,
    },
}
</script>

<style>
.region-links {
    padding: 3rem;
    max-width: 1280px;
    flex-wrap: wrap;
    display: flex;
    align-items: center;
    gap: 1em;
}
.active_link {
    font-weight: bold;
}
</style>
