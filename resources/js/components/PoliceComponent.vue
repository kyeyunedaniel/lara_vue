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
            label="First Name"
            hint="Your Religious Name"
            variant="solo"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="last Name"
            hint="Your Family Name"
            variant="solo"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
        <v-select
          label="Gender"
          :items="[
            'Male',
            'Female'
          ]"
          variant="solo"
        ></v-select>
        </v-col>
        
        <v-col cols="12" sm="6">
        <v-select
          label="CitizenShip"
          :items="[
            'Ugandan',
            'kanyan',
            'Tanzanian'
          ]"
        ></v-select>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="Occupation"
            hint="Your current Occupation / Job "
            variant="solo"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="Your NIN Number"
            hint="Provide your national nin  number for ugandans"
            variant="solo"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <!-- <v-text-field
            label="Marital Status"
            model-value="Grocery delivery"
            hint="For example, flowers or used cars"
            variant="outlined"
          ></v-text-field> -->
          <v-select
          label="Marital Status"
          :items="[
            'Married',
            'Single',
            'Deceased Partner'
          ]"
          variant="solo"
          required
        ></v-select>
        </v-col>
    <br/>
        <v-col cols="12">
          <v-text-field
            label="Residence"
            hint="Current Place of Stay"
            persistent-hint
            variant="outlined"
            required
          ></v-text-field>
          <v-btn variant="elevated" color="blue">Submit</v-btn>
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
  