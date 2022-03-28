<script setup>
import Modal from './views/components/Modal.vue'
import {reactive, ref, computed, watch} from 'vue'

const showModal = ref(false)
const hasError = ref(false)
let fontSizeLocal = 13
let fontSize = ref(10);

const classObject = computed(() => {
    if(hasError.value) {
        return 'success'
    } else {
        return 'hasError'
    }
})

const styleObject = reactive({
    fontSize: '${fontSize.value}px',
});

watch(fontSize, (value, oldValue) => {
    console.log(fontSize.value)
    styleObject.fontSize = '${fontSize.value}px';
});
</script>

<template>
<!--    :style="styleObject"-->
    <div :style="styleObject">
        Testas testas testas {{ fontSize }}
    </div>
    <button @click="fontSize++">+</button>
    <button @click="fontSize--">-</button>

    <div :class="['text-center', classObject]"></div>
    <button @click="(hasError == true) ? hasError = false : hasError = true">Try it</button>
    <button id="show-modal" @click="showModal = true" class="btn-dark"> Filter </button>

    <Teleport to="body">
        <modal :show="showModal" @close="showModal = false">
            <template #header>
                <h3>ListView filter</h3>
            </template>
<!--            <button-->
<!--                class="modal-default-button"-->
<!--                @click="$emit('close')"-->
<!--            >OK</button>-->
            <template #body>
                <button class="btn btn-success btn-lg btn-block" type="submit">Save</button>
                <button class="modal-default-button btn btn-danger btn-lg btn-block" @click="showModal = false" type="submit">Close</button>
            </template>
            <template #footer>
                <form action="" method="post" class="needs-validation simple-form-long">
                    <legend>Profile Edit View</legend>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip01">First name</label>
                            <input type="text" name="first_name" class="form-control" id="validationTooltip01" value="" placeholder="First name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip02">Last name</label>
                            <input type="text" name="last_name" class="form-control" id="validationTooltip02" value="{{ $user->last_name ?? '' }}" placeholder="Last name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltipEmail">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">@</span>
                                <input type="email" name="email" class="form-control" id="validationTooltipEmail" value="" placeholder="Email" aria-describedby="validationTooltipEmailPrepend" required>
                                <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipOldPass">Old password</label>
                            <input type="password" name="old_password" class="form-control" id="validationTooltipOldPass">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipNewPass">New password</label>
                            <input type="password" name="new_password" class="form-control" id="validationTooltipNewPass">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipRepPass">Repeate password</label>
                            <input type="password" name="repeate_new_password" class="form-control" id="validationTooltipRepPass">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip05">Street</label>
                            <input type="text" name="address_street" class="form-control" id="validationTooltip05" value="" placeholder="Street" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip04">City</label>
                            <input type="text" name="address_city" class="form-control" id="validationTooltip04" value="" placeholder="City" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationTooltip03">State</label>
                            <input type="text" name="address_state" class="form-control" id="validationTooltip03" value="" placeholder="State" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipLanguage">Language</label>
                            <select class="form-select form-select" name="language" aria-label=".form-select-sm example" id="validationTooltipLanguage">
                                <option selected>Select preffered language</option>
                                <option value="LT">Lithuania</option>
                                <option value="EN">English</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipMobilePhone">Mobile phone</label>
                            <div class="input-group">
                                <span class="input-group-text">+</span>
                                <input type="number" name="phone_mobile" class="form-control" id="validationTooltipMobilePhone" value="" aria-describedby="validationTooltipMobilePhonePrepend">
                                <div class="invalid-tooltip">
                                    Please type in 11 numbers containing your mobile phone number...
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltipWorkPhone">Work phone</label>
                            <div class="input-group">
                                <span class="input-group-text">+</span>
                                <input type="number" name="work_mobile" class="form-control" id="validationTooltipWorkPhone" value="" aria-describedby="validationTooltipWorkPhonePrepend">
                                <div class="invalid-tooltip">
                                    Please type in 11 numbers containing your work phone number...
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-mb-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </template>
        </modal>
    </Teleport>
</template>


<style>
    .hasError {
        width: 10px;
        height: 10px;
        background-color: red;
    }

    .success {
        width: 10px;
        height: 10px;
        background-color: green;
    }
</style>
