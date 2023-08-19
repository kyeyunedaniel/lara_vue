<template>
  this is the payment component
  <!-- <v-btn variant="flat" color="teal-darken-1" @click.prevent="makePayment">
    Make Payment
  </v-btn> -->

  <!-- <v-form action="https://checkout.flutterwave.com/v3/hosted/pay" method="post">
    <v-row cols="12" sm="3">
    <v-text-field name="public_key" value=" hidden readonly >sdasdasd</v-text-field>
    <v-text-field name="customer[email]" value="jessepinkman@walterwhite.org" readonly>dasdasdas</v-text-field>
    <v-text-field  readonly>dasdasda</v-text-field>
    </v-row>
    <v-btn variant="flat" color="teal-darken-1">MAKE THE PAYMENT</v-btn>
  </v-form> -->

  <!-- <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
  <div> -->
    <!-- Your order is ₦3,400 -->
  <!-- </div>
  <input type="hidden" name="public_key" value="" />
  <input type="hidden" name="customer[email]" value="jessepinkman@walterwhite.org" />
  <input type="hidden" name="customer[name]" value="Jesse Pinkman" />
  <input type="hidden" name="tx_ref" value="bitethtx-019203" />
  <input type="hidden" name="amount" value="3400" />
  <input type="hidden" name="currency" value="NGN" />
  <input type="hidden" name="meta[token]" value="54" />
  <input type="hidden" name="redirect_url" value="https://google.com" />
  <v-btn type="submit" id="start-payment-button">Pay Now</button>
</form> -->
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
