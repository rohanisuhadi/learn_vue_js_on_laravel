<template>
    <div class="container">
        <router-link to="user" class="btn btn-primary">
            Go To Page User
        </router-link>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Page Users</div>

                    <div class="card-body">
                        I'm an Users component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component User.')
        }
    }
</script>
