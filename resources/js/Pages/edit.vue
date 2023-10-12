<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object,
    customer: Object,
})

const form = useForm({
    name:props.customer.name,
    email:props.customer.email,
    phone:props.customer.phone,
})

function submit(id){
    router.put('/customers/'+id,form)
}

</script>

<template>
    <div>
        <div class="card col-6 offset-3 my-3">
            <div class="card-header">
                Edit Customer
            </div>
            <div class="card-body">
                <form @submit.prevent="submit(customer.id)">
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

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>
