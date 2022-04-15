<template>
    <div class="flex flex-row content-center items-center w-full my-3">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-8 w-8"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            @click="createTask()"
            id="addIcon"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
            />
        </svg>
        <input
            type="text"
            v-model="title"
            class="w-full ml-2"
            @keyup.enter="createTask()"
        />
    </div>
</template>

<script>
export default {
    props: ["taskListId"],
    data() {
        return {
            title: "",
        };
    },
    methods: {
        createTask() {
            if (this.title.length >= 3) {
                axios.post(`tasks`, {
                    title: this.title,
                    is_done: false,
                    task_lists_id: this.taskListId,
                });
                this.$parent.getTasks();
            }
            this.title = "";
        },
    },
};
</script>

<style scoped>
input[type="text"] {
    background: none;
    border: none;
    border-bottom: 1px solid white;
    height: fit-content;
    font-size: 16px;
    font-weight: 200;
    content: attr(data-replicated-value) " ";
    height: auto;
}
#addIcon {
    cursor: pointer;
}
</style>
