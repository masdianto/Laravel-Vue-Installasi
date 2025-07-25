<template>
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-12">
            <div class="card mb-4">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                      <h5 class="font-weight-bolder mb-0">
                        $53,000
                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Other cards go here -->
        </div>
        <div class="row mt-4">
          <div class="col-lg-12">
            <component :is="dashboardComponent"></component>
          </div>
        </div>
      </div>
    </div>
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
