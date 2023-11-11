<script setup>
import axios from "axios";
import { ref, onMounted, reactive, watch } from "vue";
import { debounce } from "lodash";
import { Bootstrap4Pagination } from "laravel-vue-pagination";
import { formatDate } from "../../helper.js";

const activitys = ref({ data: [] });
const searchQuery = ref(null);

const getActiviy = (page = 1) => {
  axios
    .get(`/api/activity-logs?page=${page}`, {
      params: {
        query: searchQuery.value,
      },
    })
    .then((response) => {
      activitys.value = response.data;
    });
};

watch(
  searchQuery,
  debounce(() => {
    getActiviy();
  }, 300)
);

onMounted(() => {
  getActiviy();
});
</script>

<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Activity Logs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Activity</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <div class="d-flex"></div>
        <div style="margin-bottom: 5px">
          <input
            type="text"
            v-model="searchQuery"
            class="form-control"
            placeholder="Search..."
          />
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr class="text-center">
                <th style="width: 10px">#</th>
                <th>Log Name</th>
                <th>Desription</th>
                <th>Properties</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody v-if="activitys.data.length > 0">
              <tr v-for="(activity, index) in activitys.data" :key="activity.id">
                <td class="text-center">{{ index + 1 }}</td>
                <td class="text-center">{{ activity.log_name }}</td>
                <td class="text-center">{{ activity.description }}</td>
                <td>
                  <pre>{{ activity.properties }}</pre>
                </td>
                <td class="text-center">{{ formatDate(activity.created_at) }}</td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="6" class="text-center">No results found...</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <Bootstrap4Pagination
        :data="activitys"
        :limit="2"
        keepLength="true"
        @pagination-change-page="getUsers"
      />
    </div>
  </div>
</template>
