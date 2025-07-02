<template>
    <section id="contact">
        <div class="terminal-header terminal-header-contact">
            <h2>
                ~/Contact.vue
            </h2>
        </div>
        <div class="terminal-window terminal-window-contact">
            <div class="terminal-body terminal-window-contact">
                <div class="content-contact flex flex-col lg:flex-row gap-12">
                    <div class="left-contact w-full lg:w-2/3">
                        <p class="mb-8">
                            Si vous êtes à la recherche d’un développeur impliqué, prêt à s’investir dans une dynamique
                            d’équipe et à relever des défis techniques, je serais ravi d’échanger avec vous.
                        </p>
                        <div :class="[animationCode ? 'animation-code' : null, 'code-block', 'code-block-contact']">
                            <pre><code><span class="const">const </span><span class="variable">contact </span><span class="ponctuation">= </span><span class="bracket">{</span>
<span class="property">Email: </span><span class="string"><a href="mailto:lucas.detling@gmail.com">'lucas.detling@gmail.com'</a></span><span class="ponctuation">,</span>
<span class="property">Téléphone: </span><span class="string"><a href="tel:+33668372876">'+33 6 68 37 28 76'</a></span><span class="ponctuation">,</span>
<span class="bracket">}</span></code></pre>
                        </div>
                    </div>
                    <div role="alert" class="alert alert-error w-fit mx-auto" v-if="error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ error }}</span>
                    </div>
                    <div role="alert" class="alert alert-success w-fit mx-auto" v-if="success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ success }}</span>
                    </div>
                    <div class="right-contact w-full lg:w-1/3">
                        <Form @submit="submitForm($event)" :validation-schema="schema" class="mx-auto">
                            <div class="sm:flex gap-4">
                                <div class="name">
                                    <label for="firstname" class="block mt-4 mb-2">Prénom :</label>
                                    <Field type="text" name="firstname" v-model="firstname" required class="input" />
                                    <ErrorMessage name="firstname" />
                                </div>
                                <div class="name">
                                    <label for="lastname" class="block mt-4 mb-2">Nom :</label>
                                    <Field type="text" name="lastname" v-model="lastname" required class="input" />
                                    <ErrorMessage name="lastname" />
                                </div>
                            </div>
                            <label for="email" class="block mt-4 mb-2">Email :</label>
                            <Field type="email" name="email" v-model="email" required class="input" />
                            <ErrorMessage name="email" />
                            <label for="phone" class="block mt-4 mb-2">Téléphone :</label>
                            <Field type="phone" name="phone" v-model="phone" required class="input" />
                            <ErrorMessage name="phone" />
                            <label for="message" class="block mt-4 mb-2">Message :</label>
                            <Field as="textarea" name="message" v-model="message" required class="textarea" />
                            <ErrorMessage name="message" />
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                            <!-- <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                            </fieldset> -->
                        </Form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useFormuleStore } from '@/stores/formule';
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import { ref, onMounted, onUnmounted } from "vue";
import { VITE_API_URL } from '@/config';
const email = ref("");
const message = ref("");
const firstname = ref("");
const lastname = ref("");
const phone = ref("");
const formuleSelected = ref()
const error = ref(null);
const success = ref(null);
const formule = useFormuleStore()
const required = "Ce champ est requis";


const schema = yup.object({
    email: yup.string().required(required).email("Ceci n'est pas une adresse email"),
    phone: yup.string().matches(/^\+?[0-9\s]+$/, "Le numéro de téléphone doit contenir uniquement des chiffres et des espaces").min(10, "Le numéro de téléphone doit faire au moins 10 caractères"),
    firstname: yup.string().required(required),
    lastname: yup.string().required(required),
    message: yup.string().required(required).min(5, "Votre message dois faire minimum 5 caractères"),
    // formule: yup.string().required(required)
})

const submitForm = async (el) => {
    // const formules = document.querySelectorAll('select option')
    // if (parseInt(el.formule)) {
    //     formuleSelected.value = formules[el.formule].textContent;
    // }

    try {
        const response = await fetch(VITE_API_URL + '/contact', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify(el)
        })

        const result = await response.json();
        console.log(response)
        console.log(result)
        if (response.ok) {
            email.value = "";
            error.value = null
            success.value = "Votre message a été envoyé avec succès !";
        } else {
            email.value = "";
            error.value = "Une erreur est survenue lors de l'envoi du message.";
            success.value = nll;
        }

    } catch (error) {
        console.log(error)
    }

}

const animationCode = ref(false);
const handleScroll = () => {
    const codeBlock = document.querySelector('.code-block-contact');
    if (codeBlock) {
        const rect = codeBlock.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            animationCode.value = true;
        }
    }
};
window.addEventListener('scroll', handleScroll);
onMounted(() => {
    handleScroll(); // Vérifie la position initiale lors du chargement
});
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>

<style lang="scss" scoped>
.code-block {

    span {
        display: inline-block;
        opacity: 0;
        transform: translateY(5px);
    }

    &.animation-code {
        span {
            animation: appear 0.3s ease-out forwards;
        }

        // Génère un délai croissant pour chaque span
    }

    @for $i from 1 through 50 {
        span:nth-child(#{$i}) {
            animation-delay: #{.2 * $i}s;
        }
    }

    @keyframes appear {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
}

.terminal-header-contact {
    background: #91c4f2;
}

.content-contact {
    .right-contact {
        iframe {
            height: 100%;
            width: 100%;
            border-radius: 5px;
        }
    }

    .left-contact {
        // max-width: 600px;
    }
}

form {
    // margin-left: auto;
    max-width: 350px;

    span {
        display: block;
        margin-top: .3rem;
        color: #568ca1;
        font-size: 12px;
    }

    input {
        color: #91C4F2;
    }
}

input,
select,
textarea {
    // width: 350px;
    width: 100%;
    border-radius: 5px;
    padding: .5rem;
    box-sizing: border-box;
    font-size: 1rem;
}

textarea {
    box-sizing: border-box;
    padding: .5rem;
    // min-width: 350px;
    // max-width: 350px;
    height: 100px;
    border-radius: 5px;
    font-size: 1rem;
}
</style>