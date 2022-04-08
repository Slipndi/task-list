<template>
    <input type="hidden" name="_token" :value="csrf" />
</template>

<script>
export default {
    created() {
        if(! this.csrf){
            console.warn('Le jeton CSRF est manquant, vérifier le header')
        }
    },
    data() {
        return {
            csrf : document.head.querySelector('meta[name="csrf_token"]')
                ? document.head.querySelector('meta[name="csrf-token"]').textContent
                : '',
        }
    },
}
</script>

<style>

</style>