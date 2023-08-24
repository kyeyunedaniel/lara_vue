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
  URL Shortener Component{{ adminname }}
  <v-col cols="12" sm="6" class="mx-auto text-overline text-capitalize mb-1">
    <v-form>
      <v-text-field
        rounded="lg"
        variant="outlined"
        color="info"
        label="Paste a Link to Shorten it."
        cols="12"
        sm="6"
        v-model="longurl"
      >
        <template v-slot:prepend-inner>
          <v-icon color="info">mdi-link-variant</v-icon>
        </template>
        <template v-slot:append-inner>
          <v-btn
            class="pl-18"
            type="submit"
            size="small"
            color="info"
            variant="tonal"
            rounded="sm"
            @click.prevent="shortenUrl"
            >Shorten Url</v-btn
          >
        </template>
      </v-text-field>
    </v-form>
  </v-col>

  <v-card
    class="mx-auto"
    max-width="950"
    variant="outlined"
    v-if="shorturl !== ''"
  >
    <v-card-item>
      <div>
        <div class="text-overline">SHORTENED LINK</div>
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
        <div class="text-red">
          <v-text-field variant="plain">
            {{ old_url }}
          </v-text-field>
        </div>
      </div>
    </v-card-item>

    <v-card-actions> </v-card-actions>
  </v-card>

  <v-card>
    <v-col cols="12" sm="12" class="mr-auto text-overline text-capitalize mb-1">
      <v-form>
        <v-text-field
          rounded="lg"
          variant="outlined"
          color="info"
          label="Paste a Link to View its Click Metrics."
          cols="12"
          sm="6"
          v-model="metricsurl"
        >
          <template v-slot:prepend-inner>
            <v-icon color="green">mdi-link-variant</v-icon>
          </template>
          <template v-slot:append-inner>
            <v-btn
              class="pl-18"
              type="submit"
              size="small"
              color="green"
              variant="tonal"
              rounded="sm"
              @click.prevent="viewMetrics"
              >View Metrics</v-btn
            >
          </template>
        </v-text-field>
        <div v-if="showmetrics!==''">The Number of clicks are {{ clicksnumber }}</div>
      </v-form>
    </v-col>
  </v-card>
</template>

<script>
import { mapState } from 'vuex';
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
      check_url: "",
      button_click: "",
      metricsurl: "",
      clicksnumber: "",
      showmetrics:""
    };
  },
  methods: {
    shortenUrl() {
      // const urlPattern = /^(?:(ftp|http|https):\/\/)?(www\.)?([a-zA-Z0-9-]+\.){1,}[a-zA-Z]{2,}$/;
      const urlPattern =
        /^(?:(ftp|http|https):\/\/)?(www\.)?([a-zA-Z0-9-]+\.){1,}[a-zA-Z]{2,}(\/[^\s]*)?$/;
      this.check_url = urlPattern.test(this.longurl);
      console.log(this.check_url);
      // if(this.check_url = )
      if (this.longurl === "" || this.check_url == false) {
        // if(!urlPattern.test(this.longurl)){

        // alert('insert a url before submitting')
        $(ErrorModal).modal("show");
      } else {
        console.log(
          this.longurl +
            "we are testing the url before the if that adds the https"
        );
        if (!/^https?:\/\//i.test(this.longurl)) {
          this.longurl = "https://" + this.longurl;
        }
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
      try {
        navigator.clipboard.writeText(this.shorturl);
        console.log("Text copied to clipboard");
      } catch (error) {
        console.error("Failed to copy text:", error);
      }
    },
    viewMetrics() {
      this.showmetrics='true'
      axios
        .post("/metric", {
          metricsurl: this.metricsurl,
        })
        .then((response) => {
          console.log(response.data);
          this.clicksnumber = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  computed:{
    ...mapState(['adminname']),
  }
};
</script>
