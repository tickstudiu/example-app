<template>
    <b-container>
        <section class="flex items-center flex-col">
            <b-table :per-page="perPage"
                     :current-page="currentPage"
                     :items="inquiry"></b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="rows"
                :per-page="perPage"
            ></b-pagination>
        </section>
    </b-container>
</template>

<script>
export default {
    name: "read",
    props: ['inquiry'],
    data(){
        return {
            perPage: 3,
            currentPage: 1,
        }
    },
    computed: {
        rows() {
            return this.inquiry.length
        }
    }
}
</script>

<style scoped>

</style>
