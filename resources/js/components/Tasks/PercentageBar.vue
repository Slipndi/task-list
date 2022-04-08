<template>
    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div class="bg-green-400 h-2.5 rounded-full" v-bind:style="{width: percentage + '%'}"></div>
    </div>
</template>

<script>
export default {
    props: ['tasks'],
    data() {
        return {
            percentage : (this.tasks.filter(task => task.is_done == true).length / this.tasks.length) * 100.00 , 
        }
    }
}
</script>
