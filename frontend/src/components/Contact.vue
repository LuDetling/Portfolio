<template>
    <section id="contact">
        <div class="left-contact">
            <h2>Me contacter</h2>
            <Form @submit="submitForm" :validation-schema="schema">
                <div class="email">
                    <label for="email">Email :</label>
                    <Field type="email" name="email" v-model="email" required />
                    <ErrorMessage name="email" />
                </div>
                <div class="message">
                    <label for="message">Message :</label>
                    <Field as="textarea" name="message" v-model="message" required />
                    <ErrorMessage name="message" />
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </Form>
        </div>
        <div class="right-contact">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d86428.84640364951!2d0.6125415500158703!3d47.39435568768656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fcd5b34a979a55%3A0x40dc8d705388430!2sTours%2C%20France!5e0!3m2!1sfr!2suk!4v1728900996156!5m2!1sfr!2suk"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</template>

<script setup>
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { ref } from "vue";
const WEB3FORMS_ACCESS_KEY = "20ffa503-8922-4884-b1e9-7760f0a16ee8";
const email = ref("")
const message = ref("")
const required = "Ce champ est requis";

const schema = yup.object({
    email: yup.string().required(required).email("Ceci n'est pas une adresse email"),
    message: yup.string().required(required).min(5, "Votre message dois faire minimum 5 caractères")
})

const submitForm = async () => {
    const response = await fetch("https://api.web3forms.com/submit", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
        body: JSON.stringify({
            access_key: WEB3FORMS_ACCESS_KEY,
            email: email.value,
            message: message.value,
        }),
    });
    const result = await response.json();
    if (result.success) {
        message.value = "";
        console.log(result);
    }
}

</script>

<style lang="scss" scoped>
#contact {
    display: flex;
    align-items: stretch;
    flex-wrap: wrap;
    justify-content: space-between;

    .left-contact {
        min-width: 400px;
    }

    .right-contact {
        min-width: 400px;

        iframe {
            height: 100%;
            width: 100%;
            border-radius: 5px;
        }
    }
}

h2 {
    font-size: 1.5rem;
    margin-bottom: 2rem;
}

label {
    display: block;
    margin-bottom: .5rem;
}

.email,
.message {
    margin-bottom: 1.5rem;

    span {
        display: block;
        margin-top: .3rem;
    }
}

input {
    min-width: 300px;
    max-width: 300px;
    border-radius: 5px;
    padding: .5rem;
}

textarea {
    padding: .5rem;
    /* width: 300px; */
    min-width: 300px;
    max-width: 300px;
    height: 100px;
    border-radius: 5px;
}
</style>