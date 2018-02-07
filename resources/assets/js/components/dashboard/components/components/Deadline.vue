<template>
    <div class="deadline cell">
        <div class="grid-y">
            <div class="cell small-12 grid-x flex-container align-middle padding-bottom-1">
                <h3 class="bold margin-right-50 margin-bottom-0">2/5</h3>
                <!-- @click.stop="$store.dispatch('newDocumentForm/showNewDocumentForm')" -->
            </div>
            <div class="cell small-12">
                <ul>
                    <li>Read <a href="#">The Wealth of Nations</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    let data = {
    };
    export default {
        data: () => data,
        mounted() {
        }
    }
</script>