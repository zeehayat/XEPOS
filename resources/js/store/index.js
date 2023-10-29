import {createStore} from 'vuex';

const store=createStore({

    state: {
        token:localStorage.getItem('token') || 0 ,
    },
    mutations: {
        //updates
        UPDATE_TOKEN(state,payload){
            state.token=payload
        }

    },
    actions: {
        // fetch
        setToken(context,payload){
            context.commit('UPDATE_TOKEN',payload)
        },
        removeToken(context){
            localStorage.removeItem('token')
            context.commit('UPDATE_TOKEN',0)
        }
    },
    getters:{
        // returns state variables
        getToken:function(state){
            return state.token
        }
    }
})

export default store
