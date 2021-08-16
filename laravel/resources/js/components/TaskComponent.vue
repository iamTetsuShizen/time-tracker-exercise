<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="">
                    <label for="task-description">Task description:</label>
                    <input id="task-description" v-model="taskDescription" type="text" />
                </div>
                <div>
                    <button v-on:click="startTask" :disabled="inProgress">Start task</button>
                    <button v-on:click="storeTask" :disabled="!inProgress">Finish task</button>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <label>{{hours}} : {{minutes}} : {{seconds}}</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import EventBus from '../EventBus.vue';

export default {
    name: 'TaskComponent',
    data() {
        return {
            taskDescription: '',
            totalSeconds: 0,
            hours: 0,
            minutes: 0,
            seconds: 0,

            timerInterval: '',
            inProgress: false,
        }
    },
     methods: {
        startTask: function() {
            this.inProgress = true;
            this.timerInterval = setInterval(() => {
                this.totalSeconds++;
                this.updateCounter();
            }, 1000);
        },
        storeTask: function() {
            axios.post ('api/task/store', {
                taskDescription: this.taskDescription,
                totalSeconds: this.totalSeconds
            })
            .then ((response) => {
               EventBus.$emit("added-task");
            })
            .catch ((error) => {
                console.log(error);
            });

            this.inProgress = false;
            this.taskDescription = '';
            this.resetCounter();
        },

        resetCounter: function() {
            clearInterval(this.timerInterval);
            this.totalSeconds = 0;
            this.updateCounter();
        },
        updateCounter: function() {
           this.hours = parseInt(this.totalSeconds / 3600);
           this.minutes = parseInt( (this.totalSeconds / 60) % 60 );
           this.seconds = this.totalSeconds % 60;
        },
    },
    mounted() {}

}
</script>