<template>
    <v-app>
      <!-- App bar -->
      <v-app-bar app>
        <v-app-bar-nav-icon @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Lara Vue</v-toolbar-title>
        <p class="font-weight-regular ma-4">
      Hello {{curent_user}}
    </p>
      </v-app-bar>
  
      <!-- Navigation drawer -->
      <!-- -deep-purple -->
      <v-navigation-drawer
        theme="dark" app v-model="drawerOpen">
        <!-- Drawer content here -->
        <v-list color="white">
          <!-- :class="{ active: $route.path === '/home' }" -->
        <router-link :to="{name:'home'}" exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
        <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" value="Dahboard"></v-list-item>
        </router-link>

        <!-- <router-link to="/posts"> -->
            <v-list-item prepend-icon="mdi-account-box" title="Account"></v-list-item>
        <!-- </router-link> -->

        <router-link to="/posts" :exact="true" active-class="v-item-active" style="text-decoration: none; color: inherit;">
        <v-list-item prepend-icon="mdi-email" title="Inbox" value="inbox"></v-list-item>
        </router-link>

        <v-list-item prepend-icon="mdi-gavel" title="Statistics"></v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <v-btn block @click="logOut">
              Logout
            </v-btn>
          </div>
        </template>

      </v-navigation-drawer>
      
      <!-- Main content -->
      <v-main>
        <!-- Your main app content here -->
        <!-- For example: -->
        <v-container>
          <!-- <v-row> -->
            <!-- <v-col cols="12"> -->
              <!-- <h1>Welcome to My App</h1> -->
              <router-view/>
            <!-- </v-col> -->
          <!-- </v-row> -->
        </v-container>
      </v-main>
    </v-app>
  </template> 
  <style>
  

</style>
  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        curent_user:'',
        drawerOpen: true, // For controlling the navigation drawer's open/close state
      };
    },
    methods: {
      toggleDrawer() {
        this.drawerOpen = !this.drawerOpen;
      },

      currentUser(){
        axios.get('current_user_name')
        .then(response=>{
          console.log(response.data)
          // current_user:this.response.current_user;
        })
        .catch(error=>{
          console.log(error)
        })
      },

      alerting(){
        alert('button clicked');
      },

      logOut(){
        console.log('you are attempting to logout')
        axios.post('/logout')
        .then(response=>{
          console.log(response)
          localStorage.removeItem('access_token');
          window.location.href = '/login'
          location.reload()
        })
        .catch(error=>{
            console.log(error)
        })

      }
    },
    mounted(){
      console.log('navbar mounted')
      this.currentUser()
    }

  };
  </script>
