<template>
  component
  <div class="max-w-7xl mx-auto">
    <div class="inline-block min-w-full py-2 align-middle">
      <div class="space-x-8 mb-5 flex justify-end">
        <router-link :to="{name: 'customers.create'}" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Créer un client</router-link>
      </div>
      <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">#</th>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Nom</th>
              <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Téléphone</th>
              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Favori</th>
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white">
            <template v-for="customer in customers" :key="customer.id">
              <tr>
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">
                  {{ customer.id }}
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                  {{ customer.name }}
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm">
                  {{ customer.telephone_number }}
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm">
                  <span class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20"
                      fill="currentColor" v-show="customer.is_favorite">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20"
                      fill="currentColor" v-show="!customer.is_favorite">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd" />
                    </svg>
                  </span>
                </td>
                <td class="py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                  <div class="inline-block text-left" x-data="{ menu: false }">
                    <button x-on:click="menu = ! menu" type="button"
                      class="flex items-center text-gray-400 hover:text-gray-600 focus:outline-none" id="menu-button"
                      aria-expanded="true" aria-haspopup="true">
                      <span class="sr-only"></span>
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="true">
                        <path
                          d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                      </svg>
                    </button>
                    <div x-show="menu" x-on:click.away="menu = false"
                      class="origin-top-right absolute right-32 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                      role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                      <div class="" role="none">
                        <a href="#"
                          class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm"
                          role="menuitem" tabindex="-1" id="menu-item-0">
                          Editer
                        </a>
                      </div>
                      <div class="" role="none">
                        <a href="#"
                          class="text-gray-500 font-medium hover:text-gray-900 hover:bg-gray-50 block px-4 py-2 text-sm"
                          role="menuitem" tabindex="-1" id="menu-item-0">
                          Supprimer
                        </a>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </template>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from 'vue';
import useCustomers from '../services/customerservices.js'

export default {
  setup() {
    const { customers, getCustomers } = useCustomers();

    onMounted(getCustomers());

    return {
      customers
    };
  }
}
</script>

<style lang="scss" scoped>

</style>