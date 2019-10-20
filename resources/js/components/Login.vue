<template>
    <b-container>
        <b-row>
            <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                <b-form-group
                        id="input-group-1"
                        label="Email address:"
                        label-for="input-1"
                        description="We'll never share your email with anyone else."
                >
                    <b-form-input
                            id="input-1"
                            v-model="form.email"
                            type="email"
                            required
                            placeholder="Enter email"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-2" label="Password:" label-for="input-2">
                    <b-form-input
                            id="input-2"
                            v-model="form.password"
                            required
                            placeholder="Password"
                            type="password"
                    ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-4">
                    <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
                        <b-form-checkbox value="me">Se souvenir</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>

                <b-button type="submit" variant="secondary">Se connecter</b-button>
            </b-form>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return{
                form: {
                    email: '',
                    password: '',
                    checked: []
                },
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            }
        }
    }
</script>

<style scoped>

</style>