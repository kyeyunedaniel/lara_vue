<template>
    <div class="text-center" v-if="isLoading" >
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>

    </div>
    <div class="modal fade" id="MessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" ref="message_new_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body alert alert-success">
                Action has been completed successfully
            </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create New Student</div>

                    <div class="card-body">
                        <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" v-model="name" class="form-control" placeholder="Enter Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" v-model="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" v-model="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email">
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
                                <!-- <th scope="col">id </th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(students, index) in students_data" :key="students.id">
                                <td scope="row">{{index+1}}</td>
                                <td>{{ students.name }}</td>
                                <td>{{students.email}}</td>
                                <td>{{students.phone_number}}</td>
                                <td>
                                    <button type="button" @click="editStudent(students.id)"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Edit
                                    </button><br> <br>
                                    <button type="button" @click="select_delete(students.id)" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                    Delete
                                    </button>
                                </td>
                                <!-- <td>{{students.id}} </td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" v-model="edit_name" class="form-control" placeholder="Enter Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="number" v-model="edit_phone_number" class="form-control" placeholder="Phone Number">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" v-model="edit_email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <!-- <input type="text" v-model="edit_id" name="id"> -->
                        <br>
                        <button type="submit" @click.prevent="save_edited(edit_id)" data-dismiss="modal" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Please Confirm to delete this record!!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" @click="delete_student(id_delete)" data-dismiss="modal" >Delete</button>
            </div>
            </div>
        </div>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MessageModal">
        Launch demo modal
        </button>

            
        
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
                students_data: {}, 
                edit_name:"",
                edit_email:"",
                edit_phone_number:"",
                edit_id:"",
                id_delete:"",
                isLoading:false
            };
        },
            methods:{
                saveStudent(){
                    // alert('student saved ');
                    this.isLoading = true;
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
                        
                        setTimeout(() => {
                        this.isLoading = false;
                        // Perform data handling after loading is complete
                        this.getStudents();
                        $(MessageModal).modal('show');
                        }, 100); // Replace 2000 with the actual time it takes to load the data
                    
                        // this.getStudents();
                        // $(MessageModal).modal('show');
                    });
                },


                getStudents(){
                    axios.get('list_students')
                    .then(response=>{
                        //save the attained data in an object 
                        this.students_data = response.data 
                    })
                    .catch(error =>{
                        console.error(error);
                    })
                },

                editStudent(id_student){
                    // alert(id_student);
                    axios.get("edit_students/"+id_student).then(response=>{
                        console.log(response.data)
                        this.edit_name=response.data.name,
                        this.edit_email=response.data.email,
                        this.edit_phone_number=response.data.phone_number,
                        this.edit_id = response.data.id
                    }) .catch(error =>{
                        console.error(error);
                    })
                },

                save_edited(edit_id){
                    axios.post('save_edited/'+edit_id,{
                        name:this.edit_name,
                        email:this.edit_email,
                        phone_number:this.edit_phone_number   
                    })
                    .then(response=>{
                        // console.log(edit_id)
                        console.log(response);
                        this.getStudents();


                    })
                    .catch(error=>{
                        console.log(error);
                    })
                },

                select_delete(delete_id){   
                    console.log(delete_id)
                    this.id_delete=delete_id
                    console.log(this.id_delete)
                },
                delete_student(delete_id){
                    axios.post('delete_student/'+delete_id)
                    .then(response=>{
                        console.log(delete_id)
                        console.log(response);
                        this.getStudents();

                    })
                    .catch(error=>{
                        console.log(error);
                    })
                }
                

            }
        ,
        mounted() {
            console.log('Component mounted.')
            this.getStudents();
    }
    
    }
    
</script>