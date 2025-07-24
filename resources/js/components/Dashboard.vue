<template>
  <div>
    <component :is="dashboardComponent"></component>
  </div>
</template>

<script>
import SuperAdminDashboard from './dashboards/SuperAdminDashboard.vue';
import HrdDashboard from './dashboards/HrdDashboard.vue';
import ManagerDashboard from './dashboards/ManagerDashboard.vue';
import EmployeeDashboard from './dashboards/EmployeeDashboard.vue';
import FinanceDashboard from './dashboards/FinanceDashboard.vue';

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
