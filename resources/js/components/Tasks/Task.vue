<template>
    <li class="flex flex-row content-center items-center w-full my-3">
        <input 
            class="appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-green-400 checked:border-green-400 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" 
            type="checkbox" 
            v-model="isDone"
            true-value = "1"
            false-value = "0"
            v-on:change="updateTask()"

        />    
        <textarea 
            type="text" 
            v-model="title" 
            class="w-full" 
            @keyup.enter="updateTask()"
            v-bind:class="isDone == 1 ? 'checked' : '' "
        ></textarea>
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-10 w-10 icon ml-2" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor" 
            stroke-width="2"
            @click="deleteTask()"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </li>
</template>

<script>
export default {
    props: ['taskData'],
    data() {
        return {
            isDone : this.taskData.is_done,
            title: this.taskData.title,
            id: this.taskData.id
        }
    },
    methods :{
        async updateTask(){
            await axios.put(`tasks/${this.id}`, { 
                'title': this.title,
                'is_done':this.isDone
            })
            this.$parent.getTasks();
        },

        async deleteTask(){
            await axios.delete(`tasks/${this.id}`);
            this.$parent.getTasks();
        },
    }
}
</script>

<style scoped>
    .checked {
        text-decoration: line-through;
    }

    input[type="text"], textarea {
        background: none;
        border: none;
        height:fit-content;
        font-size:16px;
        font-weight: 200;
        content: attr(data-replicated-value) " ";
        height: auto;
    }

    .icon {
        cursor: pointer;
    }
    .icon:hover{
        color:red;
    }
</style>