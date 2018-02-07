<template>
    <div class="courses__sidebar">
        <div>
            <div class="grid-x flex-container align-middle courses__header margin-bottom-1">
                <h5 class="bold margin-bottom-0 margin-right-50">Your Courses</h5>
                <div class="cell auto">
                    <button id="new-deadline-form__activator" class="course__form--button course__form--button--small flex-container align-center-middle">
                        <i class="fi-plus"></i>
                    </button>
                </div>
            </div>
            <div class="courses__container courses__container--none cell auto" v-if="!$store.getters['courseSidebar/getCoursesLoaded'] && !$store.getters['courseSidebar/getCourses']">
                <p>You have no courses to track.</p>
            </div>
            <section v-if="$store.getters['courseSidebar/getCoursesLoaded']">
                <div class="courses__container grid-y">
                    <div class="cell course grid-y animated fadeIn animation-delay-25" v-for="course in $store.getters['courseSidebar/getCourses']"
                         @click="$store.dispatch('courseContent/getCourseById', course.id)">
                        <div class="grid-x">
                            <i class="fi-folder course__icon"></i>
                            <span class="course__text course__text--name">{{ truncate(course.name, 12, "...") }}</span>
                        </div>
                        <span class="course__text course__text--meta"><i class="fi-info course__icon"></i> {{ course.department }} {{ course.course_code}}</span>
                        <span class="course__text course__text--meta"><i class="fi-clock course__icon"></i> {{ course.time }}</span>
                        <!-- TODO: cocurse room? -->
                    </div>
                </div>
            </section>
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
            this.$store.dispatch('courseSidebar/getCoursesByUser')
                .then(() => {
                    return true;
                })
                .catch((error) => {
                    //console.error(error);
                });
        },
        methods: {
            truncate: function (text, stop, clamp) {
                return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '')
            }
        }
    }
</script>