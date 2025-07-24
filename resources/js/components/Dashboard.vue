<template>
  <div>
    <!-- Static sidebar for desktop -->
    <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
      <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4">
        <div class="flex h-16 shrink-0 items-center">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
        </div>
        <nav class="flex flex-1 flex-col">
          <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
              <ul role="list" class="-mx-2 space-y-1">
                <li v-for="item in navigation" :key="item.name">
                  <a :href="item.href" :class="[item.current ? 'bg-gray-800 text-white' : 'text-gray-400 hover:text-white hover:bg-gray-800', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                    <component :is="item.icon" class="h-6 w-6 shrink-0" aria-hidden="true" />
                    {{ item.name }}
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="lg:pl-72">
      <main class="py-10">
        <div class="px-4 sm:px-6 lg:px-8">
          <component :is="dashboardComponent"></component>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import SuperAdminDashboard from './dashboards/SuperAdminDashboard.vue';
import HrdDashboard from './dashboards/HrdDashboard.vue';
import ManagerDashboard from './dashboards/ManagerDashboard.vue';
import EmployeeDashboard from './dashboards/EmployeeDashboard.vue';
import FinanceDashboard from './dashboards/FinanceDashboard.vue';
import {
  ChartBarSquareIcon,
  Cog6ToothIcon,
  FolderIcon,
  GlobeAltIcon,
  ServerIcon,
  SignalIcon,
} from '@heroicons/vue/24/outline'


const navigation = [
  { name: 'Dashboard', href: '#', icon: FolderIcon, current: true },
  { name: 'Employees', href: '#', icon: ServerIcon, current: false },
  { name: 'Attendance', href: '#', icon: SignalIcon, current: false },
  { name: 'Leaves', href: '#', icon: GlobeAltIcon, current: false },
  { name: 'Payroll', href: '#', icon: ChartBarSquareIcon, current: false },
  { name: 'Settings', href: '#', icon: Cog6ToothIcon, current: false },
]

export default {
  name: "Dashboard",
  props: {
    user: {
      type: Object,
      required: true,
    }
  },
  components: {
    SuperAdminDashboard,
    HrdDashboard,
    ManagerDashboard,
    EmployeeDashboard,
    FinanceDashboard,
  },
  setup() {
    return {
      navigation,
    }
  },
  computed: {
    dashboardComponent() {
      if (this.user.roles.some(role => role.name === 'Super Admin')) {
        return 'SuperAdminDashboard';
      }
      if (this.user.roles.some(role => role.name === 'HRD')) {
        return 'HrdDashboard';
      }
      if (this.user.roles.some(role => role.name === 'Manager')) {
        return 'ManagerDashboard';
      }
      if (this.user.roles.some(role => role.name === 'Finance')) {
        return 'FinanceDashboard';
      }
      return 'EmployeeDashboard';
    }
  }
};
</script>
