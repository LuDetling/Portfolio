<template>
    <section id="contact">
        <h2>Me contacter</h2>
        <div class="content-contact">

            <div class="left-contact">
                <Form @submit="submitForm($event)" :validation-schema="schema">
                    <div class="email">
                        <label for="email">Email :</label>
                        <Field type="email" name="email" v-model="email" required />
                        <ErrorMessage name="email" />
                    </div>
                    <!-- <div class="formule">
                        <label for="formule">Formule : </label>
                        <Field name="formule" as="select" v-model="formule.formule" required>
                            <option value>Choisir une formule</option>
                            <option value=1>Développement Web Basique</option>
                            <option value=2>Application Web Avancée</option>
                            <option value=3>Développement Complet d'une Plateforme SaaS</option>
                            <option value="other">Autres</option>
                        </Field>
                        <ErrorMessage name="formule" />
                    </div> -->
                    <div class="message">
                        <label for="message">Message :</label>
                        <Field as="textarea" name="message" v-model="message" required />
                        <ErrorMessage name="message" />
                    </div>
                    <button type="submit" class="btn">Envoyer</button>
                </Form>
            </div>
            <div class="right-contact">
                <div class="email">
                    <div>Mon email :</div>
                    <a href="mailto:lucas.detling@gmail.com">lucas.detling@gmail.com</a>
                </div>
                <div class="tel">
                    <div>Mon téléphone</div>
                    <a href="tel:+33668372876">+33 6 68 37 28 76</a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useFormuleStore } from '@/stores/formule';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { ref } from "vue";
const email = ref("");
const message = ref("");
const formuleSelected = ref()
const formule = useFormuleStore()
const required = "Ce champ est requis";

const schema = yup.object({
    email: yup.string().required(required).email("Ceci n'est pas une adresse email"),
    message: yup.string().required(required).min(5, "Votre message dois faire minimum 5 caractères"),
    formule: yup.string().required(required)
})

const submitForm = async (el) => {
    const formules = document.querySelectorAll('select option')
    if (parseInt(el.formule)) {
        formuleSelected.value = formules[el.formule].textContent;
    }

    try {
        const response = await fetch('https://127.0.0.1:8000/api/contact', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify(el)
        })

        const result = await response.json();

        formuleSelected.value = ""
        message.value = "";
        console.log(result);

    } catch (error) {
        console.log(error)
    }

}

</script>

<style lang="scss" scoped>
.content-contact {
    display: flex;
    align-items: stretch;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 5rem;

    .right-contact {

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

form {
    div {

        margin-bottom: 1.5rem;

        span {
            display: block;
            margin-top: .3rem;
        }
    }
}

input,
select {
    width: 350px;
    border-radius: 5px;
    padding: .5rem;
    box-sizing: border-box;
    font-size: 1rem;
}

textarea {
    box-sizing: border-box;
    padding: .5rem;
    min-width: 350px;
    max-width: 350px;
    height: 100px;
    border-radius: 5px;
    font-size: 1rem;
}
</style>