<template>
    <div class="row item">
        <div class="flex md6 lg4">
            <va-card stripe stripe-color="success">
                <va-card-title>{{ title }}</va-card-title>
                <va-card-content v-html="content"></va-card-content>
                <va-chip size="small">{{ date }}</va-chip>
            </va-card>
        </div>
    </div>
</template>

<script>
import { VaCard, VaCardTitle, VaCardContent, VaChip } from "vuestic-ui";

export default {
    name: "Item",
    props: ['title', 'content', 'date'],
    components: {
        VaCard,
        VaCardTitle,
        VaCardContent,
        VaChip
    },
}
</script>
