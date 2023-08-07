

<template>
  <v-container>
    <v-row align="center" justify="center">
      <v-col cols="auto">
        <v-btn size="x-small">Extra small Button</v-btn>
      </v-col>

      <v-col cols="auto">
        <v-btn size="small">Small Button</v-btn>
      </v-col>

      <v-col cols="auto">
        <v-btn>Regular Button</v-btn>
      </v-col>

      <v-col cols="auto">
        <v-btn size="large">Large Button</v-btn>
      </v-col>

      <v-col cols="auto">
        <v-btn size="x-large">X-Large Button</v-btn>
      </v-col>
    </v-row>
  </v-container>

  <div class="row justify-content-center">
    We are in the vue Bet Component

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(product, index) in all_products" :key="product.id">
          <td scope="row">{{ index + 1 }}</td>
          <td>{{ product.name }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("BetComponent mounted.");
    // this.getBetApi();
  },
  data() {
    return {
      all_products: {},
      summary: {},
    };
  },
  methods: {
    async getBetApi() {
      const options = {
        method: "GET",
        url: "https://demo-project42818.p.rapidapi.com/catalog/products",
        params: {
          skip: "1",
          limit: "40",
        },
        headers: {
          // 34e0f5712msh4298147ecdd4eebp147894jsnd3bd548e9af7
          // 34e0f5712msh4298147ecdd4eebp
          "X-RapidAPI-Key": "",
          "X-RapidAPI-Host": "demo-project42818.p.rapidapi.com",
        },
        params: {
          skip: "1",
          limit: "40",
        },
      };

      try {
        const response = await axios.request(options);
        console.log(response.data);
        this.all_products = response.data.products;
        this.summary = response.data.summary;
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>