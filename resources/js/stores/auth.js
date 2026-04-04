import { defineStore } from 'pinia';
import { loginRequest, logoutRequest, meRequest } from '../services/api/auth';

const TOKEN_KEY = 'sklr_auth_token';

const roleRouteMap = {
    super_admin: { name: 'portal-role', params: { role: 'super-admin' } },
    admin: { name: 'portal-role', params: { role: 'admin' } },
    coach: { name: 'portal-role', params: { role: 'coach' } },
    student: { name: 'portal-role', params: { role: 'student' } },
};

export const useAuthStore = defineStore('auth', {
    state: () => ({
        authUser: null,
        authToken: localStorage.getItem(TOKEN_KEY),
        loadingLogin: false,
        loginError: '',
    }),

    getters: {
        isAuthenticated: (state) => Boolean(state.authToken && state.authUser),
    },

    actions: {
        getRoleRoute(role) {
            return roleRouteMap[role] ?? { name: 'portal' };
        },

        setToken(token) {
            this.authToken = token;

            if (token) {
                localStorage.setItem(TOKEN_KEY, token);
                return;
            }

            localStorage.removeItem(TOKEN_KEY);
        },

        async login(payload) {
            this.loadingLogin = true;
            this.loginError = '';

            if (!window.navigator.onLine) {
                this.loadingLogin = false;
                this.loginError = 'Koneksi internet tidak tersedia. Coba lagi saat online.';
                return { success: false };
            }

            const response = await loginRequest(payload);

            if (!response.success) {
                this.loadingLogin = false;
                this.loginError = response.message;
                return response;
            }

            this.setToken(response.data.access_token);
            this.authUser = response.data.user;
            this.loadingLogin = false;

            return response;
        },

        async fetchMe() {
            if (!this.authToken) {
                return;
            }

            const response = await meRequest();

            if (!response.success) {
                this.authUser = null;
                this.setToken(null);
                return;
            }

            this.authUser = response.data;
        },

        async logout() {
            if (this.authToken) {
                await logoutRequest();
            }

            this.authUser = null;
            this.setToken(null);
            this.loginError = '';
        },
    },
});
