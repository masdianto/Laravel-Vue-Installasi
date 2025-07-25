<template>
  <div class="card">
    <div class="card-header pb-0">
      <h6>Employees</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hire Date</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <td>
                <div class="d-flex px-2 py-1">
                  <div>
                    <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                  </div>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ employee.name }}</h6>
                    <p class="text-xs text-secondary mb-0">{{ employee.email }}</p>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{ employee.position }}</p>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold">{{ employee.hire_date }}</span>
              </td>
              <td class="align-middle">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                  Edit
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "EmployeeManagement",
  data() {
    return {
      employees: [],
    };
  },
  methods: {
    getEmployees() {
      axios.get('/api/employees')
        .then(response => {
          this.employees = response.data.data;
        });
    },
  },
  mounted() {
    this.getEmployees();
  }
};
</script>
