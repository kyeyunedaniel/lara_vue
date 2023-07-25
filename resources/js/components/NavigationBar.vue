<template>
    <v-app>
      <!-- App bar -->
      <v-app-bar app>
        <v-app-bar-nav-icon @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Lara Vue</v-toolbar-title>
      </v-app-bar>
  
      <!-- Navigation drawer -->
      <!-- -deep-purple -->
      <v-navigation-drawer
        theme="dark" app v-model="drawerOpen">
        <!-- Drawer content here -->
        <v-list color="white">

        <router-link to="/home" style="text-decoration: none; color: inherit;">
        <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" value="Dahboard"></v-list-item>
        </router-link>

        <!-- <router-link to="/posts"> -->
            <v-list-item prepend-icon="mdi-account-box" title="Account"></v-list-item>
        <!-- </router-link> -->

        <router-link to="/posts" style="text-decoration: none; color: inherit;">
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
    /* styles.css */
/* .router-link-exact-active { */
  /* This will remove the default blue color on active links */
  /* color: "white";  */
  /* You can also set a specific color here if you prefer */
  /* text-decoration: none;  */
  /* This will remove the underline */
/* } */
/* .router-link-exact-inactive { */
  /* This will remove the default blue color on active links */
  /* color: 'white' ; */
   /* You can also set a specific color here if you prefer */
  /* text-decoration: none;  */
  /* This will remove the underline */
/* } */

</style>
  <script>
  export default {
    data() {
      return {
        drawerOpen: true, // For controlling the navigation drawer's open/close state
      };
    },
    methods: {
      toggleDrawer() {
        this.drawerOpen = !this.drawerOpen;
      },
      alerting(){
        alert('button clicked');
      },
      logOut(){
        axios.post('')
        .then(response=>{console.log(response)})
        .catch(error=>{
            console.log(error)
        })

      }
    },
  };
  </script>
