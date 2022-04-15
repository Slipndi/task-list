<template>
    <div
        class="overflow-hidden shadow-lg p-10 flex flex-col justify-center items-center bark-background"
    >
        <header @click="isVisible = !isVisible">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-20 w-20"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
        </header>
        <main v-show="isVisible" class="flex flex-col"> 

                <label for="title" class="mt-2"> Titre </label>
                <input type="text" v-model="title" id="title" name="title" />
                <label for="categories" class="mt-3"> Catégories </label>
                <select
                    class="mt-2"
                    name="category_id"
                    id="categories"
                    v-model="selected"
                >
                    <option value="non" selected> Veuillez choisir une catégorie </option>
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.title }}
                    </option>
                </select>
                <button type="button" class="mt-5" @click="insertNewTaskList()">Créer</button>
        </main>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isVisible: false,
            title: "",
            categories: [],
            selected:'non',
        };
    },
    beforeMount() {
        this.getCategory();
    },
    methods: {
        async getCategory() {
            await axios.get("/categories").then((response) => {
                this.categories = response.data;
            });
        },

        async insertNewTaskList(){
            if(this.selected != 'non') {
                await axios.post("/task-lists", {
                    category_id:this.selected,
                    title:this.title,
                });
                this.select = '';
                this.title = '';
                this.isVisible = false;
                this.$parent.getTaskLists();
            }
        }
    },
};
</script>
<style>
input[type="text"],
select {
    background: none;
    border: none;
    border-bottom: 1px solid white;
    height: fit-content;
    font-size: 16px;
    font-weight: 200;
    content: attr(data-replicated-value) " ";
    height: auto;
}
.category {
    color: var(--GoldenRod);
}
.relative {
    position: relative;
}
</style>
<style scoped>

#deleteCard {
    position: absolute;
    left: -50px;
    top: 10px;
    cursor: pointer;
}

#deleteCard:hover {
    color: red;
}

.add {
    cursor: pointer;
    bottom: -30%;
    right: 50%;
    position: absolute;
}
.add:hover {
    color: green;
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
    height: 100%;
    width: 30px;
    position: absolute;
    right: 0;
    top: 0;
}
.header {
    cursor: pointer;
}
</style>
