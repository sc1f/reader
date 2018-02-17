<template>
    <div class="grid-y">
        <div class="grid-x flex-container align-middle">
            <h5 class="bold margin-bottom-0 margin-right-50">Course Documents</h5>
        </div>
    </div>
</template>
<script>
    let data = {};
    export default {
        data: () => data,
        props: ['limit', 'all']
    }
</script>