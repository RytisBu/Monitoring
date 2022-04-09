<script setup>
import {reactive, ref, computed, watch} from 'vue'
import Modal from './Modal.vue'

// -------------------- Systems filter -------------------------
// const systemsDefaultLayout = ref(true);
const showSystemsModal     = ref(false)
const systemsOriginUrl     = ref('http://localhost:8081/systems/getList?')
const systemsUrl           = ref('http://localhost:8081/systems/getList?');
const showSystems          = ref(false)
var systemsList            = ref(null);
const showSystemsPreloader = ref(false);
const systemCategory       = ref();
const systemName           = ref();
const systemPriority       = ref();
const systemStatus         = ref();
const systemsCreatedAt     = ref();
const systemsUpdatedAt     = ref();
const systemsRecordsCount  = ref(5);

// -------------------- Complaints filter -------------------------
// const complaintsDefaultLayout = ref(true);
const showComplaintsModal     = ref(false)
const complaintsOriginUrl     = ref('http://localhost:8081/complaints/getList?')
const complaintsUrl           = ref('http://localhost:8081/complaints/getList?');
const showComplaints          = ref(false)
var complaintsList            = ref(null);
const showComplaintsPreloader = ref(false);
const complaintCategory       = ref();
const complaintName           = ref();
const complaintPriority       = ref();
const complaintStatus         = ref();
const complaintsCreatedAt     = ref();
const complaintsUpdatedAt     = ref();
const complaintsRecordsCount  = ref(5);


// -------------------- Systems filter -------------------------
const loadSystemsContent = function() {
    if(showSystems.value == false) {
        showSystemsPreloader.value = true;
        presetSystemsRequestUrl();
        fetch(systemsUrl.value)
            .then(response => response.json()).then(data => {
            systemsList.value          = data;
            systemsList.value          = systemsList.value['data'];
            showSystems.value          = true;
            showSystemsPreloader.value = false;
        });
    } else {
        showSystems.value = false;
    }
}

const reloadSystemsContent = function() {
    showSystemsModal.value = false;
    showSystems.value = false;
    loadSystemsContent();
}

const presetSystemsRequestUrl = function() {
    systemsUrl.value = systemsOriginUrl.value;
    systemsUrl.value                             = systemsUrl.value + 'records_display=' + systemsRecordsCount.value;
    systemName.value ? systemsUrl.value          = systemsUrl.value + '&name=' + systemName.value : systemsUrl.value;
    systemStatus.value ? systemsUrl.value        = systemsUrl.value + '&status=' + systemStatus.value : systemsUrl.value;
    systemsCreatedAt.value ? systemsUrl.value    = systemsUrl.value + '&created_at=' + systemsCreatedAt.value : systemsUrl.value;
    systemsUpdatedAt.value ? systemsUrl.value    = systemsUrl.value + '&updated_at=' + systemsUpdatedAt.value : systemsUrl.value;
}

// -------------------- Complaints filter -------------------------
const loadComplaintsContent = function() {
    if(showComplaints.value == false) {
        showComplaintsPreloader.value = true;
        presetComplaintsRequestUrl();
        fetch(complaintsUrl.value)
            .then(response => response.json()).then(data => {
            complaintsList.value = data;
            complaintsList.value = complaintsList.value['data']
            showComplaints.value = true
            showComplaintsPreloader.value = false;
        });
    } else {
        showComplaints.value = false;
    }
}

const reloadComplaintsContent = function() {
    showComplaintsModal.value = false;
    showComplaints.value = false;
    loadComplaintsContent();
}

const presetComplaintsRequestUrl = function() {
    complaintsUrl.value = complaintsOriginUrl.value;
    complaintsUrl.value                                = complaintsOriginUrl.value + 'records_display=' + complaintsRecordsCount.value;
    complaintCategory.value ? complaintsUrl.value      = complaintsUrl.value + '&category=' + complaintCategory.value : complaintsUrl.value;
    complaintName.value ? complaintsUrl.value          = complaintsUrl.value + '&name=' + complaintName.value : complaintsUrl.value;
    complaintPriority.value ? complaintsUrl.value      = complaintsUrl.value + '&priority=' + complaintPriority.value : complaintsUrl.value;
    complaintStatus.value ? complaintsUrl.value        = complaintsUrl.value + '&status=' + complaintStatus.value : complaintsUrl.value;
    complaintsCreatedAt.value ? complaintsUrl.value    = complaintsUrl.value + '&created_at=' + complaintsCreatedAt.value : complaintsUrl.value;
    complaintsUpdatedAt.value ? complaintsUrl.value    = complaintsUrl.value + '&updated_at=' + complaintsUpdatedAt.value : complaintsUrl.value;
}

loadSystemsContent();
loadComplaintsContent();
</script>

<template>
    <div class="row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark main-sidebar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item side-nav">
                    <a id="show-modal" @click="loadComplaintsContent()" class="nav-link sidebar-nav active">
                        <span>
                            Complaints dashboard
                        </span>
                        <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 108.81 122.88"><path class="cls-1" d="M62.72,69.75H99.84a9,9,0,0,1,9,9V113.9a9,9,0,0,1-9,9H62.72a9,9,0,0,1-9-9V78.72a9,9,0,0,1,9-9ZM84.46,28.19a3.15,3.15,0,0,1,2.29,3v5.29H94.6a6.82,6.82,0,0,1,4.88,2,6.91,6.91,0,0,1,2,4.88V60.21h-6V43.42a1,1,0,0,0-.28-.7,1,1,0,0,0-.71-.28H86.75V60.2H80.44V35H54.21A3.17,3.17,0,0,1,51,31.83V6.29H6.32v95.48H43.76v6.31H16.37V116a1,1,0,0,0,.28.7,1,1,0,0,0,.7.28H43.74v5.93H17.39A7,7,0,0,1,10.47,116v-7.88H5.66a5.66,5.66,0,0,1-4-1.65,5.6,5.6,0,0,1-1.66-4V5.65A5.65,5.65,0,0,1,5.66,0H54.21a3.09,3.09,0,0,1,2.42,1.16l27.83,27ZM57.35,11.06,76.24,28.69H57.35V11.06ZM20,51.62A2.05,2.05,0,0,0,18,53.76,2,2,0,0,0,20,55.89H57A2.05,2.05,0,0,0,59,53.76,2,2,0,0,0,57,51.62Zm0,15.27A2,2,0,0,0,18.06,69,2,2,0,0,0,20,71.15h23.7V66.89Zm0,15.26a2,2,0,0,0-1.92,2.13A2,2,0,0,0,20,86.41h23.7V82.15Zm0-45.79A2,2,0,0,0,18,38.49,2,2,0,0,0,20,40.62H41.89a2,2,0,0,0,1.91-2.13,2,2,0,0,0-1.91-2.13ZM20,21.1a2,2,0,0,0-1.92,2.13A2,2,0,0,0,20,25.36H32a2,2,0,0,0,1.91-2.13A2,2,0,0,0,32,21.1Zm64.73,83h-6.9c-.68-8.39-2.13-9.59-2.13-18a5.6,5.6,0,1,1,11.19,0c0,8.37-1.46,9.58-2.16,18Zm-6.9,3.13h6.91v4.84H77.81v-4.84Z"/></svg>
                    </a>
                </li>
                <li class="nav-item side-nav">
                    <a id="show-modal" @click="loadSystemsContent()" class="nav-link sidebar-nav active">
                        <span>
                            Systems dashboard
                        </span>
                        <svg class="sidebar-img" xmlns="http://www.w3.org/2000/svg" width="24" height="24" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 450 511.99"><path d="m307.28 396.06-.09 15.75c-.04 7.37-6.06 13.36-13.41 13.34l-14.62-.07c-2.17 7.14-5.24 13.89-9.14 20.08l10.77 10.88c5.19 5.24 5.16 13.75-.05 18.94l-11.18 11.1c-5.26 5.17-13.77 5.14-18.96-.1L239 474.29a83.026 83.026 0 0 1-19.32 7.57l-.09 16.81c-.03 7.35-6.07 13.36-13.45 13.32l-15.74-.06c-7.35-.02-13.36-6.09-13.32-13.45l.06-16.96a84.247 84.247 0 0 1-19.08-7.8l-11.91 11.81c-5.2 5.19-13.72 5.16-18.91-.08l-11.09-11.2c-5.19-5.21-5.16-13.72.06-18.91l11.28-11.15a83.952 83.952 0 0 1-8.8-19.79l-15.15-.07c-7.37-.03-13.38-6.1-13.34-13.45l.08-15.74c.04-7.38 6.07-13.39 13.42-13.35l13.73.06a82.18 82.18 0 0 1 8.36-21.77l-9.11-9.18c-5.19-5.21-5.15-13.76.07-18.95l11.18-11.06c5.25-5.19 13.75-5.16 18.94.07l8.3 8.38c6.95-4.31 14.59-7.57 22.66-9.7l.06-11.39c.03-7.35 6.09-13.34 13.44-13.31l15.75.07c7.36.02 13.36 6.08 13.33 13.44l-.04 11.21c8.14 2.13 15.81 5.5 22.79 9.83l8.17-8.1c5.21-5.15 13.72-5.12 18.91.1l11.08 11.18c5.19 5.22 5.16 13.77-.05 18.94l-8.83 8.72c3.8 6.87 6.65 14.35 8.38 22.24l13.11.06c7.38.04 13.39 6.06 13.35 13.43zM145.58 86.79c31.46.98 56.18 27.28 55.18 58.79-.96 31.46-27.28 56.18-58.77 55.22-31.46-1-56.19-27.32-55.2-58.81.98-31.46 27.28-56.2 58.79-55.2zm96.28 316.88c-.1 23.79-19.51 43.04-43.3 42.9-23.84-.1-43.06-19.47-42.94-43.27.09-23.84 19.51-43.04 43.3-42.94 23.83.09 43.05 19.48 42.94 43.31zm112.82-175.21c19.22-3.55 37.65 9.13 41.21 28.35 3.57 19.2-9.15 37.65-28.35 41.24-19.22 3.54-37.66-9.15-41.21-28.36-3.54-19.22 9.15-37.69 28.35-41.23zM137.87.01l20.82.67c9.71.31 17.44 8.51 17.12 18.25l-.59 19.26c9.36 3.14 18.16 7.48 26.21 12.85l14.79-13.88c7.1-6.67 18.36-6.32 25.01.78l14.27 15.18c6.69 7.09 6.31 18.38-.78 25.04l-15.87 14.9c4.11 8.1 7.29 16.77 9.33 25.85l22.21.7c9.75.3 17.45 8.51 17.17 18.26l-.67 20.82c-.31 9.71-8.51 17.44-18.26 17.12l-22.44-.68c-2.63 8.82-6.34 17.18-10.96 24.92l15.18 16.17c6.66 7.1 6.32 18.36-.78 25.01l-15.18 14.27c-7.1 6.66-18.38 6.31-25.05-.78l-14.33-15.27c-8.23 4.71-17.11 8.42-26.48 10.9l-.63 20.04c-.31 9.75-8.51 17.45-18.26 17.17l-20.79-.67c-9.75-.31-17.47-8.51-17.17-18.26l.58-18.1a110.615 110.615 0 0 1-28.51-11.84l-12.47 11.72c-7.07 6.66-18.35 6.32-25.02-.78l-14.25-15.18c-6.66-7.1-6.32-18.35.78-25.05l11.37-10.68a108.9 108.9 0 0 1-12-30.29l-15.06-.47C7.43 167.65-.27 159.45.01 149.7l.67-20.83c.31-9.71 8.51-17.43 18.25-17.13l14.83.48c3.11-10.71 7.8-20.74 13.79-29.82L37.16 71.34c-6.67-7.07-6.32-18.35.78-25.02l15.18-14.25c7.09-6.66 18.35-6.32 25.04.78l11.21 11.94c9.24-4.77 19.21-8.27 29.7-10.28l.54-17.35c.3-9.73 8.51-17.43 18.26-17.15zm200.67 176.87 12.74-2.35c5.94-1.1 11.68 2.86 12.78 8.8l2.17 11.78c6.09.66 12 2.13 17.6 4.31l7.12-10.38c3.43-4.96 10.28-6.22 15.27-2.8l10.66 7.32c4.96 3.43 6.22 10.28 2.83 15.27l-7.67 11.13c3.58 4.37 6.64 9.21 9.05 14.42l13.57-2.51c5.94-1.1 11.7 2.89 12.8 8.83l2.36 12.69c1.09 5.94-2.86 11.69-8.8 12.79l-13.71 2.55a67.108 67.108 0 0 1-3.36 16.55l11.35 7.8c4.96 3.43 6.25 10.31 2.82 15.27l-7.32 10.66c-3.42 4.96-10.31 6.24-15.27 2.83l-10.72-7.37c-4.36 3.94-9.27 7.32-14.61 10.1l2.27 12.22c1.09 5.94-2.87 11.73-8.8 12.81l-12.73 2.36c-5.9 1.1-11.69-2.86-12.79-8.83l-2.03-11.03a67.976 67.976 0 0 1-18.83-3.42l-6.02 8.73c-3.41 5-10.28 6.25-15.28 2.84l-10.65-7.32c-4.97-3.44-6.26-10.28-2.83-15.28l5.49-7.97a68.21 68.21 0 0 1-11.28-16.78l-9.16 1.69c-5.94 1.1-11.7-2.86-12.8-8.8l-2.36-12.69c-1.09-5.94 2.86-11.72 8.8-12.82l9.05-1.67c.47-6.88 2.01-13.57 4.43-19.86l-7.76-5.34c-4.97-3.42-6.25-10.31-2.82-15.27l7.32-10.64c3.42-5.01 10.31-6.26 15.27-2.84l8.38 5.75c4.97-4.09 10.56-7.55 16.63-10.15l-1.96-10.56c-1.1-5.97 2.86-11.71 8.8-12.82z"/></svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="d-flex flex-column justify-content-center main-bar" style="position: absolute;">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="d-flex flex-column justify-content-center flex-lg-wrap">
                    <div v-if="showComplaints && !showComplaintsPreloader" class="simple-form-long colmd-12 mb-4">
                        <div class="d-flex flex-row justify-content-between">
                            <h3>My Complaints</h3>
                            <button @click="showComplaintsModal = true" class="btn btn-success btn-lg btn-block dashboards-buttons" type="submit">Filter</button>
                        </div>

                        <form action="#" method="get" class="needs-validation ">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="list-header">
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="name">Name:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="category">Category:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="priority">Priority:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="created_at">Created at:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="status">Status:</button></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="complaint in complaintsList">
                                    <th scope="row">{{ complaint.name }}</th>
                                    <th>{{ complaint.category }}</th>
                                    <th>{{ complaint.priority }}</th>
                                    <th>{{ complaint.created_at }}</th>
                                    <td>{{ complaint.status }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div v-else-if="showComplaintsPreloader && !showComplaints" class="d-flex justify-content-center mb-5 dashboard-preloader">
                        <div class="loader">
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__ball"></div>
                        </div>
                    </div>
                    <div v-if="showSystems && !showSystemsPreloader" class="simple-form-long colmd-12 mb-4">
                        <div class="d-flex flex-row justify-content-between">
                            <h3>My Systems</h3>
                            <button @click="showSystemsModal = true" class="btn btn-success btn-lg btn-block dashboards-buttons" type="submit">Filter</button>
                        </div>

                        <form action="#" method="get" class="needs-validation ">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr class="list-header">
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="name">Name:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="created_at">Created at:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="updated_at">updated_at:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="status">Status:</button></th>
                                    <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="description">Description:</button></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="system in systemsList">
                                    <th scope="row">{{ system.name }}</th>
                                    <th>{{ system.created_at }}</th>
                                    <th>{{ system.updated_at }}</th>
                                    <th>{{ system.status }}</th>
                                    <td>{{ system.description }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <div v-else-if="showSystemsPreloader && !showSystems" class="d-flex justify-content-center dashboard-preloader">
                        <div class="loader">
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__bar"></div>
                            <div class="loader__ball"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- ---------------------------------- Filter ----------------------------------------------------- -->
    <Teleport to="body">
        <modal :show="showComplaintsModal" @close="showComplaintsModal = false">
            <template #body>
                <div class="d-flex flex-row justify-content-between">
                    <div class="filter-header com-md-6 mb-12">
                        <h3>ListView filter</h3>
                    </div>
                    <div class="filter-header-buttons col-md-6 mb-12">
                        <button class="modal-default-button btn btn-success btn-lg btn-block" @click="reloadComplaintsContent()" type="submit">Save</button>
                        <button class="modal-default-button btn btn-danger btn-lg btn-block" @click="showComplaintsModal = false" type="submit">Close</button>
                    </div>
                </div>
            </template>
            <template #footer>
                <form action="" method="post" class="needs-validation simple-form-long">
                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" v-model="complaintName">
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Category:</label>
                            <select class="form-select form-select" name="category" aria-label=".form-select-sm example" v-model="complaintCategory">
                                <option selected></option>
                                <option value="System not working">System not working</option>
                                <option value="Need permissions">Need permissions</option>
                                <option value="Found bug">Found bug</option>
                                <option value="API">API</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Priority:</label>
                            <select class="form-select form-select" name="priority" aria-label=".form-select-sm example" v-model="complaintPriority">
                                <option selected></option>
                                <option value="Ctritical">Ctritical</option>
                                <option value="Normal">Normal</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Status:</label>
                            <select class="form-select form-select" name="status" aria-label=".form-select-sm example" v-model="complaintStatus">
                                <option selected></option>
                                <option value="Registered">Registered</option>
                                <option value="Solving">Solving</option>
                                <option value="Resolved">Resolved</option>
                                <option value="Spam">Spam</option>
                                <option value="Inform client">Inform client</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Created from:</label>
                            <input type="date" name="created_at" class="form-control" v-model="complaintsCreatedAt">
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Updated from:</label>
                            <input type="date" name="updated_at" class="form-control" v-model="complaintsUpdatedAt">
                        </div>
                        <div class="col-md-12 mb-6">
                            <label>Max records on dashboard:</label>
                            <select class="form-select form-select" name="complaintsRecordsCount" aria-label=".form-select-sm example" v-model="complaintsRecordsCount">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                </form>
            </template>
        </modal>
        <modal :show="showSystemsModal" @close="showSystemsModal = false">
            <template #body>
                <div class="d-flex flex-row justify-content-between">
                    <div class="filter-header com-md-6 mb-12">
                        <h3>ListView filter</h3>
                    </div>
                    <div class="filter-header-buttons col-md-6 mb-12">
                        <button class="modal-default-button btn btn-success btn-lg btn-block" @click="reloadSystemsContent()" type="submit">Save</button>
                        <button class="modal-default-button btn btn-danger btn-lg btn-block" @click="showSystemsModal = false" type="submit">Close</button>
                    </div>
                </div>
            </template>
            <template #footer>
                <form action="" method="post" class="needs-validation simple-form-long">
                    <div class="row">
                        <div class="col-md-6 mb-6">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" v-model="systemName">
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Status:</label>
                            <select class="form-select form-select" name="status" aria-label=".form-select-sm example" v-model="systemStatus">
                                <option selected></option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Created from:</label>
                            <input type="date" name="created_at" class="form-control" v-model="systemsCreatedAt">
                        </div>
                        <div class="col-md-6 mb-6">
                            <label>Updated from:</label>
                            <input type="date" name="updated_at" class="form-control" v-model="systemsUpdatedAt">
                        </div>
                        <div class="col-md-12 mb-6">
                            <label>Max records on dashboard:</label>
                            <select class="form-select form-select" name="systemsRecordsCount" aria-label=".form-select-sm example" v-model="systemsRecordsCount">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                    </div>
                </form>
            </template>
        </modal>
    </Teleport>
</template>

<style>
.dashboards-buttons {
    margin-bottom: 10px;
}

.side-nav {
    margin-bottom: 10px;
}
</style>
