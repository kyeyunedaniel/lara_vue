<template>
  this is the payment component
  <!-- <v-btn variant="flat" color="teal-darken-1" @click.prevent="makePayment">
    Make Payment
  </v-btn> -->

  <v-form action="" method="post">
    <v-btn variant="flat" color="teal-darken-1">MAKE THE PAYMENT</v-btn>
  </v-form>
</template>

<script>
export default {
  data() {
    return {
      payment: "",
    };
  },
  methods: {
    makePayment() {
      console.log("making a payment");
    },
  },
  mounted() {
    // console.log('Component mounted.')
  },
};
</script>
