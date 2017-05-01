require('./bootstrap');
import Vue from 'vue'
import SeriesEdit from './components/Edit'

const app = new Vue({
    el: '#app',
    components: {SeriesEdit}
});
