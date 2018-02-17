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
        getCourseList: (state) => state.courses,
    },
    mutations: {
        setCourseList: (state, courses) => { state.courses = courses }
    },
    actions: {
        getCourseListByUser({ commit, state, rootState }) {
            return new Promise((resolve, reject) => {
                let url = '/api/user/courses/';
                axios.get(url, {
                    // set headers
                })
                    .then((response) => {
                        commit('setCourseList', response.data.courses);
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
    },
    getters: {
        getCurrentCourse: (state) => state.current_course,
    },
    mutations: {
        setCurrentCourse: (state, course) => { state.current_course = course },
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

function loadCustomVueComponents() {
    // common
    Vue.component('modal', require('./components/common/BaseModal.vue'));
    // dashboard
    Vue.component('dashboard', require('./components/Dashboard.vue'));
    Vue.component('course-sidebar', require('./components/dashboard/courseSidebar.vue'));
    // course-content
    Vue.component('course-content-header', require('./components/dashboard/courseContent/courseContentHeader.vue'));
    Vue.component('course-content', require('./components/dashboard/courseContent.vue'));
    Vue.component('course-content-container', require('./components/dashboard/courseContent/courseContentContainer.vue'));
    //Vue.component('course-form', require('./components/dashboard/courseForm.vue'));
    // course-deadlines
    Vue.component('deadlines', require('./components/dashboard/components/courseDeadlines.vue'));
    Vue.component('deadline', require('./components/dashboard/components/Deadline.vue'));
    // TODO: Vue.component('deadline-form', require('./components/dashboard/courseForm.vue'));
    // course-documents
    Vue.component('documents', require('./components/dashboard/components/courseDocuments.vue'));
    // TODO: Vue.component('document-form', require('./components/dashboard/courseForm.vue'));

}

function loadPassportVueComponents() {
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
}

// run page setup
loadCustomVueComponents();
loadPassportVueComponents();

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
