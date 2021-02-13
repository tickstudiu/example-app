<template>
    <b-container>
        <b-form @submit="onSubmit">
            <b-form-group label="username:">
                <b-form-input
                    v-model="form.username"
                    placeholder="Enter username"
                    required
                ></b-form-input>
            </b-form-group>

            <b-form-group label="password:">
                <b-form-input
                    v-model="form.password"
                    type="password"
                    required
                ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Reset</b-button>
        </b-form>
    </b-container>
</template>

<script>
const axios = require('axios');

export default {
    name: "login",
    data(){
        return {
            form: {
                username: '',
                password: ''
            }
        }
    },
    methods: {
        onSubmit(event) {
            event.preventDefault()

            axios.post(`http://localhost:8000/api/user/auth`, this.form,{
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then((response) => {
                window.location.href = 'http://localhost:8000/inquiry/read'
            }).catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>

</style>
