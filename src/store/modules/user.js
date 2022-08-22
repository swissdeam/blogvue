import axios from "@/utils/axios";
import router from "@/router";


const user = {
    state: {
        login: {},
        register: {},
        logout: {},
        token_is_admin: {},
        admin: {},
        user_info:{},
        create_post:{},
        show_post:{},
        admin_show_post:{},
        search_show_post:{},
        delete_post:{},
        delete_user:{},
        admin_delete_post:{},
        feed_show_post:{},


    },
    actions: {
        LOGIN: async ({commit, dispatch}, {email, password}) => {
                axios.post('/api/user/login', {email, password})
                    .then(response => {
                        console.log(response, "логин");
                        localStorage.setItem('x_xsrf_token', response.data.Token.plainTextToken)
                        localStorage.setItem('is admin', response.data.is_admin)
                        localStorage.setItem('name', response.data.name)
                        dispatch("TOKEN_IS_ADMIN")
                        commit("updateLogin", response.data)
                        console.log(response, "логин")
                        router.push({name: 'BlogPage'})
                    })
                    .catch(err => {
                        console.log(err)
                        console.log(err.response)
                    })
        },
        REGISTER: async ({commit, dispatch}, {name, email, password, password_confirmation, is_admin}) => {
                    axios.post('/api/user/register', {name, email, password, password_confirmation, is_admin})
                        .then(res => {
                            localStorage.setItem('x_xsrf_token', res.data.Token.plainTextToken)
                            console.log(res.data)
                            if (res.data.is_admin) {
                                res.data.is_admin = 1;
                            } else {
                                res.data.is_admin = 0;
                            }
                            localStorage.setItem('name', res.data.name)
                            localStorage.setItem('is admin', res.data.is_admin)
                            dispatch("TOKEN_IS_ADMIN")
                            commit("updateRegister", res.data)
                            router.push({name: 'BlogPage'})
                        })
        },
        TOKEN_IS_ADMIN: ({commit}) => {
            const token = localStorage.getItem('x_xsrf_token')
            const is_admin = localStorage.getItem('is admin')
            const name = localStorage.getItem('name')
            commit("updateTokenIsAdmin", {token, is_admin, name})
        },
        LOGOUT: async ({commit, dispatch}) => {
            await axios.post('/api/logout')
                .then(() => {
                    localStorage.removeItem('x_xsrf_token')
                    localStorage.removeItem('is admin')
                    localStorage.removeItem('name')
                    router.push({name: 'LoginPage'})
                    commit("updateLogout", "success")
                    dispatch("TOKEN_IS_ADMIN")
                })

        },
        // CHECK_ADMIN: ({commit, dispatch}) => {
        //     axios.get('/api/admin/check')
        //         .then(res => {
        //             commit("updateCheckAdmin", res.data)
        //             if (res.data === 1) {
        //                 dispatch("ADMIN")
        //             }
        //             console.log(res.data, "vuex")
        //         }).catch(error => {
        //         console.log(error)
        //     })
        // },
        ADMIN: ({commit}) => {
            axios.get('/api/admin')
                .then(res => {
                    commit("updateAdmin", res.data)
                }).catch(error => {
                console.log(error)
            })
        },
        USER_INFO: ({commit}) => {
            axios.get('/api/user/home')
                .then(res => {
                    commit("updateUserInfo", res.data)
                }).catch(error => {
                console.log(error)
            })
        },
        CREATE_POST: async ({commit}, {user_id ,title, body}) => {
            axios.post('/api/posts/create',   {user_id, title, body} )
                .then(res => {
                    commit("updateCreatePost", res.data)
                    router.push({name: 'BlogPage'})
                }).catch(error => {
                console.log(error)
            })
        },
        SHOW_POST: async ({commit}) => {
            console.log(123)
            axios.get('/api/posts')
                .then(res => {
                    commit("updateShowPost", res.data)
                }).catch(error => {
                console.log(error)
            })
        },
        DELETE_POST: async ({commit, dispatch}, {post_id}) => {
            axios.delete(`/api/user/blog/${post_id}`)
                .then(res => {
                    commit("updateDeletePost", res.data)
                    dispatch("SHOW_POST")
                }).catch(error => {
                console.log(error)
            })
        },

        ADMIN_DELETE_POST: async ({commit, dispatch}, {post_id, user_id}) => {
            axios.delete(`/api/admin/${user_id}/posts/${post_id}`)
                .then(res => {
                    commit("updateAdminDeletePost", res.data)
                    dispatch(`ADMIN_SHOW_POST`, {user_id})
                }).catch(error => {
                console.log(error)
            })
        },
        DELETE_USER: async ({commit, dispatch}, {user_id}) => {
            axios.delete(`/api/admin/${user_id}`)
                .then(res => {
                    commit("updateDeleteUser", res.data)
                    dispatch("ADMIN")
                }).catch(error => {
                console.log(error)
            })
        },

        ADMIN_SHOW_POST: async ({commit}, {user_id}) => {
            console.log(123)
            axios.get(`/api/admin/${user_id}/posts`)
                .then(res => {
                    commit("updateAdminShowPost", res.data)
                    console.log(res,"getAdminShowPost")
                    router.push({path: `/admin/${user_id}/posts`})
                }).catch(error => {
                console.log(error)
            })
        },
        SEARCH_SHOW_POST: async ({commit}, {email}) => {
            console.log(123)
            axios.get(`/api/user/search/${email}/posts`)
                .then(res => {
                    commit("updateSearchShowPost", res.data)
                    router.push({path: `/search/${email}/posts`})
                }).catch(error => {
                console.log(error)
            })
        },
        FEED_SHOW_POST: async ({commit, dispatch}) => {
            console.log(123)
            axios.get(`/api/feed`)
                .then(res => {
                    commit("updateFeedPost", res.data)

                    dispatch(`FEED_POST_OWNER`)
                }).catch(error => {
                console.log(error)
            })
        },





    },
    getters: {
        getLogin: (state) => state.login,
        getRegister: (state) => state.register,
        getLogout: (state) => state.logout,
        getTokenIsAdmin: (state) => state.token_is_admin,
        getAdmin: (state) => state.admin,
        getUserInfo: (state) => state.user_info,
        getCreatePost: (state) => state.create_post,
        getShowPost: (state) => state.show_post,
        getAdminShowPost: (state) => state.admin_show_post,
        getSearchShowPost: (state) => state.search_show_post,
        getDeletePost: (state)=>state.delete_post,
        getDeleteUser: (state)=>state.delete_user,
        getAdminDeletePost: (state)=>state.admin_delete_post,
        getFeedPost: (state)=>state.feed_show_post,

    },
    mutations: {
        updateLogin: (state, payload) => (state.login = payload),
        updateRegister: (state, payload) => (state.register = payload),
        updateTokenIsAdmin: (state, payload) => (state.token_is_admin = payload),
        updateLogout: (state, payload) => (state.logout = payload),
        updateAdmin: (state, payload) => (state.admin = payload),
        updateUserInfo: (state, payload) => (state.user_info = payload),
        updateCreatePost: (state, payload) => (state.create_post= payload),
        updateShowPost: (state, payload) => (state.show_post= payload),
        updateAdminShowPost: (state, payload) => (state.admin_show_post= payload),
        updateSearchShowPost: (state, payload) => (state.search_show_post= payload),
        updateDeletePost: (state, payload) => (state.delete_post= payload),
        updateAdminDeletePost: (state, payload) => (state.delete_post= payload),
        updateDeleteUser: (state, payload) => (state.delete_user= payload),
        updateFeedPost: (state, payload) => (state.feed_show_post= payload),


    }
}
export default user;
