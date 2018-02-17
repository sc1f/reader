<template>
    <div class="content__container">
        <div class="content__container--left margin-bottom-1 grid-x">
            <div class="cell auto flex-container flex-dir-column margin-right-1">
                <slot name="deadlines"></slot>
            </div>
            <div class="content__container--right cell auto flex-container flex-dir-column flex-end">
                <slot name="documents"></slot>
            </div>
        </div>
    </div>
</template>
<script>
    let data = {};
    export default {
        data: () => data,
    }
</script>