<script setup>
import {reactive, ref, computed, watch} from 'vue'
import Modal from './Modal.vue'

const showModal = ref(false)
const originUrl = ref('http://localhost:8081/complaints/getList')
const complaintsUrl  = ref('http://localhost:8081/complaints/getList');
const showComplaints = ref(false)
var complaintsList   = ref(null);
const showPreloader  = ref(false);
const complaintCategory           = ref();
const complaintName      = ref();
const complaintPriority  = ref();
const complaintStatus    = ref();
const complaintsCreatedAt    = ref();
const complaintsUpdatedAt    = ref();
const complaintsRecordsCount    = ref(5);

const loadContent = function() {
    if(showComplaints.value == false) {
        showPreloader.value = true;
        fetch(complaintsUrl.value)
            .then(response => response.json()).then(data => {
            complaintsList.value = data;
            console.log(complaintsList.value['data'][0])
            // return false;
            complaintsList.value = complaintsList.value['data']
            showComplaints.value = true
            showPreloader.value = false;
        });

    } else {
        showComplaints.value = false
    }
}

const reloadContent = function() {
    presetRequestUrl();
    console.log(complaintsUrl.value);
    showModal.value = false;
    showComplaints.value = false;
    loadContent();
}

const presetRequestUrl = function() {
    complaintsUrl.value                                = originUrl.value + '?';
    complaintCategory.value ? complaintsUrl.value      = complaintsUrl.value + 'category=' + complaintCategory.value : complaintsUrl.value;
    complaintName.value ? complaintsUrl.value          = complaintsUrl.value + '&name=' + complaintName.value : complaintsUrl.value;
    complaintPriority.value ? complaintsUrl.value      = complaintsUrl.value + '&priority=' + complaintPriority.value : complaintsUrl.value;
    complaintStatus.value ? complaintsUrl.value        = complaintsUrl.value + '&status=' + complaintStatus.value : complaintsUrl.value;
    complaintsCreatedAt.value ? complaintsUrl.value    = complaintsUrl.value + '&created_at=' + complaintsCreatedAt.value : complaintsUrl.value;
    complaintsUpdatedAt.value ? complaintsUrl.value    = complaintsUrl.value + '&updated_at=' + complaintsUpdatedAt.value : complaintsUrl.value;
    complaintsRecordsCount.value ? complaintsUrl.value = complaintsUrl.value + '&records_display=' + complaintsRecordsCount.value : complaintsUrl.value;
}
</script>

<template>
    <div class="row">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark main-sidebar">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item side-nav">
                    <a id="show-modal" @click="reloadContent()" class="nav-link sidebar-nav active">
                        <span>
                            Complaints dashboard
                        </span>
                        <svg class="sidebar-img" version="1.0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M272 4480 c-102 -22 -193 -96 -241 -199 -22 -47 -26 -69 -26 -141 1 -72 5 -94 28 -142 62 -128 203 -208 341 -194 293 30 415 382 204 588 -75 73 -201 110 -306 88z"/>
                                <path d="M1360 4405 c-101 -32 -170 -129 -170 -241 0 -34 7 -78 15 -98 23 -55 79 -111 135 -135 l49 -21 1778 2 c1678 3 1780 4 1810 21 90 49 138 130 138 232 -1 101 -48 179 -140 228 l-40 22 -1765 2 c-1490 1 -1772 0 -1810 -12z"/>
                                <path d="M250 2891 c-93 -29 -177 -101 -219 -190 -38 -81 -38 -201 0 -282 56 -119 161 -190 294 -197 104 -5 173 19 248 88 75 69 110 147 110 250 0 62 -6 88 -28 139 -35 78 -113 151 -190 180 -57 22 -164 27 -215 12z"/>
                                <path d="M1393 2810 c-123 -25 -203 -122 -203 -250 0 -106 53 -189 150 -234 l45 -21 1770 0 c1650 0 1772 1 1806 17 54 25 96 64 127 117 23 39 27 57 27 121 0 64 -4 82 -27 121 -31 53 -73 92 -127 117 -34 16 -156 17 -1781 19 -960 0 -1764 -3 -1787 -7z"/>
                                <path d="M233 1300 c-80 -26 -161 -99 -200 -178 -23 -48 -27 -70 -28 -142 0 -77 3 -92 33 -152 73 -148 229 -223 384 -183 160 40 260 168 260 330 1 235 -225 398 -449 325z"/>
                                <path d="M1335 1187 c-93 -44 -145 -126 -145 -231 0 -76 34 -151 88 -196 77 -64 -36 -60 1897 -58 l1760 3 40 22 c92 49 139 127 140 228 0 102 -48 183 -138 232 -30 17 -132 18 -1812 20 l-1780 3 -50 -23z"/>
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>
            <hr>
        </div>
        <div class="d-flex flex-column justify-content-center main-bar" style="position: absolute;">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="d-flex flex-column justify-content-center flex-lg-wrap">
                    <div v-if="showComplaints && !showPreloader" class="simple-form-long">
<!--                        <button class="btn-dark"> Filter </button>-->
                        <div class="d-flex flex-row justify-content-between">
                            <h3>My Complaints</h3>
                            <button @click="showModal = true" class="btn btn-success btn-lg btn-block dashboards-buttons" type="submit">Filter</button>
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
    <!--                                <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="assigned_user_id">Assigned to</button></th>-->
    <!--                                <th scope="col"><button type="submit" class="btn btn-light" name="sort" value="system_id">System</button></th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="complaint in complaintsList">
                                    <th scope="row">{{ complaint.name }}</th>
                                    <th>{{ complaint.category }}</th>
                                    <th>{{ complaint.priority }}</th>
                                    <th>{{ complaint.created_at }}</th>
                                    <td>{{ complaint.status }}</td>
    <!--                                <th>{{ $complaint->user->name ?? '' }}</th>-->
    <!--                                <td> {{ $complaint->system->name ?? '' }} </td>-->
                                </tr>
                                </tbody>
                            </table>
    <!--                        <input type="hidden" name="orderType" value="{{ $orderType ?? 'DESC' }}">-->
                        </form>
                    </div>
                    <div v-else-if="showPreloader && !showComplaints" class="d-flex justify-content-center dashboard-preloader">
                        <img src="../../../../public/images/preloader.gif">
                    </div>
                </div>
            </div>
    <!--        <div class="something" id="more"></div>-->
        </div>
    </div>

<!-- ---------------------------------- Filter ----------------------------------------------------- -->
    <Teleport to="body">
        <modal :show="showModal" @close="showModal = false">
<!--            <template #header>-->

<!--            </template>-->
            <template #body>

                <div class="d-flex flex-row justify-content-between">
                    <div class="filter-header">
                        <h3>ListView filter</h3>
                    </div>
                    <div class="filter-header-buttons">
                        <button class="modal-default-button btn btn-success btn-lg btn-block" @click="reloadContent()" type="submit">Save</button>
                        <button class="modal-default-button btn btn-danger btn-lg btn-block" @click="showModal = false" type="submit">Close</button>
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
    </Teleport>
</template>

<style>
.dashboards-buttons {
    margin-bottom: 10px;
}
</style>
