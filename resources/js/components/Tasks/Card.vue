<template>
    <div class="overflow-hidden shadow-lg p-10 bark-background relative">
        <div class="header" @click="isVisible = !isVisible">
            <div class="bookmark"> 
                    <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    class="h-10 w-10 icon ml-2" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke="currentColor" 
                    stroke-width="2"
                    id="deleteCard"
                    @click="deleteCard()"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
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
        //Récupération des tâches
        async getTasks(){
            await axios.get(`tasks/${this.taskListId}`)
                .then(response => { 
                    this.tasks = response.data;
                    this.isMounted=true
                    }
                )
        },
        //Suppression d'une card
        async deleteCard() {
            // On évite l'ouverture intempestive de la card
            this.isVisible=true;
            //on attends que la tâche soit réalisée pour mettre à jour le parent
            await axios.delete(`task-lists/${this.taskListId}`);
            this.$parent.getTaskLists();
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
#deleteCard {
    position:absolute;
    left:-50px;
    top:10px;
    cursor: pointer;
}

#deleteCard:hover {
    color:red;
}


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
