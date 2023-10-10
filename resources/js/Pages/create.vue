<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';


defineProps({
    errors:Object
})

const form = useForm({
    name:null,
    email:null,
    phone:null,
});

function submit(){
    router.post('/customers', form)
}

</script>
<template>
    <div>
        <div class="card col-6 offset-3 my-3">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="name" id="name" v-model="form.name" class="form-control">
                        <div class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" id="email" v-model="form.email" class="form-control">
                        <div class="text-danger text-xs" v-if="errors.email">{{ errors.email }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" id="phone" v-model="form.phone" class="form-control">
                        <div class="text-danger text-xs" v-if="errors.phone">{{ errors.phone }}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>
