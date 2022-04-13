<template>
    <div class="overflow-hidden shadow-lg p-10 bark-background relative">
        <div class="header" @click="isVisible = !isVisible">
            <div class="bookmark"> </div>
            <div class="category">{{ category.title }} </div>
            <h2>
                {{ title }} 
            </h2>
            <PercentageBar :tasks="tasks" v-if="isMounted"/>
        </div>
        <div v-show="isVisible" class="relative">
        <ul class="inline-block content mt-2 w-full">
            <Task v-for="task in tasks" :key="task.id" :taskData="task" />
            <addTask :taskListId="taskListId" />
        </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'title',
        'category',
        'taskListId'
    ],
    data() {
        return {
            categoryColor : this.category.color,
            isVisible : false,
            tasks:[],
            isMounted:false,
        }
    },
    beforeMount() {
        this.getTasks();
    },
    methods :{
        getTasks(){
            axios.get(`tasks/${this.taskListId}`)
                .then(response => { 
                    this.tasks = response.data;
                    this.isMounted=true
                    }
                )
        }
    }
};
</script>
<style>
.category {
    color: var(--GoldenRod);
}
.relative {
    position:relative;
}
</style>
<style scoped>
.add {
    cursor: pointer;
    bottom:-30%;
    right:50%;
    position:absolute;

}
.add:hover{
    color:green;
}
h2 {
    font-weight: 900;
    font-size: 20px;
}
div {
    border-radius: 60px;
}
.category {
    font-size: 14px;
    font-weight: 600;
}

.bookmark {
    background-color: v-bind(categoryColor);
    height:100%;
    width:30px;
    position:absolute;
    right:0;
    top:0;
}
.header {
    cursor: pointer;

}
</style>
