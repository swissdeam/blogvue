<!DOCTYPE html>

<h2>Users List</h2>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Posts</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    {{--    <tr v-for="person in this.getAdmin" v-bind:key="person.id">--}}
    {{--        <th scope="row">{{ person.id }}</th>--}}
    {{--        <td>{{ person.name }}</td>--}}
    {{--        <td>{{ person.email }}</td>--}}
    {{--        <td v-if="person.is_admin===1">admin</td>--}}
    {{--        <td v-else>user</td>--}}
    {{--        <td>--}}
    {{--            <router-link :to="{ name: 'UsersPosts', params: { user_id: person.id }}"--}}
    {{--                         v-if="person.id !== getUserInfo.user.id" v-on:click="ADMIN_SHOW_POST({user_id: person.id})"--}}
    {{--                         class="btn btn-success">--}}
    {{--                User's Posts--}}
    {{--            </router-link>--}}
    {{--        </td>--}}
    {{--        <td>--}}
    {{--            <button v-if="person.id !== getUserInfo.user.id" v-on:click="DELETE_USER({user_id: person.id})"--}}
    {{--                    class="btn btn-outline-danger">--}}
    {{--                Delete user--}}
    {{--            </button>--}}
    {{--        </td>--}}
    {{--    </tr>--}}
    </tbody>
</table>
