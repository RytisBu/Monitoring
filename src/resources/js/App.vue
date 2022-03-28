<script setup>
import HeaderView from './views/partials/HeaderView.vue';
// import { h } from 'vue'
import { ref } from 'vue'
const message = 'Zdarova!';
const number = ref();
const isRed = ref(false)
var users = ref(null); // jeigu norim, kad atsivaizduotu html'e
var singleUser = ref(null);
const selected = ref('id')
const values = ref(1)

const loadUser = function() {
    isRed.value = true;
    users.value = null;
    singleUser.value = null;
    fetch('http://localhost:8081/user/id/0')// + selected + '/' + values
        .then(response => response.json()).then(data => {
        users.value = data
        isRed.value = false;
        console.log(users.value)
    });
}

const filterUsers = function() {
    isRed.value = true;
    singleUser.value = null;
    fetch('http://localhost:8081/user/' + selected.value + '/' + values.value)
        .then(response => response.json()).then(data => {
        singleUser.value = data
        isRed.value = false;
        users.value = null;
        console.log(selected.value)
        console.log(values.value)
    });
}

</script>

<template>

    <div class="row">
        <button class="btn-dark" :class="{ red: isRed }" v-on:click="loadUser()">
            Loade user
        </button>
    </div>
    <div class="row">
        <select class="form-select" aria-label="Default select example" v-model="selected">
            <option disabled value="">Open this select menu</option>
            <option>id</option>
            <option>first_name</option>
            <option>last_name</option>
        </select>
    </div>
    <div class="row">
        <input type="text" id="one" v-model="values" plceholder="Search record having..."/>
    </div>
    <div class="row">
        <button class="btn-success" :class="{ red: isRed }" v-on:click="filterUsers()">Serch for user</button>
    </div>

        <table class="table table-striped simple-form-long">

            <thead>
            <tr>
                <th scope="col" colspan="4" rowspan="2">
                    <legend>Profile Detail View</legend>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="detailview-subtitles">
                <th scope="row">First name</th>
                <th scope="row">Last name</th>
            </tr>
            <tr v-for="user in users">
                <th scope="row">{{ user.first_name }}</th>
                <td>{{ user.last_name }}</td>
            </tr>

            <tr v-if="singleUser !== null">
                <th scope="row">{{ singleUser.first_name }}</th>
                <td>{{ singleUser.last_name }}</td>
            </tr>
            </tbody>
        </table>
</template>


<style>
.red {
    color: red !important;
}
</style>
