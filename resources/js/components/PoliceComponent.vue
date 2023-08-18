<template>
  Please provide the information below to complete your application
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
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="last Name"
            hint="Your Family Name"
            variant="solo"
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="4">
          <v-select
            label="Gender"
            :items="['Male', 'Female']"
            variant="outlined"
            required
          ></v-select>
        </v-col>

        <v-col cols="12" sm="8">
          <v-select
            label="CitizenShip"
            :items="['Ugandan', 'kanyan', 'Tanzanian']"
            variant="solo-inverted"
            required
          ></v-select>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="Occupation"
            hint="Your current Occupation / Job "
            variant="outlined"
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="Your NIN Number"
            hint="Provide your national nin  number for ugandans"
            variant="outlined"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="4">
          <v-select
            label="Marital Status"
            :items="['Married', 'Single', 'Deceased Partner']"
            variant="outlined"
            required
          ></v-select>
        </v-col>

        <v-col cols="12" sm="8">
          <v-text-field
            label="Residence"
            hint="Current Place of Stay"
            persistent-hint
            variant="outlined"
            v-model="residence"
            required
          ></v-text-field>
        </v-col>
        <br />
        <v-col cols="12">
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
      //   niData: 1,
      first_name: "",
      last_name: "",
      gender: "",
      citizenship: "",
      occupation: "",
      nin: "",
      marital_status: "",
      residence: "",
      payment_status: "",
      transaction_id: "",
    };
  },

  methods: {},
  mounted() {
    console.log("hello ");
  },
};
</script>
  