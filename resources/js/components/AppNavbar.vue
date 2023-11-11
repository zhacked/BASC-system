<script setup>
import { useAuthUserStore } from "../stores/AuthUserStore";
import { useRouter } from "vue-router";
import { useSettingStore } from "../stores/SettingStore";

const router = useRouter();
const authUserStore = useAuthUserStore();
const settingStore = useSettingStore();

const logout = () => {
  axios.get("/api/users/logout").then((response) => {
    authUserStore.user.name = "";
    router.push("/login");
  });
};

const profile = () => {
  router.push("/admin/profile");
};
</script>

<template>
  <nav
    class="main-header navbar navbar-expand"
    :class="settingStore.theme === 'dark' ? 'navbar-dark' : 'navbar-light'"
  >
    <ul class="navbar-nav">
      <li class="nav-item" id="toggleMenuIcon">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"
          ><i class="fas fa-bars"></i
        ></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a @click.prevent="settingStore.changeTheme" href="#" class="nav-link">
          <i
            class="far"
            :class="settingStore.theme === 'dark' ? 'fa-moon' : 'fa-sun'"
          ></i>
        </a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- todo Logout button -->
      <li class="nav-item dropdown show">
        <a class="brand-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <img
            :src="authUserStore.user.avatar ?? '/assets/image/noimage.png'"
            class="img-circle elevation-2"
            alt="Image"
            style="max-width: 30px"
          />
        </a>
        <div
          class="dropdown-menu dropdown-menu-md dropdown-menu-right"
          style="padding-left: 3px"
        >
          <div class="row">
            <div class="col-6">
              <button
                type="button"
                class="btn-xs btn btn-block btn-primary"
                @click.prevent="profile"
              >
                <i class="nav-icon fa fa-user"></i> Profile
              </button>
            </div>
            <div class="col-6">
              <button
                type="button"
                class="btn-xs btn btn-block btn-danger"
                @click.prevent="logout"
              >
                <i class="nav-icon fa fa-power-off"></i> Logout
              </button>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </nav>
</template>
