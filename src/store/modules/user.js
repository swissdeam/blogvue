import axios from "@/utils/axios";
import router from "@/router";

const user = {
    state: {
        login: {},
        register: {},
        logout: {},
        token_is_admin: {},
    },
    actions: {
        LOGIN: async ({commit, dispatch}, {email, password}) => {
            await axios.get('/sanctum/csrf-cookie').then(() => {
                axios.post('/api/user/login', {email, password})
                    .then(response => {
                        console.log(response, "логин");
                        localStorage.setItem('x_xsrf_token', response.data.Token.plainTextToken)
                        localStorage.setItem('is admin', response.data.is_admin)
                        dispatch("TOKEN_IS_ADMIN")
                        commit("updateLogin", response.data)
                        console.log(response, "логин")
                        router.push({name: 'BlogPage'})
                    })
                    .catch(err => {
                        console.log(err)
                        console.log(err.response)
                    })
            })
        },
        REGISTER: async ({commit, dispatch}, {name, email, password, password_confirmation, is_admin}) => {
            await axios.get('/sanctum/csrf-cookie')
                .then(() => {
                    axios.post('/api/user/register', {name, email, password, password_confirmation, is_admin})
                        .then(res => {
                            localStorage.setItem('x_xsrf_token', res.data.Token.plainTextToken)
                            console.log(res.data)
                            if (res.data.is_admin) {
                                res.data.is_admin = 1;
                            } else {
                                res.data.is_admin = 0;
                            }
                            localStorage.setItem('is admin', res.data.is_admin)
                            dispatch("TOKEN_IS_ADMIN")
                            commit("updateRegister", res.data)
                            router.push({name: 'BlogPage'})
                        })
                })
        },
        TOKEN_IS_ADMIN: ({commit}) => {
            const token = localStorage.getItem('x_xsrf_token')
            const is_admin = localStorage.getItem('is admin')
            commit("updateTokenIsAdmin", {token, is_admin})
        },
        LOGOUT: async ({commit, dispatch}) => {
            axios.post('/api/logout')
                .then(() => {
                    localStorage.removeItem('x_xsrf_token')
                    localStorage.removeItem('is admin')
                    router.push({name: 'LoginPage'})
                    commit("updateLogout", "success")
                    dispatch("TOKEN_IS_ADMIN")
                })

        },
    },
    mutations: {
        updateLogin: (state, payload) => (state.login = payload),
        updateRegister: (state, payload) => (state.register = payload),
        updateTokenIsAdmin: (state, payload) => (state.token_is_admin = payload),
        updateLogout: (state, payload) => (state.logout = payload)

    },
    getters: {
        getLogin: (state) => state.login,
        getRegister: (state) => state.register,
        getLogout: (state) => state.logout,
        getTokenIsAdmin: (state) => state.token_is_admin
    }
}
export default user;
