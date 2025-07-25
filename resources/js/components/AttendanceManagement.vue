<template>
    <div class="card mt-4">
      <div class="card-header pb-0">
        <h6>Attendance Records</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employee</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Check In</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Check Out</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="attendance in attendances" :key="attendance.id">
                <td>
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ attendance.employee.name }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{ attendance.date }}</p>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ attendance.check_in }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ attendance.check_out }}</span>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">{{ attendance.status }}</span>
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
    name: "AttendanceManagement",
    data() {
      return {
        attendances: [],
      };
    },
    methods: {
      getAttendances() {
        axios.get('/api/attendances')
          .then(response => {
            this.attendances = response.data;
          });
      },
    },
    mounted() {
      this.getAttendances();
    }
  };
  </script>
