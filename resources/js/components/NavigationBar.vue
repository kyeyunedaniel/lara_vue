<template>
    <v-app v-if="loggedInData.current_user_name_new ">
      <!-- App bar -->
      <v-app-bar app elevation="1" transparent theme="light">
        <v-app-bar-nav-icon @click="toggleDrawer"></v-app-bar-nav-icon>
        <v-toolbar-title>Lara Vue</v-toolbar-title>
        
        <!-- <p class="font-weight-regular ma-4 text-capitalise">{{current_user}}</p> -->
        <v-menu transition="scale-transition" class="text-center">
            <template v-slot:activator="{ props }">
              <v-btn v-bind="props" variant="tonal" color="green">
                <p class="font-weight-regular ma-2 text-capitalise">{{loggedInData.current_user_name_new }}</p>
                <v-icon>mdi-account-arrow-down</v-icon>
              </v-btn>
            </template>

            <v-list class="text-left ma-2">
              <router-link :to="{name:'account'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
              <v-list-item-title class="text-caption ma-2">DashBoard</v-list-item-title>
            </router-link>
            <!-- hello -->
            {{ loggedInData.current_user_name_new }}
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
      <!-- <v-navigation-drawer theme="dark" v-model="drawerOpen"> -->

      <v-navigation-drawer theme="light" v-model="drawerOpen">
        <!-- Drawer content here -->
        <!-- color="white" -->
        <v-list>
          <!-- @if="user_roles.includes('name')" -->
          <router-link :to="{name:'home'}" exact-active-class="v-item-active" style="text-decoration: none; color: inherit;" >
            <v-list-item prepend-icon="mdi-view-dashboard" title="Dashboard" value="Dahboard"></v-list-item>
          </router-link>
          
          <v-list-item prepend-icon="mdi-account-box" title="Account" value=""></v-list-item>

          <router-link :to="{name:'url-shortener'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-link-variant" title="url shortener" value="url-shortener"></v-list-item>
          </router-link>

          <router-link to="/posts" :exact="true" active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-email" title="Inbox" value="inbox"></v-list-item>
          </router-link>

          <router-link :to="{name:'account'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-gavel" title="Dashboard" value="dashboard"></v-list-item>
          </router-link>

          <router-link :to="{name:'police'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-gavel" title="Police App" value="police"></v-list-item>
          </router-link>

          <router-link :to="{name:'weather'}" :exact="true"  exact-active-class="v-item-active" style="text-decoration: none; color: inherit;">
            <v-list-item prepend-icon="mdi-cloud" title="Weather App" value="weather-app"></v-list-item>
          </router-link>
      
        </v-list>
        <!-- <v-btn v-on:custom-cart-event="addCartItem($event)">
          //dont delete it we still need it 
          Add
        </v-btn> -->
        <li>
          <v-btn size="small" color="blue" variant="tonal" v-on:Click="user_role(current_id)">Hello button </v-btn>
        </li >
        <br/>
        <!-- this.user_roles_db.includes('admin') -->

        <li v-if="getActualUser">
          <!-- <li> -->
          <v-btn size="small" color="blue" variant="tonal">Hello button </v-btn>
        </li >

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
  // import axios from 'axios';
  // import { mapState } from 'vuex';
  import { mapState, mapActions } from 'vuex';

  // import AccountComponent from './AccountComponent.vue';

  export default {
    components: {
      // AccountComponent
    },
    data() {
      return {
        current_id:null,
        current_user:null,
        admin_user:"",
        user_roles_db:{},
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
          // console.log(response.data)
          this.current_user = response.data.User;
          this.current_id = response.data.User_id;
          console.log("the current_id is " +this.current_id)
          console.log('this executes')
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
      },

      user_role(current_id){
        axios.get('user_roles/'+this.current_id).then(response=>{
          console.log(response.data.roles_name)

          this.user_roles_db = response.data.roles_name;
          // console.log(this.user_roles_db[1])

        })
        .catch(error=>{
          console.log(error)
        })
      },

      getActualUser(){
        if(this.user_roles_db.includes('sdfa'))
          {
            return true
          }
      },
      ...mapActions(['fetchCurrentUser']),
      fetchUserData(){
        this.fetchCurrentUser();
        console.log('fetch data executed');
      }

    },
    computed:{
      // super_user(){
      //   return this.$store.state.adminname

      // }
      ...mapState(['loggedInData']),

    },

    mounted(){
      console.log('navbar mounted'),
      // this.userRole(),
      this.currentUser(),
      this.fetchUserData()
      // this.user_role(this.current_id)
      // console.log('the current id during mounting is '+current_id)

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