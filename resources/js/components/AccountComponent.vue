<template>
    Account component new new 
    <br>
    <!-- <v-btn @addingCart="CartCount($event)">Add to cart</v-btn> -->
    <v-btn @click="CartCount">Add to cart</v-btn>

</template>

<script>

    export default {
        mounted() {
            console.log('Account mounted.')
        },
        data(){
            return{
                niData:1
            }
        },

        methods:{
            CartCount(){
                // console.log('we are trying to emit now')
                this.$emit('CustomCartEvent',this.niData);

            }
        }

    }

</script>
