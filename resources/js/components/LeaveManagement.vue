<template>
  <div class="card">
    <div class="card-header pb-0">
      <h6>Leave Requests</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dates</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="leave in leaves" :key="leave.id">
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ leave.employee.name }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{ leave.start_date }} to {{ leave.end_date }}</p>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm" :class="statusBadge(leave.status)">{{ leave.status }}</span>
              </td>
              <td class="align-middle">
                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit leave">
                  Manage
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
  name: "LeaveManagement",
  data() {
    return {
      leaves: [],
    };
  },
  methods: {
    getLeaves() {
      axios.get('/api/leaves')
        .then(response => {
          this.leaves = response.data;
        });
    },
    statusBadge(status) {
        const statusMap = {
            'approved': 'bg-gradient-success',
            'pending': 'bg-gradient-warning',
            'rejected': 'bg-gradient-danger',
        };
        return statusMap[status.toLowerCase()] || 'bg-gradient-secondary';
    }
  },
  mounted() {
    this.getLeaves();
  }
};
</script>
