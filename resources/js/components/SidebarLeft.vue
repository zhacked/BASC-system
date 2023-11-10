<script setup>
import { useAuthUserStore } from "../stores/AuthUserStore";
import { useRouter } from "vue-router";
import { useSettingStore } from "../stores/SettingStore";

const router = useRouter();
const authUserStore = useAuthUserStore();
const settingStore = useSettingStore();

const logout = () => {
  axios.post("/logout").then((response) => {
    authUserStore.user.name = "";
    router.push("/login");
  });
};
</script>

<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <img
        src="/assets/image/basc.ico"
        alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">{{
        settingStore.setting.app_name
      }}</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            :src="authUserStore.user.avatar"
            class="img-circle elevation-2"
            alt="Image"
          />
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ authUserStore.user.name }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <router-link to="/admin/dashboard" active-class="active" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </router-link>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bus"></i>
              <p>Vehicle <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview" style="display: none">
              <li class="nav-item">
                <router-link to="/admin/gps" active-class="active" class="nav-link">
                  <i class="nav-icon fa fa-map-marker"></i>
                  <p>GPS Tracker</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  to="/admin/vehicle-info"
                  active-class="active"
                  class="nav-link"
                >
                  <i class="nav-icon fa fa-car"></i>
                  <p>information</p>
                </router-link>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>Student <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview" style="display: none">
              <li class="nav-item">
                <router-link
                  to="/admin/student-info"
                  active-class="active"
                  class="nav-link"
                >
                  <i class="nav-icon fa fa-user-circle"></i>
                  <p>Record</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link
                  to="/admin/student-entry"
                  active-class="active"
                  class="nav-link"
                >
                  <i class="nav-icon fa fa-universal-access"></i>
                  <p>Entrance</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <router-link to="/admin/user-list" active-class="active" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>Users</p>
            </router-link>
          </li>

          <li class="nav-item">
            <router-link to="/admin/setting" active-class="active" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>Setting</p>
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
</template>
