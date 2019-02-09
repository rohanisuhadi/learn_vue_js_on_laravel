<template>
    <div class="container">
        <router-link to="users" class="btn btn-primary">
            Back To List Users
        </router-link>
        <div class="panel panel-default">
        <div class="panel-heading">Create new User</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Name</label>
                            <input type="text" v-model="user.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="text" v-model="user.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Password</label>
                            <input type="text" v-model="user.password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                user: {
                    name: '',
                    password: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser = app.user;
                axios.post('/api/user', newUser)
                    .then(function (resp) {
                        app.$router.push({path: '/users'});
                    })
                    .catch(function (resp) {
                        if(resp.response.status == 400){
                            alert("Please input data on form !");
                        }
                        console.log(resp.response.data);
                    });
            }
        }
    }
</script>
