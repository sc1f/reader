<template>
    <div class="courses__sidebar">
        <div>
            <div class="grid-x align-middle courses__header">
                <h5>Your Courses</h5>
            </div>
            <div class="courses__container courses__container--none cell auto" v-if="!$store.getters['courseSidebar/getCoursesLoaded'] && !$store.getters['courseSidebar/getCourses']">
                <p>You have no courses to track.</p>
            </div>
            <section v-if="$store.getters['courseSidebar/getCoursesLoaded']">
                <div class="courses__container grid-y">
                    <div class="cell course grid-y animated fadeIn" v-for="course in $store.getters['courseSidebar/getCourses']"
                         @click="$store.dispatch('courseContent/getCourseById', course.id)">
                        <div class="grid-x">
                            <i class="fi-folder course__icon"></i>
                            <span class="course__text course__text--name">{{ course.name }}</span>
                        </div>
                        <span class="course__text course__text--meta">{{ course.department }} {{ course.course_code}}</span>
                        <span class="course__text course__text--meta">{{ course.instructor }}, {{ course.time }}</span>
                        <!-- TODO: course room? -->
                    </div>
                </div>
                <div class="cell animated fadeIn">
                    <button id="new-course-form__activator" class="course__form--new_course">
                        <i class="fi-plus"></i><span>New Course</span>
                    </button>
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
    }
</script>