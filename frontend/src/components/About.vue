<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
const animationCode = ref(false);
const handleScroll = () => {
    const codeBlock = document.querySelector('.code-block');
    if (codeBlock) {
        const rect = codeBlock.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            animationCode.value = true;
        }
    }
};
onMounted(() => {
    handleScroll(); // Vérifie la position initiale lors du chargement
    window.addEventListener('scroll', handleScroll);
});
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
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
                    <div :class="[animationCode ? 'animation-code' : null, 'code-block']">
                        <pre><code id="typewriter"><span class="const">const </span><span class="variable">developer </span><span class="ponctuation">= </span><span class="bracket">{</span>
    <span class="property">name: </span><span class="string">'Lucas Detling'</span><span class="ponctuation">,</span>
    <span class="property">role: </span><span class="string">'Développeur web fullstack'</span><span class="ponctuation">,</span>
    <span class="property">skills: </span><span class="string"><span class="array">[</span>'Symfony', 'Vue.js', 'PHP', 'JavaScript', 'PostgreSQL'<span class="array">]</span><span class="ponctuation">,</span></span>
    <span class="property">education: </span><span class="string">'Master Développeur d'application PHP/Symfony'<span class="ponctuation">,</span></span>
    <span class="property">experience: </span><span class="string">'Création d'applications web de la conception à la mise en production'</span>
<span class="bracket">}</span></code></pre>
                    </div>
                    <div class="over-img mx-auto">
                        <img src="@/assets/images/moi-bleu.png" alt="Photo de moi, Lucas Detling">
                    </div>
                </div>
                <div class="description md:flex md:gap-8 justify-between">
                    <div class="left md:w-1/2">
                        <p>
                            Bonjour, moi c’est Lucas Detling, <strong>développeur web fullstack passionné</strong>,
                            spécialisé en
                            <strong>PHP/Symfony</strong> côté backend et <strong>Vue.js</strong> côté frontend.
                        </p>
                        <p>
                            Je conçois des applications web sur-mesure, robustes et performantes. Qu’il s’agisse d’un
                            outil métier complexe ou d’une interface intuitive, je
                            m’attache toujours à créer des solutions utiles, évolutives et bien construites.
                        </p>
                        <p>
                            <strong>Diplômé d'un Master "Développeur d’application PHP/Symfony"</strong> j’ai développé
                            une véritable
                            passion
                            pour la création d’applications web modernes,
                            performantes et centrées sur l’utilisateur.
                        </p>
                    </div>
                    <div class="right md:w-1/2">
                        <p>
                            Grâce à mes expériences en alternance, en freelance et à travers divers projets personnels,
                            j’ai
                            acquis une vision complète du cycle de développement, de l’architecture technique à la mise
                            en
                            production.
                        </p>
                        <p>
                            Curieux, rigoureux et toujours motivé à relever de nouveaux défis, je mets un point
                            d’honneur à
                            écrire un code propre, maintenable et bien documenté.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
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


section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;

    img {
        width: 250px;
        height: 250px;
        border-radius: 50%;
        object-fit: cover;
    }

    div {
        p {
            margin-bottom: 1rem;
        }
    }

    .code-picture {
        display: flex;
        align-items: self-start;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 36px;
    }

    .description {
        flex: 1;
    }
}
</style>