<template>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 m-2">
        <Card 
            v-for="tasklist in taskLists" 
            :key="tasklist.id" 
            :title="tasklist.title"
            :category="tasklist.category"
            :taskListId="tasklist.id"
        />
    </div>
</template>
<script>
export default {
    data() {
        return {
            taskLists: [],
        };
    },
    methods : {
        getTaskLists () {
            fetch("/task-lists")
            .then(res => res.json())
            .then(data => this.taskLists = data)
            .catch(err => console.log(error));
        }
    },
    mounted() {
        this.getTaskLists();
    }
};
</script>
