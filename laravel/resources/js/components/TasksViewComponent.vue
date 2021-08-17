<template>
    <div class="container">
        <div class="col-12 px-0">
           <div v-for="task in tasks" :key="task.id" class="d-flex justify-content-between task-info">
               <div>
                   <p class="task-info__description mb-0">{{task.description}}</p>
                   <p class="task-info__time-spent mb-0">{{format(task.time_spent)}}</p>
                </div>
                <div>
                    <button class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
                </div>
           </div>
        </div>
    </div>
</template>

<script>
import EventBus from '../EventBus.vue';

export default {
    name: 'TasksViewComponent',
    data() {
        return {
            tasks: []
        }
    },
     methods: {
        getTasks: function() {
            axios.get (`api/tasks/`)
            .then ((response) => {
                this.tasks = response.data;
            })
            .catch ((error) => {
                console.log(error);
            });

        },
        format: function(timeSpent) {
            return `${parseInt(timeSpent / 3600)}h ${parseInt( (timeSpent / 60) % 60 )} min ${timeSpent % 60} sec`;
        },
        deleteTask: function(taskID){
            axios.delete(`api/task/delete/${taskID}`)
            .then ((response) => {
               EventBus.$emit("deleted-task");
            })
            .catch ((error) => {
                console.log(error);
            });
        }
    },
    created() {
        EventBus.$on('added-task', () => {
            this.getTasks();
        });

        EventBus.$on('deleted-task', () => {
            this.getTasks();
        });
    },
    mounted() {
        this.getTasks();
    }

}
</script>