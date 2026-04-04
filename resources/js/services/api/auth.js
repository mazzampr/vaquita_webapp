import apiClient from './client';

function normalizeError(error, fallbackMessage = 'Terjadi kesalahan server, coba lagi.') {
    if (!error.response) {
        return {
            success: false,
            message: 'Tidak dapat terhubung ke server.',
            errors: {},
            status: 0,
        };
    }

    const { data, status } = error.response;

    return {
        success: false,
        message: data?.message ?? fallbackMessage,
        errors: data?.errors ?? {},
        status,
    };
}

export async function loginRequest(payload) {
    try {
        const { data } = await apiClient.post('/auth/login', payload);
        return data;
    } catch (error) {
        return normalizeError(error);
    }
}

export async function meRequest() {
    try {
        const { data } = await apiClient.get('/auth/me');
        return data;
    } catch (error) {
        return normalizeError(error, 'Sesi login tidak valid.');
    }
}

export async function logoutRequest() {
    try {
        const { data } = await apiClient.post('/auth/logout');
        return data;
    } catch (error) {
        return normalizeError(error);
    }
}
