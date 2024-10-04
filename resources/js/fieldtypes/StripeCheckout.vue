<template>
    <div>
        <div v-if="message" class="font-bold text-red-500 text-sm">{{ message }}</div>
        <div v-else>
            <div>{{ value.label }}</div>
            <div v-if="value.price_id" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">User price Id</div>
                <div class="text-gray-600">{{ value.price_id }}</div>
            </div>
            <div v-if="value.price_name" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">Price</div>
                <div class="text-gray-600">{{ value.price_name }}</div>
            </div>
            <div v-if="value.price_amount" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">Amount</div>
                <div class="text-gray-600">{{ value.price_amount }}</div>
            </div>
            <div v-if="value.checkout_session_id" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">Checkout Session ID</div>
                <div class="text-gray-600">{{ value.checkout_session_id }}</div>
            </div>
            <div v-if="value.checkout_payment_status" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">Checkout Payment Status</div>
                <div class="text-gray-600">{{ value.checkout_payment_status }}</div>
            </div>
        </div>
    </div>
 </template>
 
 <script>
 export default {
    mixins: [Fieldtype],
 
    computed: {
        message() {
            if (typeof this.value === 'object' && this.value.message) {
                return this.value.message;
            }
            return false;
        }
    }
 }
 </script>
 