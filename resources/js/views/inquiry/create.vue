<template>
    <div class="md:container md:mx-auto" @submit="onSubmit">
        <form class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <label class="block">
                    <span class="text-gray-700">Name</span>
                    <input type="text" class="form-input mt-1 block w-full border" placeholder="Jane Doe" v-model="form.name">
                    <span class="text-danger" id="name-error"></span>
                </label>

                <label class="block">
                    <span class="text-gray-700">Email</span>
                    <input type="email" class="form-input mt-1 block w-full border" placeholder="john@example.com" v-model="form.email">
                    <span class="text-danger" id="email-error"></span>
                </label>

                <label class="block">
                    <span class="text-gray-700">Mobile Number</span>
                    <input type="number" class="form-input mt-1 block w-full border" placeholder="+668XXXXXX" v-model="form.mobile_number">
                    <span class="text-danger" id="mobile-number-error"></span>
                </label>

                <label class="block">
                    <span class="text-gray-700">Message</span>
                    <textarea class="form-textarea mt-1 block w-full border" rows="3" placeholder="Enter some long form content." v-model="form.message"></textarea>
                    <span class="text-danger" id="message-error"></span>
                </label>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
            </div>
        </form>
    </div>
</template>

<script>
const axios = require('axios');

export default {
    data() {
        return {
            form: {
                name: '',
                email: '',
                mobile_number: null,
                message: '',
            }
        }
    },
    computed: {},
    methods: {
        onSubmit(event) {
            event.preventDefault();

            axios.post('http://localhost:8000/inquiry/create', this.form, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then((response) => {
                console.log(response);
                this.$bvToast.toast(`created inquiry`, {
                    title: 'Created',
                    autoHideDelay: 750,
                    variant: 'success',
                    appendToast: false
                })
            }).catch((error) => {
                console.log(error);
            })
        }
    }
}
</script>
