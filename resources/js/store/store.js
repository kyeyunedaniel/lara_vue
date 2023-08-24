import { createStore } from 'vuex'; // Import createStore from Vuex

const store = createStore({
  state: {
    // Your state properties here
    adminname:"Mark", 
    adminMessage:"Hello From Admin"  
},
  mutations: {
    // Your mutations here
  },
  actions: {
    // Your actions here
  },
  getters: {
    // Your getters here
  }
});

export default store;