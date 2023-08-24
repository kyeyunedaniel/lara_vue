import { createStore } from 'vuex'; // Import createStore from Vuex

const store = createStore({
  state: {
    // Your state properties here
    loggedInData:'', 

},
  mutations: {
    // Your mutations here
    setCurrentUser(state, userData) {
      state.loggedInData = userData;
    },
  },
  actions: {
    // Your actions here
    fetchCurrentUser({ commit }) {
      return axios.get('/current_user_name')
        .then(response => {
          commit('setCurrentUser', {
            current_user_name_new:response.data.User,
            current_user_id_new:response.data.User_id
          });
        })
        .catch(error => {
          console.error('Error fetching current user:', error);
        });
  },  },
  getters: {
    // Your getters here
  }
});

export default store;