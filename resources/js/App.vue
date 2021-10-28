<template>
    <ItemsList :items="items" />
</template>

<script>
import ItemsList from "./views/ItemsList"

export default {
    name: "app",
    props: {
        items: Array
    },
    components: {
        ItemsList
    }
}
</script>
