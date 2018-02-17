<template>
    <div class="grid-y">
        <div class="grid-x flex-container align-middle padding-bottom-1">
            <h5 class="bold margin-bottom-0 margin-right-50">Upcoming Deadlines</h5>
        </div>
        <deadline></deadline>
        <deadline></deadline>
        <deadline></deadline>
    </div>
</template>
<script>
    let data = {};
    export default {
        data: () => data,
        props: ['limit', 'all']
    }
</script>