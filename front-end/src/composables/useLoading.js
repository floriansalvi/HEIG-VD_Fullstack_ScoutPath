import { ref } from "vue";


/**
 * Custom composable to manage a loading state.
 * 
 * @returns {{
 *   loading: Ref<boolean>,
 *   withLoading: (fn: () => Promise<void>) => Promise<void>
 * }}
 */
export function useLoading() {
    const loading = ref(false)

    /**
     * Executes an async function while automatically toggling the loading state.
     * 
     * @param {() => Promise<void>} fn - The asynchronous function to execute
     * @returns {Promise<void>}
     */
    const withLoading = async (fn) => {
        loading.value = true
        try {
            await fn()
        } finally {
            loading.value = false
        }
    }
    return { loading, withLoading}
}