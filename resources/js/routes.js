import Dashboard from './components/Dashboard.vue';
import GPSTracker from './pages/vehicle/Gps.vue';
import VehicleInformation from './pages/vehicle/Information.vue';
import StudentInformation from './pages/student/Information.vue';
import StudentEntry from './pages/student/Entry.vue';
import UserList from './pages/users/List.vue';
import UpdateSetting from './pages/settings/UpdateSetting.vue';
import UpdateProfile from './pages/profile/UpdateProfile.vue';
import Login from './pages/auth/Login.vue';

export default [
    {
        path: '/login',
        name: 'admin.login',
        component: Login,
    },

    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: Dashboard,
    },

    {
        path: '/admin/gps',
        name: 'admin.gps',
        component: GPSTracker,
    },

    {
        path: '/admin/vehicle-info',
        name: 'admin.vehicle-info',
        component: VehicleInformation,
    },

    {
        path: '/admin/student-info',
        name: 'admin.student-info',
        component: StudentInformation,
    },

    {
        path: '/admin/student-entry',
        name: 'admin.student-entry',
        component: StudentEntry,
    },

    {
        path: '/admin/user-list',
        name: 'admin.user-list',
        component: UserList,
    },

    {
        path: '/admin/profile',
        name: 'admin.profile',
        component: UpdateProfile,
    },

    {
        path: '/admin/setting',
        name: 'admin.setting',
        component: UpdateSetting
    },


]
