<template>
    <div class="course__content height-100 grid-y animated fadeIn animation-delay-1">
        <course-content-header>
            <h5 slot="title" v-if="$store.getters['courseContent/getCurrentCourseLoaded']" class="course-content__header bold">{{ $store.getters['courseContent/getCurrentCourse'].name }}</h5>
            <h5 slot="title" v-else id="current-date" class="bold">It's <span class="color-theme-primary">{{ current_date.day_of_week }}</span>,
                {{ current_date.month }} {{ current_date.day }}.</h5>
            <div slot="actions" v-if="$store.getters['courseContent/getCurrentCourseLoaded']" class="grid-y flex-dir-row align-right align-middle">
                <button class="course__form--button course__form--button--hollow course__form--button--right flex-container align-center-middle">
                    <i class="fi-calendar course__form--button--icon"></i><span>New Deadline</span>
                </button>
                <button class="course__form--button course__form--button--hollow course__form--button--right flex-container align-center-middle margin-left-50">
                    <i class="fi-page-doc course__form--button--icon"></i><span>New Document</span>
                </button>
            </div>
        </course-content-header>
        <!-- overview -->
        <course-content-container v-if="$store.getters['courseContent/getCurrentCourseLoaded']">
            <deadlines slot="deadlines"></deadlines>
            <documents slot="documents"></documents>
        </course-content-container>
        <!-- loaded course -->
        <course-content-container v-else>
            <deadlines slot="deadlines" :limit="3" all="true"></deadlines>
            <documents slot="documents" :limit="3" :all="true"></documents>
        </course-content-container>
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