<template>
    <div>
        <div class="form-group">
            <router-link to="/users" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit User</div>
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
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.userId = id;
            axios.get('/api/user/' + id)
                .then(function (resp) {
                    app.user = resp.data;
                })
                .catch(function () {
                    alert("Could not load your user")
                });
        },
        data: function () {
            return {
                userId: null,
                user: {
                    name: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newUser = app.user;
                axios.patch('/api/user/' + app.userId, newUser)
                    .then(function (resp) {
                        app.$router.replace('/users');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your user");
                    });
            }
        }
    }
</script>