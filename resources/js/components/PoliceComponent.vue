<template>
  Please provide the information below to complete your application
  <br />

  <!-- Error Message Model -->
  <div
    class="modal fade"
    id="MessageModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    ref="message_new_modal"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body alert alert-success">
          Form has been Submitted successfully
        </div>
      </div>
    </div>
  </div>

  <v-form>
    <v-container>
      <v-row>
        <v-col cols="12" sm="6">
          <v-text-field
            label="First Name"
            hint="Your Religious Name"
            variant="solo"
            v-model="first_name"
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="last Name"
            hint="Your Family Name"
            variant="solo"
            v-model="last_name"
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="4">
          <v-select
            label="Gender"
            :items="['Male', 'Female']"
            variant="outlined"
            v-model="gender"
            required
          ></v-select>
        </v-col>

        <v-col cols="12" sm="8">
          <v-select
            label="CitizenShip"
            :items="['Ugandan', 'kanyan', 'Tanzanian']"
            variant="solo-inverted"
            v-model="citizenship"
            required
          ></v-select>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="Occupation"
            hint="Your current Occupation / Job "
            variant="outlined"
            v-model="occupation"
            required
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="6">
          <v-text-field
            label="Your NIN Number"
            hint="Provide your national nin  number for ugandans"
            variant="outlined"
            v-model="nin"
          ></v-text-field>
        </v-col>

        <v-col cols="12" sm="4">
          <v-select
            label="Marital Status"
            :items="['Married', 'Single', 'Deceased Partner']"
            variant="outlined"
            v-model="marital_status"
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
          <v-btn variant="elevated" color="blue" @click.prevent="addPolice"
            >Submit</v-btn
          >
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
      error_message:"",
      sucess_message:""
    };
  },

  methods: {
    addPolice() {
      console.log("we are in the police");
      axios
        .post("police_user_new", {
          first_name: this.first_name,
          last_name: this.last_name,
          gender: this.gender,
          citizenship: this.citizenship,
          occupation: this.occupation,
          nin: this.nin,
          marital_status: this.marital_status,
          residence: this.residence,
        })
        .then((response) => {
          console.log(response.data.action_message);

          $(MessageModal).modal("show");


        })
        .catch((error) => {
          console.log(error.message);
        //   console.log(error.error_message)

        });
    },
  },
  mounted() {
    console.log("hello ");
  },
};
</script>
  