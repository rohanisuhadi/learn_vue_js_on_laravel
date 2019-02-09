<template>
    <div class="container">
        <router-link to="user" class="btn btn-primary">
            Add User
        </router-link>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <table class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr v-for="user, index in users">
                                <td>{{ user.name }}</td>
                                <td>{{ user.email }}</td>
                                <td>
                                    <router-link :to="{name: 'userEdit', params: {id: user.id}}" class="btn btn-xs btn-default">
                                        Edit
                                    </router-link>
                                    <a href="#" class="btn btn-xs btn-danger" v-on:click="deleteEntry(user.id, index)">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: []
            }
        },
        mounted() {
            var app = this;
            axios.get('http://127.0.0.1:8000/api/user')
                .then(function (resp) {
                    app.users = resp.data.data;
                    console.log(app.users)
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('http://127.0.0.1:8000/api/user/' + id)
                        .then(function (resp) {
                            app.$router.replace('/users');
                            app.users.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete user");
                        });
                }
            }
        }
    }
</script>
