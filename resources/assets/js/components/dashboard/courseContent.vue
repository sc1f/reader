<template>
    <div class="course__content height-100 grid-y animated fadeIn animation-delay-1">
        <div v-if="!$store.getters['courseContent/getCurrentCourseLoaded']">
            <h5 id="current-date" class="bold">It's <span class="color-theme-primary">{{ current_date.day_of_week }}</span>,
                {{ current_date.month }} {{ current_date.day }}.</h5>
            <p>Select a course from the sidebar to begin.</p>
        </div>
        <div class="cell height-100" v-else>
            <!-- TODO: finish this out -->
            <div class="content__container grid-y">
                <div class="content__meta margin-bottom-1 grid-x align-middle">
                    <div class="cell auto content__meta--left">
                        <h1 id="content__meta--course-name" class="bold margin-0">{{ $store.getters['courseContent/getCurrentCourse'].name }}</h1>
                    </div>
                    <div class="grid-y align-right align-top margin-left-auto">
                        <button class="course__form--button course__form--button--hollow course__form--button--right flex-container align-center-middle margin-bottom-50">
                            <i class="fi-page-doc course__form--button--icon"></i><span>New Document</span>
                        </button>
                        <button class="course__form--button course__form--button--hollow course__form--button--right flex-container align-center-middle">
                            <i class="fi-checkbox course__form--button--icon"></i><span>New To-Do</span>
                        </button>
                    </div>
                </div>
                <div class="content__deadlines--container grid-y height-100">
                    <div class="margin-bottom-1 grid-x">
                        <div class="cell auto flex-container flex-dir-column content__deadlines content__deadlines--left margin-right-1">
                            <course-deadlines></course-deadlines>
                        </div>
                       <!-- <div class="cell auto content__meta&#45;&#45;right flex-container flex-dir-column content__deadlines content__deadlines&#45;&#45;right">
                            <course-documents></course-documents>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import { mapGetters, mapActions } from 'vuex'
    import moment from 'moment';

    let data = {
        current_date: null
    }

    export default {
        data: () => data,
        created() {
            let self = this;
            data.current_date = self.getCurrentDate();
        },
        methods: {
            getOrdinalNum(n) {
                return (n > 0 ? ['th', 'st', 'nd', 'rd'][(n > 3 && n < 21) || n % 10 > 3 ? 0 : n % 10] : '');
            },
            getCurrentDate() {
                let self = this,
                    date = moment(),
                    months = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ],
                    days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                return {
                    month: months[date.month()],
                    day: date.date(),
                    day_of_week: days[date.day()],
                    ordinal: self.getOrdinalNum(date.date()),
                    year: date.year()
                }
            }
        }
    }
</script>