import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        booksArr: [],
        user: null,
    },

    actions: {
        getAll: (store) => {
            axios.get('api/book/all').then((response)=>{
                store.state.booksArr = response.data;
                //console.log(this.booksArr);
            });
        },

        getUser: (store) => {
            axios.get('api/user', {
                headers: {
                    "Authorization" : 'Bearer ' + localStorage.getItem('token'),
                }
                }).then(response => {
                    //console.log(response.data);
                    store.state.user = response.data;
            });
        }
    }
});