<template>
    <div class="courses__sidebar">
        <div>
            <div class="flex-container align-middle courses__header margin-bottom-1 padding-top-25">
                <h5 class="bold margin-bottom-0 margin-right-50">Your Courses</h5>
                <div class="cell auto">
                    <button @click.stop="createNewCourse()" class="button primary course__form--button course__form--button--small flex-container align-center-middle">
                        <i class="fi-plus"></i>
                    </button>
                </div>
            </div>
            <div class="courses__container courses__container--none cell auto" v-if="!$store.getters['courseSidebar/getCourseList']">
                <p>You have no courses to track.</p>
            </div>
            <section v-if="$store.getters['courseSidebar/getCourseList']">
                <div class="courses__container grid-y">
                    <div class="cell course grid-y animated fadeIn animation-delay-25" v-for="course in $store.getters['courseSidebar/getCourseList']"
                         @click="$store.dispatch('courseContent/getCourseById', course.id)">
                        <div class="grid-x">
                            <i class="fi-folder course__icon"></i>
                            <span class="course__text course__text--name">{{ truncate(course.name, 12, "...") }}</span>
                        </div>
                        <span class="course__text course__text--meta"><i class="fi-info course__icon"></i> {{ course.department }} {{ course.course_code}}</span>
                        <span class="course__text course__text--meta"><i class="fi-clock course__icon"></i> {{ course.time }}</span>
                    </div>
                </div>
            </section>
            <a v-if="$store.getters['courseContent/getCurrentCourseLoaded']" @click.stop="$store.dispatch('courseContent/hideCourse')">Return to overview</a>
            <modal :show="show_new_course_modal" @close="show_new_course_modal = false">
                <!-- TODO: finish this -->
                <h4 class="bold">Create a new course</h4>
                <form method="POST">
                    <label for="course_name">Course Name</label>
                    <input type="text" id="course_name">
                    <label for="course_code">Course Code</label>
                    <input type="text" id="course_code">
                    <button class="button primary">Submit</button>
                </form>
            </modal>
        </div>
    </div>
</template>

<script>
    //import { mapGetters, mapActions } from 'vuex'
    let data = {
        show_new_course_modal: false,
        window: window
    };

    export default {
        data: () => {
            return data
        },
        created() {
            this.$store.dispatch('courseSidebar/getCourseListByUser')
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
            },
            createNewCourse() {
                data.show_new_course_modal = true;
            }
        }
    }
</script>