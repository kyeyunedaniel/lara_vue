<template>
  <div
    class="modal fade"
    id="ErrorModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    ref="message_new_modal"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Error Occured</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click.prevent="closeAllModels"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body alert alert-danger">Please Insert A url</div>
      </div>
    </div>
  </div>
  URL Shortener Component
  <v-col cols="12" sm="8" class="mx-auto text-overline text-capitalize mb-1">
    <v-text-field
      rounded="lg"
      variant="outlined"
      color="info"
      label="Paste a Link to Shorten it."
      v-model="longurl"
    >
      <template v-slot:prepend-inner>
        <v-icon color="info">mdi-link-variant</v-icon>
      </template>
      <template v-slot:append-inner>
        <v-btn
          class="pl-18"
          size="small"
          color="info"
          variant="tonal"
          rounded="sm"
          @click.prevent="shortenUrl"
          >Shorten Url</v-btn
        >
      </template>
    </v-text-field>
  </v-col>

  <v-card class="mx-auto" max-width="950" variant="outlined">
    <v-card-item v-if="shorturl !== ''">
      <div>
        <div class="text-overline mb-1">SHORTENED LINK</div>
        <div class="mb-1">Please use the button to copy the shortened link</div>

        <v-text-field variant="solo" color="blue">
          <template v-slot:prepend-inner>
            <v-btn
              variant="tonal"
              size="small"
              class="text-green"
              color="blue"
              @click.prevent="clipCopy"
            >
              copy link
            </v-btn>
          </template>
          {{ shorturl }}
        </v-text-field>
        <div class="mt-8 text-red">
          The old link
          <v-text-field variant="plain">
            {{ old_url }}
          </v-text-field>
        </div>
      </div>
    </v-card-item>

    <v-card-actions> </v-card-actions>
  </v-card>
</template>

<script>
export default {
  mounted() {
    console.log("Shortener Component mounted.");
    console.log(this.longurl + "  is the long url");
  },
  data() {
    return {
      longurl: "",
      shorturl: "",
      old_url: "",
    };
  },
  methods: {
    shortenUrl() {
      const urlPattern = /^(ftp|http|https|www):\/\/[^ "]+$/;
      if (this.longurl === "") {
        // if(!urlPattern.test(this.longurl)){

        // alert('insert a url before submitting')
        $(ErrorModal).modal("show");
      } else {
        // console.log(this.longurl);
        axios
          .post("shorten_url", {
            long_url: this.longurl,
          })
          .then((response) => {
            console.log(response.data);
            this.shorturl = response.data;
            this.old_url = this.longurl;
            this.longurl = "";
            console.log(this.old_url);
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    closeAllModels() {
      // console.log('clicked the modal removal button')
      $(ErrorModal).modal("hide");
    },
    clipCopy() {
      console.log("attempting to copy data");
    },
  },
};
</script>
