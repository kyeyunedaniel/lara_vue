<template>
    <v-app>
      <!-- App bar -->
      <v-app-bar app>
        <v-app-bar-nav-icon @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Lara Vue</v-toolbar-title>
      </v-app-bar>
  
      <!-- Navigation drawer -->
      <v-navigation-drawer class="bg-deep-purple"
        theme="dark" app v-model="drawerOpen">
        <!-- Drawer content here -->
        <v-list color="transparent">
        <router-link to="/home">
            <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" ></v-list-item>
        </router-link>

        <router-link to="/posts">
            <v-list-item prepend-icon="mdi-account-box" title="Account"></v-list-item>
        </router-link>

          <v-list-item prepend-icon="mdi-gavel" title="Statistics"></v-list-item>
        </v-list>

        <template v-slot:append>
          <div class="pa-2">
            <v-btn block>
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
      }
    },
  };
  </script>
  