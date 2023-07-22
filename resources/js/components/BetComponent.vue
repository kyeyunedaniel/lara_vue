

<template>
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
            <tr v-for="(product,index) in all_products" :key="product.id">
            <td scope="row">{{ index+1 }}</td>
            <td>{{ product.name }}</td>
            </tr>
        </tbody>
    </table>
    
    </div>
</template>

<script>
export default {

        mounted() {
            console.log('BetComponent mounted.')
            this.getBetApi();
        }, 
        data(){
            return{
                all_products:{},
                summary:{},
                headers: {
                    'X-RapidAPI-Key': 'c34e0f5712msh4298147ecdd4eebp147894jsnd3bd548e9af7',
                    'X-RapidAPI-Host': 'demo-project42818.p.rapidapi.com'
                },
            }
        },
        methods:{
            async getBetApi(){

                const options = {
                method: 'GET',
                url: 'https://demo-project42818.p.rapidapi.com/catalog/products',
                params: {
                    skip: '1',
                    limit: '40'
                },
                headers: {
                    'X-RapidAPI-Key': 'c34e0f5712msh4298147ecdd4eebp147894jsnd3bd548e9af7',
                    'X-RapidAPI-Host': 'demo-project42818.p.rapidapi.com'
                },
                params:{
                    skip: '1',
                    limit: '40'
                }
                };

                try {
                    const response = await axios.request(options);
                    console.log(response.data);
                    this.all_products=response.data.products;
                    this.summary = response.data.summary;
                } catch (error) {
                    console.error(error);
                }
        }, 
    }
}
</script>