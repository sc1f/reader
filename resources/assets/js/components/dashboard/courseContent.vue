<template>
<div class="course__content height-100 grid-y">
    <div class="cell height-100 flex-container align-center-middle" v-if="!$store.getters['courseContent/getCurrentCourseLoaded']">
        <p>Select a course from the sidebar to begin.</p>
    </div>
    <div class="cell height-100 grid-y" v-else>
        <!-- TODO: finish this out -->
        <pre>{{ $store.getters['courseContent/getCurrentCourse'] }}</pre>
    </div>
</div>
</template>

<script>
    //import { mapGetters, mapActions } from 'vuex'
    let data = {
        window: window
    };

    export default {
        data: () => {
            return data
        },
        created() {

        },
    }
</script>