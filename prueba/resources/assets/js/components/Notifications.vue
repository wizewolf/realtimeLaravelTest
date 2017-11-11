<template>
    <ul class="dropdown-menu">
        <li class="dropdown-item" v-for="msjNotificacion in msjNotificaciones">
            te ha seguido!
        </li>
    </ul>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            msjNotificaciones: []
        }
    },
    mounted() {
        axios.get('/notificaciones')
            .then(response => {
                this.msjNotificaciones = response.data;
            });
    }
}
</script>
