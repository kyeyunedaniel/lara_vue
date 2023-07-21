<template>
    <div class="card-body">
        <form>
        <div class="form-group">
            <label >Name</label>
            <input type="text" v-model="user_name" class="form-control" placeholder="Enter Name">
        </div>
        <br>
        <div class="form-group">
            <label>Email</label>
            <input type="email" v-model="user_email" class="form-control" placeholder="Phone Number">
        </div>
        <br>
        <div class="form-group">
            <label>Password</label>
            <input type="password" v-model="password" class="form-control"  aria-describedby="emailHelp" placeholder="Password">
            <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" v-model="confirm_password" class="form-control" aria-describedby="emailHelp" placeholder="Confirm Password">
            <small id="emailHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
        </div>
        <br>
        <button type="submit" v-on:click.prevent="saveUser" class="btn btn-primary">Submit</button>
        </form>
    </div>

</template>

<script>
export default{
data(){
    return{
        // name:"",
        // email:"",
        // password:"",
        user_name:"",
        user_email:"",
        password:"",
        confirm_password:""
    }
},
methods:{

    saveUser(){
        if(this.password==this.confirm_password){
            console.log('the passwords match')
            axios.post('save_user',{
                name:this.user_name,
                email:this.user_email,
                password:this.password
            })
            .then(response=>{
                console.log(response)
            })
            .catch(error=>{
                console.log(error)
            })
        }
        else{
            console.log('unable to load')
        }
    }
},

mounted(){
    console.log('hello ')
}
}
</script>