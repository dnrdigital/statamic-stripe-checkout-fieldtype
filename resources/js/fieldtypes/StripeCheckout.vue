<template>
    <div>
        <div v-if="message" class="font-bold text-red-500 text-sm">{{ message }}</div>
        <div v-else>
            <div class="field-inner">
                <label class="publish-field-label">{{ value.label }}</label>
            </div>
            <div class="radio-fieldtype-wrapper">
                <div class="option selected disabled">
                    <label>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" aria-hidden="true" class="radio-icon" style="display: none;">
                            <path fill="currentColor" fill-rule="evenodd" d="M7 1.5a5.5 5.5 0 1 0 0 11 5.5 5.5 0 0 0 0-11zM0 7a7 7 0 1 1 14 0A7 7 0 0 1 0 7z" clip-rule="evenodd"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" class="radio-icon">
                            <path fill="currentColor" fill-rule="evenodd" d="M1.5 7a5.5 5.5 0 1 1 11 0 5.5 5.5 0 0 1-11 0zM7 0a7 7 0 1 0 0 14A7 7 0 0 0 7 0zM3.25 7a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0z" clip-rule="evenodd"></path>
                        </svg>
                        <input type="radio" name="booking_type" disabled="disabled" value="member"> {{ value.price_name }} - <span class="text-primary font-bold">£{{ value.price_amount }}</span>
                    </label>
                </div>
            </div>
            <div v-if="value.price_id" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">User price Id</div>
                <div class="text-gray-600">{{ value.price_id }}</div>
            </div>
            </div>
            <div v-if="value.checkout_session_id" class="mt-2 text-xs text-gray-700">
                <div class="font-medium">Checkout Session ID</div>
                <div class="text-gray-600">{{ value.checkout_session_id }}</div>
            </div>
            <div v-if="value.checkout_payment_status.disabled" class="mt-2 text-xs text-gray-700">
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
 