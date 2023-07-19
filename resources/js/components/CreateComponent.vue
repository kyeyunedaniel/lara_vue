<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Student</div>

                    <div class="card-body">
                        <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" v-model="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone Number</label>
                            <input type="number" v-model="phone_number" class="form-control" id="exampleInputPassword1" placeholder="Phone Number">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" v-model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <br>
                        <button type="submit" v-on:click.prevent="saveStudent" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
import axios from 'axios';

    export default {
        data(){
            return{
                name:"",
                email:"",
                phone_number:""
            }},
            methods:{
                saveStudent(){
                    // alert('student saved ');
                    axios.post('save_student',{
                        name:this.name,
                        email:this.email,
                        phone_number:this.phone_number
                    })
                    .then(response => console.log(response))
                }

            }
        ,
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
