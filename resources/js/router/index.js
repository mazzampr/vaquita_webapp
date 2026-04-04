import { createRouter, createWebHistory } from 'vue-router';
import { useAuthStore } from '../stores/auth';
import LandingPage from '../pages/LandingPage.vue';
import LoginPage from '../pages/LoginPage.vue';
import PortalPage from '../pages/PortalPage.vue';

const routes = [
    {
        path: '/',
        name: 'landing',
        component: LandingPage,
        meta: { guest: true },
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage,
        meta: { guest: true },
    },
    {
        path: '/portal',
        name: 'portal',
        component: PortalPage,
        meta: { requiresAuth: true },
    },
    {
        path: '/portal/:role',
        name: 'portal-role',
        component: PortalPage,
        meta: { requiresAuth: true },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to) => {
    const authStore = useAuthStore();

    if (!authStore.isAuthenticated && authStore.authToken) {
        await authStore.fetchMe();
    }

    if (to.meta.requiresAuth && !authStore.isAuthenticated) {
        return { name: 'login', query: { redirect: to.fullPath } };
    }

    if (to.meta.guest && authStore.isAuthenticated) {
        return authStore.getRoleRoute(authStore.authUser?.role);
    }

    return true;
});

export default router;
