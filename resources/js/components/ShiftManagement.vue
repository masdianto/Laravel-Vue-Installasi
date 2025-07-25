<template>
  <div class="card">
    <div class="card-header pb-0">
      <h6>Shifts</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Shift</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="shift in shifts" :key="shift.id">
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ shift.name }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{ shift.start_time }} - {{ shift.end_time }}</p>
              </td>
              <td class="align-middle">
                <a href="javascript:;" @click="editShift(shift)" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit shift">
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
  name: "ShiftManagement",
  data() {
    return {
      shifts: [],
      editingShift: null,
    };
  },
  methods: {
    getShifts() {
      axios.get('/api/shifts')
        .then(response => {
          this.shifts = response.data;
        });
    },
    editShift(shift) {
      this.editingShift = { ...shift };
    },
  },
  mounted() {
    this.getShifts();
  }
};
</script>
