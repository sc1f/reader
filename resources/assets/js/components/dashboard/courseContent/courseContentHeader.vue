<template>
    <div class="course-content__header margin-bottom-1 grid-x align-middle padding-top-25">
        <div class="cell small-12 medium-6 large-6 content__meta--left">
            <slot name="title"></slot>
        </div>
        <div class="cell auto">
            <slot name="actions"></slot>
        </div>
    </div>
</template>
<script>
    let data = {};
    export default {
        data: () => data,
    }
</script>