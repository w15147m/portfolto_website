<template>
    <div class="grid grid-cols-12 gap-4 sm:gap-5 lg:gap-6">
      <div class="col-span-12 sm:col-span-8">
        <div class="card p-4 sm:p-5">
          <p class="text-base font-medium text-slate-700 dark:text-navy-100">
            Shipping Address
          </p>
          <div class="mt-4 space-y-4">
            <label class="block">
              <span>Company name</span>
              <span class="relative mt-1.5 flex">
                <input
                  v-model="form.companyName"
                  class="form-input peer w-full rounded-lg border px-3 py-2 pl-9"
                  placeholder="Your Company"
                  type="text"
                />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                  <i class="fa-regular fa-building text-base"></i>
                </span>
              </span>
            </label>
  
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label class="block">
                <span>Client name</span>
                <span class="relative mt-1.5 flex">
                  <input
                    v-model="form.clientName"
                    class="form-input peer w-full rounded-lg border px-3 py-2 pl-9"
                    placeholder="Your Name"
                    type="text"
                  />
                  <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                    <i class="far fa-user text-base"></i>
                  </span>
                </span>
              </label>
  
              <label class="block">
                <span>Phone number</span>
                <span class="relative mt-1.5 flex">
                  <input
                    v-model="form.phoneNumber"
                    class="form-input peer w-full rounded-lg border px-3 py-2 pl-9"
                    placeholder="(999) 999-9999"
                    type="text"
                  />
                  <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                    <i class="fa fa-phone"></i>
                  </span>
                </span>
              </label>
            </div>
  
            <label class="block">
              <span>Email Address</span>
              <div class="relative mt-1.5 flex">
                <input
                  v-model="form.email"
                  class="form-input peer w-full rounded-lg border px-3 py-2 pl-9"
                  placeholder="Email address"
                  type="email"
                />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                  <i class="fa-regular fa-envelope text-base"></i>
                </span>
              </div>
            </label>
  
            <label class="block">
              <span>Address</span>
              <textarea
                v-model="form.address"
                rows="4"
                placeholder="Your Address (Area and Street)"
                class="form-textarea mt-1.5 w-full rounded-lg border p-2.5"
              ></textarea>
            </label>
  
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <label class="block">
                <span>City</span>
                <span class="relative mt-1.5 flex">
                  <input
                    v-model="form.city"
                    class="form-input peer w-full rounded-lg border px-3 py-2 pl-9"
                    placeholder="Your City/Town"
                    type="text"
                  />
                  <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                    <i class="fa-solid fa-city text-base"></i>
                  </span>
                </span>
              </label>
  
              <label class="block">
                <span>State</span>
                <span class="relative mt-1.5 flex">
                  <input
                    v-model="form.state"
                    class="form-input peer w-full rounded-lg border px-3 py-2 pl-9"
                    placeholder="Your State"
                    type="text"
                  />
                  <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                    <i class="fa-solid fa-flag"></i>
                  </span>
                </span>
              </label>
            </div>
  
            <label class="inline-flex items-center space-x-2">
              <input
                v-model="form.sameBillingAddress"
                type="checkbox"
                class="form-checkbox rounded border-slate-400"
              />
              <span>Same as Billing Address</span>
            </label>
  
            <div v-if="!form.sameBillingAddress" class="pt-4">
              <label class="block">
                <span>Billing Address</span>
                <textarea
                  v-model="form.billingAddress"
                  rows="4"
                  placeholder="Enter billing address"
                  class="form-textarea mt-1.5 w-full rounded-lg border p-2.5"
                ></textarea>
              </label>
            </div>
  
            <div class="flex justify-end space-x-2">
              <button
                @click="prevStep"
                class="btn bg-slate-150 text-slate-800 hover:bg-slate-200"
              >
                <span>Prev</span>
              </button>
              <button
                @click="nextStep"
                class="btn bg-primary text-white hover:bg-primary-focus"
              >
                <span>Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue';
  
  const form = reactive({
    companyName: '',
    clientName: '',
    phoneNumber: '',
    email: '',
    address: '',
    city: '',
    state: '',
    sameBillingAddress: true,
    billingAddress: '',
  });
  
  const prevStep = () => {
    console.log('Previous Step');
  };
  
  const nextStep = () => {
    console.log('Next Step', form);
  };
  </script>
  
  <style scoped>
  .form-input,
  .form-textarea {
    border: 1px solid #cbd5e0;
    transition: border-color 0.2s;
  }
  .form-input:focus,
  .form-textarea:focus {
    border-color: #3182ce;
  }
  </style>
  