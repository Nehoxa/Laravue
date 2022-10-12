<template>
  <div v-if="errors !== ''">
    {{  }}
  </div>
  <form class="space-y-6" @submit.prevent="storeCustomer">
    <div>
      <label for="name" class="block">Nom du client</label>
      <input type="text" id="name" v-model="form.name"
        class="w-auto px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
    </div>
    <div>
      <label for="telephone_number" class="block">Numéro de téléphone</label>
      <input type="text" id="telephone_number" v-model="form.telephone_number"
        class="w-auto px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
    </div>
    <div class="flex">
      <input type="checkbox" id="is_favorite" class="peer hidden" v-model="form.is_favorite" />
      <label for="is_favorite"
        class="select-none cursor-pointer rounded-lg border-2 border-red-200 py-3 px-6 font-bold text-red-200 transition-colors duration-200 ease-in-out peer-checked:bg-green-200 peer-checked:text-green-900 peer-checked:border-green-200 ">
        Favori</label>
    </div>

    <button type="submit"
      class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
      Enregistrer
    </button>
  </form>
</template>

<script>
import { reactive } from 'vue';
import useCustomers from '../services/customerservices.js';
import router from '../router';

export default {
  setup() {
    const form = reactive({
      name: '',
      telephone_number: '',
      is_favorite: '',
    });

    const { createCustomer, errors } = useCustomers();

    const storeCustomer = async () => {
      await createCustomer({ ...form });
    };

    return {
      form,
      errors,
      storeCustomer
    }
  }
}
</script>

<style lang="scss" scoped>

</style>