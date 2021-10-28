<template>
    <region-group />

    <div class="items-list">
        <item v-for="(item, index) in items" :key="index"
            :title="item.title" :content="item.content" :date="item.date"/>
    </div>
</template>

<script>
import Item from "../components/Item";
import RegionGroup from "../components/RegionGroup";

export default {
    name: "Items list",
    props: {
        items: Array,
    },
    components: {
        Item,
        RegionGroup,
    },
}
</script>

<style>
.items-list {
    padding: 3rem;
    max-width: 1280px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 1.6em;
}
</style>
