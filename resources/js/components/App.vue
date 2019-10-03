<template>
  <div class="h-screen bg-white">
    <div class="flex">
      <div class="pl-6 bg-gray-200 w-48 h-screen border-r-2 border-gray-400">
        <nav class="pt-4">
          <router-link to="/">
            <h1 class="fill-current text-4xl text-blue-600 w-12 h-12">Payday</h1>
          </router-link>

          <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Create</p>

          <router-link
            to="/employer/create"
            class="flex items-center py-2 hover:text-blue-600 text-sm"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-briefcase"
            >
              <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
            </svg>
            <div class="tracking-wide pl-3">New Employer</div>
          </router-link>

          <router-link
            to="/employee/create"
            class="flex items-center py-2 hover:text-blue-600 text-sm"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-users"
            >
              <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
              <circle cx="9" cy="7" r="4" />
              <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
              <path d="M16 3.13a4 4 0 0 1 0 7.75" />
            </svg>
            <div class="tracking-wide pl-3">New Employee</div>
          </router-link>

          <router-link to="/transaction" class="flex items-center py-2 hover:text-blue-600 text-sm">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-dollar-sign"
            >
              <line x1="12" y1="1" x2="12" y2="23" />
              <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
            </svg>
            <div class="tracking-wide pl-3">Transaction</div>
          </router-link>

          <router-link to="/admin" class="flex items-center py-2 hover:text-blue-600 text-sm">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-sliders"
            >
              <line x1="4" y1="21" x2="4" y2="14" />
              <line x1="4" y1="10" x2="4" y2="3" />
              <line x1="12" y1="21" x2="12" y2="12" />
              <line x1="12" y1="8" x2="12" y2="3" />
              <line x1="20" y1="21" x2="20" y2="16" />
              <line x1="20" y1="12" x2="20" y2="3" />
              <line x1="1" y1="14" x2="7" y2="14" />
              <line x1="9" y1="8" x2="15" y2="8" />
              <line x1="17" y1="16" x2="23" y2="16" />
            </svg>
            <div class="tracking-wide pl-3">Admin Functions</div>
          </router-link>

          <p class="pt-12 text-gray-500 text-xs uppercase font-bold">Settings</p>

          <router-link to="/logout" class="flex items-center py-2 hover:text-blue-600 text-sm">
            <svg viewBox="0 0 24 24" class="fill-current text-blue-600 w-5 h-5">
              <path
                d="M21 3h-3.8c-.7 0-1.3-.6-1.3-1.3S16.5.4 17.2.4h5.1c.7 0 1.3.6 1.3 1.3v20.5c0 .7-.6 1.3-1.3 1.3h-5.1c-.7 0-1.3-.6-1.3-1.3 0-.7.6-1.3 1.3-1.3H21V3zm-6.9 7.7L8.6 5.2c-.5-.5-.6-1.3-.1-1.8s1.3-.5 1.8 0l7.7 7.7c.8.8.2 2.2-.9 2.2H1.8c-.7 0-1.3-.6-1.3-1.3 0-.7.6-1.3 1.3-1.3h12.3zm-1.6 4.8c.5-.5 1.3-.4 1.8.1s.4 1.3-.1 1.8l-3.8 3.2c-.5.5-1.3.4-1.8-.1-.6-.5-.5-1.3 0-1.7l3.9-3.3z"
              />
            </svg>
            <div class="tracking-wide pl-3">Logout</div>
          </router-link>
        </nav>
      </div>
      <div class="flex flex-col flex-1 h-screen overflow-y-hidden">
        <div class="h-16 px-6 border-b border-gray-400 flex items-center justify-between">
          <div class="text-3xl text-green-700 uppercase">{{ title }}</div>

          <div class="flex items-center">
            <SearchBar />
            <UserCircle :name="user.name" />
          </div>
        </div>

        <div class="flex flex-col overflow-y-hidden flex-1">
          <router-view class="p-6 overflow-x-hidden"></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import UserCircle from "./UserCircle";
import SearchBar from "../components/SearchBar";

export default {
  name: "App",

  props: ["user"],

  components: {
    UserCircle,
    SearchBar
  },

  created() {
    this.title = this.$route.meta.title;

    window.axios.interceptors.request.use(config => {
      if (config.method === "get") {
        config.url = config.url + "?api_token=" + this.user.api_token;
      } else {
        config.data = {
          ...config.data,
          api_token: this.user.api_token
        };
      }
      return config;
    });
  },

  data: function() {
    return {
      title: ""
    };
  },

  watch: {
    $route(to, from) {
      this.title = to.meta.title;
    },

    title() {
      document.title = this.title + " | PayDay";
    }
  }
};
</script>

<style scoped>
</style>
