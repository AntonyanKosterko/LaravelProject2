import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        booksArr: [],
    },

    actions: {
        getAll: (store) => {
            axios.get('api/book/all').then((response)=>{
                store.state.booksArr = response.data;
                //console.log(this.booksArr);
            });
        }
    }
});