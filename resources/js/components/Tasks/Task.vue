<template>
    <li class="flex flex-row content-center items-center w-full my-3">
        <input class="appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-400 checked:border-green-400 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" v-model="checkedTasks" />    
        <input type="text" v-model="title" class="w-full" v-bind:class="checkedTasks ? 'checked' : '' "/>
    </li>
</template>

<script>
export default {
    props: ['taskData'],
    data() {
        return {
            checkedTasks: this.taskData.is_done,
            title: this.taskData.title
        }
    }
}
</script>

<style scoped>
    .checked {
        text-decoration: line-through;
    }
    input[type="text"] {
        background: none;
        border: none;
        height:fit-content;
        font-size:16px;
        font-weight: 200;
        content: attr(data-replicated-value) " ";
        height: auto;
    }

</style>