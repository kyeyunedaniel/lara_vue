<template>
    <v-app>
      <!-- App bar -->
      <v-app-bar app>
        <v-app-bar-nav-icon @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Lara Vue</v-toolbar-title>
        <p class="font-weight-regular ma-4">Hello {{current_user}}</p>
        <v-btn icon>
          <v-icon>mdi-heart</v-icon>
        </v-btn>
      </v-app-bar>
  
      <!-- Navigation drawer -->
      <!-- -deep-purple -->
      <v-navigation-drawer theme="light" v-model="drawerOpen">
        <!-- Drawer content here -->
        <!-- color="white" -->
        <v-list>

          <router-link :to="{name:'home'}" exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" value="Dahboard"></v-list-item>
          </router-link>
          
          <v-list-item prepend-icon="mdi-account-box" title="Account"></v-list-item>


          <router-link to="/posts" :exact="true" active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-email" title="Inbox" value="inbox"></v-list-item>
          </router-link>

          <router-link :to="{name:'account'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-gavel" title="Statistics" value="statistics"></v-list-item>
          </router-link>
      
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
        current_user:null,
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
          this.current_user = response.data;
        })
        .catch(error=>{
          console.log(error)
        })
      },

      alerting(){
        alert('button clicked');
      },

      logOut(){
        
        axios.post('/logout')
        .then(response=>{
          console.log('you are attempting to logout')
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
