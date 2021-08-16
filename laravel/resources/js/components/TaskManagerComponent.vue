<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <task-component></task-component>
            </div>

            <div class="col-sm-12">
               <tasks-view-component></tasks-view-component>
            </div>
        </div>
    </div>
</template>

<script>
    import TaskComponent from './TaskComponent.vue';
    import TasksViewComponent from './TasksViewComponent.vue';

    export const bus = new Vue();
    export default {
        components: { 
            TaskComponent,
            TasksViewComponent
        },
        name: 'TaskManagerController'
    }
</script>
