<template>
    <div class="task-meter container-fluid">
        <div class="row">
            <div class="col-sm-12 px-0">
                <div class="d-flex justify-content-between">
                    <input class="task-meter__input" v-model="taskDescription" type="text" placeholder="What are you working on?"/>
                    <label class="task-meter__time">{{hours}} : {{minutes}} : {{seconds}}</label>
                </div>
            </div>
            <div class="col-sm-12 px-0">
                <div class="task-meter__buttons">
                    <button v-on:click="startTask" :disabled="inProgress" class="btn btn-primary">Start</button>
                    <button v-on:click="storeTask" :disabled="!inProgress" class="btn btn-success">Finish</button>
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