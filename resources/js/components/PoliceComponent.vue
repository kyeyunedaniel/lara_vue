<template>
    Account component new new
    <br />
    <!-- <v-btn @addingCart="CartCount($event)">Add to cart</v-btn> -->
    <!-- <v-btn @click="CartCount">Add to cart</v-btn> -->
    <v-form>
      <v-container>
        <v-row>
          <v-col cols="12" sm="6">
            <v-text-field
              label="Your product or service"
              model-value="Grocery delivery"
              hint="For example, flowers or used cars"
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" sm="6">
            <v-text-field
              label="Your landing page"
              hint="www.example.com/page"
              persistent-hint
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" sm="6">
            <v-text-field
              label="Your product or service"
              model-value="Grocery delivery"
              hint="For example, flowers or used cars"
              variant="solo"
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" sm="6">
            <v-text-field
              label="Your landing page"
              hint="www.example.com/page"
              persistent-hint
              variant="solo"
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" sm="6">
            <v-text-field
              label="Your product or service"
              model-value="Grocery delivery"
              hint="For example, flowers or used cars"
              variant="outlined"
            ></v-text-field>
          </v-col>
  
          <v-col cols="12" sm="6">
            <v-text-field
              label="Your landing page"
              hint="www.example.com/page"
              persistent-hint
              variant="outlined"
            ></v-text-field>
            <v-btn variant="tonal" size="small" color="blue">Submit</v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </template>
  
  <script>
  export default {
    mounted() {
      console.log("Account mounted.");
    },
    data() {
      return {
        niData: 1,
      };
    },
  
    methods: {
      CartCount() {
        // console.log('we are trying to emit now')
        this.$emit("CustomCartEvent", this.niData);
      },
    },
  };
  </script>
  