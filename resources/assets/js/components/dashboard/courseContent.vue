<template>
    <div class="course__content height-100 grid-y animated fadeIn animation-delay-1">
        <h5 id="current-date" class="bold">It's <span class="color-theme-primary">{{ current_date.day_of_week }}</span>,
            {{ current_date.month }} {{ current_date.day }}.</h5>
        <p v-if="!$store.getters['courseContent/getCurrentCourseLoaded']">Select a course from the sidebar to begin.</p>
        <div class="cell height-100" v-else>
            <!-- TODO: finish this out -->
            <div class="content__container grid-y">
                <div class="content__meta margin-bottom-1 grid-x">
                    <div class="cell large-8 medium-8 small-12 content__meta--left align-middle">
                        <h3 class="bold margin-0">{{ $store.getters['courseContent/getCurrentCourse'].department }} {{ $store.getters['courseContent/getCurrentCourse'].course_code }}: {{ $store.getters['courseContent/getCurrentCourse'].name }}</h3>
                    </div>
                    <div class="cell auto content__meta--right align-right align-middle flex-container">
                        <span class="margin-right-1">{{ $store.getters['courseContent/getCurrentCourse'].instructor }}</span>
                        <span>{{ $store.getters['courseContent/getCurrentCourse'].time }}</span>
                    </div>
                </div>
                <div class="content__deadlines--container grid-y height-100">
                    <div class="margin-bottom-1 grid-x">
                        <div class="cell large-8 medium-8 small-12 align-left align-middle flex-container content__deadlines content__deadlines--left margin-right-1">
                            <h5 class="bold margin-0">Upcoming Deadlines</h5>
                        </div>
                        <div class="cell auto content__meta--right align-left align-middle flex-container content__deadlines content__deadlines--right">
                            <h5 class="bold margin-0">Course Documents</h5>
                        </div>
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
                // we don't need moment.js, do we
                let self = this,
                    date = moment(),
                    months = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ],
                    days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
                return {
                    month: months[date.month()],
                    day: date.date(),
                    day_of_week: days[date.day() - 1],
                    ordinal: self.getOrdinalNum(date.date()),
                    year: date.year()
                }
            }
        }
    }
</script>