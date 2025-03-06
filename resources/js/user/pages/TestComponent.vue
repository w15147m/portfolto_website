<template>
    <div class="col-span-12 sm:col-span-8">
      <div class="card p-4 sm:p-5">
        <p class="text-base font-medium text-slate-700 dark:text-navy-100">
          Shipping Address
        </p>
        <div class="mt-4 space-y-4">
          <!-- Company Name -->
          <label class="block">
            <span>Company name</span>
            <span class="relative mt-1.5 flex">
              <input
                v-model="form.companyName"
                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                placeholder="Your Company"
                type="text"
              />
              <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                <i class="fa-regular fa-building text-base"></i>
              </span>
            </span>
          </label>
  
          <!-- Client Name and Phone Number -->
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <label class="block">
              <span>Client name</span>
              <span class="relative mt-1.5 flex">
                <input
                  v-model="form.clientName"
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9"
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
                  v-model="form.phone"
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9"
                  placeholder="(999) 999-9999"
                  type="tel"
                />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                  <i class="fa fa-phone"></i>
                </span>
              </span>
            </label>
          </div>
  
          <!-- Email and Pincode -->
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-12">
            <label class="block sm:col-span-8">
              <span>Email Address</span>
              <div class="relative mt-1.5 flex">
                <input
                  v-model="form.email"
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9"
                  placeholder="Email address"
                  type="email"
                />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                  <i class="fa-regular fa-envelope text-base"></i>
                </span>
              </div>
            </label>
            <label class="block sm:col-span-4">
              <span>Pincode</span>
              <div class="relative mt-1.5 flex">
                <input
                  v-model="form.pincode"
                  class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9"
                  placeholder="Pincode"
                  type="text"
                />
                <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400">
                  <i class="fa-solid fa-map-pin text-base"></i>
                </span>
              </div>
            </label>
          </div>
  
          <!-- Address -->
          <label class="block">
            <span>Address</span>
            <textarea
              v-model="form.address"
              rows="4"
              placeholder="Your Address (Area and Street)"
              class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5"
            ></textarea>
          </label>
  
          <!-- City and State -->
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <label class="block">
              <span>City</span>
              <input
                v-model="form.city"
                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9"
                placeholder="Your City/Town"
                type="text"
              />
            </label>
            <label class="block">
              <span>State</span>
              <input
                v-model="form.state"
                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9"
                placeholder="Your State"
                type="text"
              />
            </label>
          </div>
  
          <!-- Billing Address -->
          <div>
            <label class="inline-flex items-center space-x-2">
              <input
                v-model="sameBillingAddress"
                class="form-checkbox"
                type="checkbox"
              />
              <span>Same as Billing Address</span>
            </label>
            <div v-if="!sameBillingAddress" class="pt-4">
              <label class="block">
                <span>Billing Address</span>
                <textarea
                  v-model="form.billingAddress"
                  rows="4"
                  placeholder="Enter billing address"
                  class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5"
                ></textarea>
              </label>
            </div>
          </div>
  
          <!-- Navigation Buttons -->
          <div class="flex justify-end space-x-2">
            <button class="btn bg-slate-150 text-slate-800">Prev</button>
            <button class="btn bg-primary text-white">Next</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive, ref, watch } from 'vue';
  
  const form = reactive({
    companyName: '',
    clientName: '',
    phone: '',
    email: '',
    pincode: '',
    address: '',
    city: '',
    state: '',
    billingAddress: '',
  });
  
  const sameBillingAddress = ref(true);
  
  watch(sameBillingAddress, (newValue) => {
    if (newValue) {
      form.billingAddress = form.address;
    } else {
      form.billingAddress = '';
    }
  });
  </script>
  
  <style scoped>
  .btn {
    padding: 0.5rem 1rem;
    border-radius: 0.375rem;
    transition: all 0.3s;
  }
  .btn:hover {
    opacity: 0.9;
  }
  </style>
  