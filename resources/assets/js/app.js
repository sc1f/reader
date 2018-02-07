/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require('vue');
window.Vuex = require('vuex');
window.axios = require('axios');
const axios = window.axios; // shortcut

// add CSRF token
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN': Laravel.csrfToken // get a token from laravel - DO NOT DELETE THIS UNLESS YOU WANT API TO DIE
};

// now add our dependencies inside Vue
window.Vue.use(window.Vuex);

// VueX scaffolding
const dashboard = {
    namespaced: true,
    state: {
        user: {
            id: 1
        }
    }
};

const courseSidebar = {
    namespaced: true,
    state: {
        courses: null,
        courses_loaded: false
    },
    getters: {
        getCourses: (state) => state.courses,
        getCoursesLoaded: (state) => state.courses_loaded
    },
    mutations: {
        setCoursesLoaded: (state) => { state.courses_loaded = true },
        setCourses: (state, courses) => { state.courses = courses }
    },
    actions: {
        getCoursesByUser({ commit, state, rootState }) {
            return new Promise((resolve, reject) => {
                let url = '/api/user/courses/';
                axios.get(url, {
                    // set headers
                })
                    .then((response) => {
                        commit('setCourses', response.data.courses);
                        commit('setCoursesLoaded');
                        resolve();
                    })
                    .catch((err) => {
                        console.error(err);
                        reject(err);
                    })
            });
        }
    }
};

const courseContent = {
    namespaced: true,
    state: {
        current_course: null,
        current_course_loaded: false
    },
    getters: {
        getCurrentCourse: (state) => state.current_course,
        getCurrentCourseLoaded: (state) => state.current_course_loaded
    },
    mutations: {
        setCurrentCourse: (state, course) => { state.current_course = course },
        setCurrentCourseLoaded: (state) => { state.current_course_loaded = true }
    },
    actions: {
        getCourseById({ commit, state, rootState }, course_id) {
            return new Promise((resolve, reject) => {
                let url = '/api/user/courses/' + course_id;
                axios.get(url, {
                    // set headers
                })
                    .then((response) => {
                        commit('setCurrentCourse', response.data.course);
                        commit('setCurrentCourseLoaded');
                        resolve();
                    })
                    .catch((err) => {
                        console.error(err);
                        reject(err);
                    })

            });
        }
    }
};

const newCourseForm = {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {}
};

const newDeadlineForm = {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {}
};

const newDocumentForm = {
    namespaced: true,
    state: {},
    getters: {},
    mutations: {},
    actions: {}
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('course-sidebar', require('./components/dashboard/courseSidebar.vue'));
Vue.component('course-content', require('./components/dashboard/courseContent.vue'));
Vue.component('course-form', require('./components/dashboard/courseForm.vue'));
Vue.component('course-deadlines', require('./components/dashboard/components/courseDeadlines.vue'));
Vue.component('course-documents', require('./components/dashboard/components/courseDocuments.vue'));
Vue.component('deadline', require('./components/dashboard/components/components/Deadline'));

// Vue passport components
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

export const store = new window.Vuex.Store({
    modules: {
        dashboard: dashboard,
        courseSidebar: courseSidebar,
        courseContent: courseContent
    }
});

const app = new Vue({
    el: '#app',
    store: store,
    delimiters: ["((", "))"]
});

$(document).foundation();
