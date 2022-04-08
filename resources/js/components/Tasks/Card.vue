<template>
    <div class="overflow-hidden shadow-lg p-10 bark-background relative">
        <div class="header" @click="isVisible = !isVisible">
            <div class="bookmark"> </div>
            <div class="category">{{ category.title }} </div>
            <h2>
                {{ title }} 
            </h2>
            <PercentageBar :tasks="tasks" />
        </div>
        <ul class="inline-block content mt-2 w-full" v-show="isVisible">
            <Task v-for="task in tasks" :key="task.id" :taskData="task" />
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        category: Object,
        tasks : Object,
    },
    data() {
        return {
            categoryColor : this.category.color,
            isVisible : false,
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
