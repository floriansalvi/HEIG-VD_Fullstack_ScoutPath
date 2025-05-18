import { ref } from "vue";
import axiosClient from "./axios";

const user = ref(null)
const isAuthenticated = ref(false)

/**
 * Fetches the currently authenticated user data from the API.
 * @returns {Promise<void>}
 */
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

/**
 * Logs in a user with the given email and password.
 * @param {string} email - The user's email.
 * @param {string} password - The user's password.
 * @returns {Promise<void>}
 */
async function login(email, password) {
    await axiosClient.get('/sanctum/csrf-cookie')
    await axiosClient.post('/login', { email, password })
    await fetchUser()
}

/**
 * Logs out the current user.
 * @returns {Promise<void>}
 */
async function logout() {
    await axiosClient.post('/logout')
    user.value = null
    isAuthenticated.value = false
}

export default {
    user,
    isAuthenticated,
    fetchUser,
    login,
    logout
}