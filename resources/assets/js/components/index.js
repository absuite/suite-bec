import statuteSetting from './statuteSetting.vue';
import statuteNews from './statuteNews.vue';
import statuteQuery from './statuteQuery.vue';

export default function install(Vue) {
    Vue.component('becStatuteSetting', statuteSetting);
    Vue.component('becStatuteNews', statuteNews);
    Vue.component('becStatuteQuery', statuteQuery);
}
