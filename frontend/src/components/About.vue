<script setup>
const developer = {
    name: 'Lucas Detling',
    role: 'Développeur web fullstack',
    skills: ['Symfony', 'Vue.js', 'PHP', 'JavaScript'],
    education: 'Master 1 Développeur d\'application PHP/Symfony',
    experience: 'Création d\'applications web de la conception à la mise en production'
}

</script>

<template>
    <section id="about">
        <div class="terminal-header">
            <h2>
                ~/About.vue
            </h2>
        </div>
        <div class="terminal-window">
            <div class="terminal-body">
                <div class="code-picture">
                    <div class="code-block">
                        <pre><code><span class="const">const </span><span class="variable">developer </span><span class="ponctuation">= </span><span class="bracket">{</span>
    <span class="property">name: </span><span class="string">'Lucas Detling'</span><span class="ponctuation">,</span>
    <span class="property">role: </span><span class="string">'Développeur web fullstack'</span><span class="ponctuation">,</span>
    <span class="property">skills: </span><span class="string"><span class="array">[</span>'Symfony', 'Vue.js', 'PHP', 'JavaScript'<span class="array">]</span><span class="ponctuation">,</span></span>
    <span class="property">education: </span><span class="string">'Master 1 Développeur d'application PHP/Symfony'<span class="ponctuation">,</span></span>
    <span class="property">experience: </span><span class="string">'Création d'applications web de la conception à la mise en production'</span>
<span class="bracket">}</span></code></pre>
                    </div>
                    <div class="over-img">
                        <img :src="'/src/assets/images/greengoodies.webp'" alt="Photo de moi, Lucas Detling">
                    </div>
                </div>
                <div>
                    <p>Je suis développeur web fullstack, les technologies que j'utilise principalement sont Symfony et
                        Vue.js.
                    </p>
                    <p>
                        Je suis diplômé d'un Master 1 de la formation Openclassrooms "Développeur d'application
                        PHP/Symfony".
                    </p>
                    <p>
                        J'aime créer des applications qui répondent aux besoins des utilisateurs. J'ai une solide
                        expérience
                        dans
                        la création d'applications web, de la conceptionà la
                        mise en production.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;

    img {
        width: 300px;
        height: 300px;
        border-radius: 5px;
        /* border-top-left-radius: 50%;
        border-top-right-radius: 50%; */
        object-fit: cover;
        border: 2px solid #fbfbfb;
    }

    div {
        p {
            line-height: 1.5;
            margin-bottom: .5rem;
        }
    }

    .code-picture {
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 36px;
    }
}
</style>