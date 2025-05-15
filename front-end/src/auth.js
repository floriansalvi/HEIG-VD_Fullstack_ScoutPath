import { ref } from "vue";
import axiosClient from "./axios";

const user = ref(null)
const isAuthenticated = ref(false)

async function fetchUser() {
    try {
        const { data } = await axiosClient.get('/api/user')
        user.value = data
        isAuthenticated.value = true
    } catch (error) {
        user.value = null
        isAuthenticated.value = false
    }
}

async function logout() {
    await axiosClient.post('/logout')
    user.value = null
    isAuthenticated.value = false
}

export default {
    user,
    isAuthenticated,
    fetchUser,
    logout
}