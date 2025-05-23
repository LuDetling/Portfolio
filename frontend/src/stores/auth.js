import { ref } from 'vue'
import { defineStore } from 'pinia'
import { jwtDecode } from "jwt-decode";
import { useCookies } from "vue3-cookies";
import router from '@/router';
const { cookies } = useCookies();

export const useAuthStore = defineStore('auth', () => {

    const user = ref(null)
    
    function login(){
        user.value = cookies.get('token');
    }

    function logout() {
        user.value = null
        cookies.remove('token')
        router.push({ name: 'home' })
    }

    if (!cookies.get('token')) {
        user.value = null
    } else {
        const token = cookies.get('token');
        const decoded = jwtDecode(token);
        user.value = decoded;
    }

    return { user, logout, login }
})
