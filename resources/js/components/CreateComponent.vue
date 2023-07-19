<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">View Students</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">PhoneNumber </th>
                                <th scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(students, index) in students_data" :key="students.id">
                                <td scope="row">{{index+1}}</td>
                                <td>{{ students.name }}</td>
                                <td>{{students.email}}</td>
                                <td>{{students.phone_number}}</td>
                                <td>------</td>
                                </tr>
                            </tbody>
                        </table>
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
                phone_number:"", 
                students_data: {}
            };
        },
            methods:{
                saveStudent(){
                    // alert('student saved ');
                    axios.post('save_student',{
                        name:this.name,
                        email:this.email,
                        phone_number:this.phone_number
                    })
                    .then(response => {
                        console.log(response)
                        this.name="";
                        this.email="";
                        this.phone_number="";
                        this.getStudents();
                    });
                },
                getStudents(){
                    axios.get('list_students')
                    .then(response=>{
                        this.students_data = response.data 
                    })
                    .catch(error =>{
                        console.error(error);
                    })
                },
                editStudent(){
                    axios.post('edit_students/id').then(response=>{
                        console.log(response)
                    })
                }
              

            }
        ,
        mounted() {
            console.log('Component mounted.')
            this.getStudents();
            // getStudents(){
            // axios.get('list_students')
            // .then(response=>{
            //     this.students_data = response.data   //save the attained data in an array named students_data
            //     // console.log(response.data);
            //     // console.log(this.students_data);
            // })
            // .catch(error =>{
            //     console.error(error);
            // })
        // };
    }
    }
</script>
