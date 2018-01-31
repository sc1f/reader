<template>
    <div class="dashboard">
        <div class="grid-x index">
            <div class="cell large-2 medium-4 small-12 courses grid-y">
                <course-sidebar></course-sidebar>
            </div>
            <div class="cell auto content">
                <course-content></course-content>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
