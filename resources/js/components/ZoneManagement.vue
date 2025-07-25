<template>
  <div class="card mt-4">
    <div class="card-header pb-0">
      <h6>Zones</h6>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Zone</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Radius</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="zone in zones" :key="zone.id">
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ zone.name }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">Lat: {{ zone.latitude }}, Lng: {{ zone.longitude }}</p>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold">{{ zone.radius }}m</span>
              </td>
              <td class="align-middle">
                <a href="javascript:;" @click="editZone(zone)" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit zone">
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
  name: "ZoneManagement",
  data() {
    return {
      zones: [],
      editingZone: null,
    };
  },
  methods: {
    getZones() {
      axios.get('/api/zones')
        .then(response => {
          this.zones = response.data;
        });
    },
    editZone(zone) {
      this.editingZone = { ...zone };
    },
  },
  mounted() {
    this.getZones();
  }
};
</script>
