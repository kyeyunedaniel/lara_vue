<template>
    <v-app>
      <!-- App bar -->
      <v-app-bar app elevation="1" transparent theme="light">
        <v-app-bar-nav-icon @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Lara Vue</v-toolbar-title>
        
        <!-- <p class="font-weight-regular ma-4 text-capitalise">{{current_user}}</p> -->
        <v-menu transition="scale-transition" class="text-center">
            <template v-slot:activator="{ props }">
              <v-btn v-bind="props" variant="tonal" color="green">
                <p class="font-weight-regular ma-2 text-capitalise">{{current_user}}</p>
                <v-icon>mdi-account-arrow-down</v-icon>
              </v-btn>
            </template>

            <v-list class="text-left ma-2">
              <router-link :to="{name:'account'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
              <v-list-item-title class="text-caption ma-2">DashBoard</v-list-item-title>
            </router-link>
              <v-list-item-title class="text-caption ma-2">Payment Info</v-list-item-title>
              <v-list-item-title class="text-center">
              <v-btn size="small" variant="tonal" :style="{ width: '180px'}" class="ma-1" label="Prepend" append-icon="mdi-logout" style="text-decoration: none; color: none;" @click="logOut">LogOut</v-btn>
              </v-list-item-title>

            </v-list>
        </v-menu>

        <v-badge color="transparent" overlap class="ma-4 pa-2">
          <v-icon>mdi-cart</v-icon>
          <span class="custom-badge">{{ CartItems }}</span>
        </v-badge>

      </v-app-bar>
  
      <!-- Navigation drawer -->
      <!-- -deep-purple -->
      <v-navigation-drawer theme="dark" v-model="drawerOpen">
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
        <!-- <v-btn v-on:custom-cart-event="addCartItem($event)">
          //dont delete it we still need it 
          Add
        </v-btn> -->


        <template v-slot:append>
          <div class="pa-2">
            <v-btn block @click="logOut" variant="tonal" color="red" append-icon="mdi-logout">
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
              <router-view />
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
  // import AccountComponent from './AccountComponent.vue';

  export default {
    components: {
      // AccountComponent
    },
    data() {
      return {
        current_user:null,
        drawerOpen: true, // For controlling the navigation drawer's open/close state
        CartItems:0
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
          location.reload();
          
        })
        .catch(error=>{
            console.log(error)
        })

      },
      addCartItem(ndata){
        // this.CartItems = this.CartItems+1
        // console.log(ndata);
        console.log('emitted value is received'+ ndata);
        // this.$emit('addingCart',11);
        // console.log('you added item to the cart '+this.cart_items)
      }
    },
    mounted(){
      console.log('navbar mounted')
      this.currentUser()
    }

  };
  </script>

<style>
.custom-badge {
  background-color: pink;
  font-size: 11px;
  padding: 4px;
  border-radius: 50%;
}
</style>