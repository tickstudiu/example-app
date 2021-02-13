<template>
    <b-container>
        <section class="flex items-center flex-col">
            <b-table :per-page="perPage" :responsive="true"
                     :current-page="currentPage"
                     :items="items" :fields="fields">
                <template #cell(id)="data">
                    <b-button size="sm" variant="success" @click="inquiryUpdateRoute(data.value)">update</b-button>
                    <b-button size="sm" variant="danger" @click="inquiryDelete(data.value, data.index)">delete</b-button>
                </template>
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
            ></b-pagination>
        </section>
    </b-container>
</template>

<script>
const axios = require('axios');

export default {
    name: "read",
    props: ['inquiry'],
    data(){
        return {
            perPage: 3,
            currentPage: 1,
            items: [...this.inquiry],
            fields: [{ key: 'id', label: 'Action' },'name', 'email', 'mobile_number', 'message']
        }
    },
    methods: {
        inquiryUpdateRoute(id){
            window.location.href = `http://localhost:8000/inquiry/update?id=${id}`
        },

        inquiryDelete(id, index){
            axios.delete(`http://localhost:8000/api/inquiry?id=${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then((response) => {
                this.items.splice(index, 1)
                this.$bvToast.toast(`delete inquiry id ${id}`, {
                    title: 'Deleted',
                    autoHideDelay: 750,
                    variant: 'success',
                    appendToast: false
                })
                console.log(response)
            }).catch((error) => {
                console.log(error)
            })
        }
    },
    computed: {
        rows() {
            return this.items.length
        }
    }
}
</script>

<style scoped>

</style>
