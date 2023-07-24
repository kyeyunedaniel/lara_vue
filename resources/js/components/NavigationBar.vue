<template>
    <v-app id="inspire">
        <v-app-bar> 
            <template v-slot:append>
                <v-btn color="success" icon="mdi-heart"></v-btn>
               

                <v-btn icon="mdi-magnify"></v-btn>

                <v-btn icon="mdi-dots-vertical"></v-btn>
            </template>
        </v-app-bar>
      <v-navigation-drawer v-model="drawer">
        <v-sheet
          color="grey-lighten-4"
          class="pa-4"
        >
          <v-avatar
            class="mb-4"
            color="grey-darken-1"
            size="64"
          ></v-avatar>
  
          <div>john@google.com</div>
        </v-sheet>
  
        <v-divider></v-divider>
  
        <v-list>
          <v-list-item
            v-for="[icon, text] in links"
            :key="icon"
            link
          >
            <template v-slot:prepend>
              <v-icon>{{ icon }}</v-icon>
            </template>
  
            <v-list-item-title>{{ text }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
  
      <v-main>
        <v-container
          class="py-8 px-6"
          fluid
        >
          <v-row>
            <v-col
              v-for="card in cards"
              :key="card"
              cols="12"
            >
              <v-card>
  
                <v-list lines="two">
                  <v-list-subheader>{{ card }}</v-list-subheader>
                  <template v-for="n in 6" :key="n">
                    <v-list-item>
                      <template v-slot:prepend>
                        <v-avatar color="grey-darken-1"></v-avatar>
                      </template>
  
                      <v-list-item-title>Message {{ n }}</v-list-item-title>
  
                      <v-list-item-subtitle>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil repellendus distinctio similique
                      </v-list-item-subtitle>
                    </v-list-item>
  
                    <v-divider
                      v-if="n !== 6"
                      :key="`divider-${n}`"
                      inset
                    ></v-divider>
                  </template>
                </v-list>
              </v-card>
            </v-col>
          </v-row>
        </v-container>
      </v-main>
    </v-app>
  </template>
  
  <script setup>
    import { ref } from 'vue'
  
    const cards = ['Today', 'Yesterday']
    const links = [
      ['mdi-inbox-arrow-down','Home'],
      ['mdi-send', 'Send'],
      ['mdi-delete', 'Trash'],
      ['mdi-alert-octagon', 'Spam'],
    ]
  
    const drawer = ref(null)
  </script>
  
  <script>
    export default {
      data: () => ({
        cards: ['Today', 'Yesterday'],
        drawer: null,
        links: [
          ['mdi-inbox-arrow-down', 'Home'],
          ['mdi-send', 'Send'],
          ['mdi-delete', 'Trash'],
          ['mdi-alert-octagon', 'Spam'],
        ],
      }),
      mounted() {
            console.log('navigation bar  mounted.')
        }
    }
  </script>