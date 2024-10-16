<script setup>
import CardsPrestations from './CardsPrestations.vue';
const prestation1 = {
    title: "Basic Web Development",
    prices: ['300', '500'],
    description: "Développement d'un site web vitrine ou d'une application simple en Vue.js ou Symfony.",
    includes: ["Création d'une interface utilisateur simple (Vue.js)", "Intégration avec un backend léger (Symfony)", "Design basique et responsive", "Livraison sur serveur web"]
}
const prestation2 = {
    title: "Advanced Web Application",
    prices: ['800', '1500'],
    description: "Développement d'une application web avancée avec des fonctionnalités complexes (ex : dashboard, API REST, authentification).",
    includes: ["Frontend en Vue.js avec gestion de l'état (Vuex, Pinia)", "Backend complet avec gestion de base de données (Symfony)", "Authentification et gestion des utilisateurs", "Tests unitaires et fonctionnels", "Déploiement et documentation"]
}
const prestation3 = {
    title: "Basic Web Development",
    prices: ['2000', '4000'],
    description: "Développement d'une plateforme SaaS complète incluant front-end et back-end, gestion d'abonnements, paiement en ligne, et plus.",
    includes: ["Développement complet (frontend Vue.js + backend Symfony)", "Paiement en ligne avec intégration d'API (Stripe, PayPal, etc.)", "Sécurité renforcée (JWT, OAuth)", "Optimisation des performances et tests", "Maintenance et support initial"]
}
</script>
<template>
    <section id="prestations">
        <h2>Prestations</h2>
        <div class="content-prestations">
            <!-- <CardsPrestations title="Basic Web Development" price="300" price2="500" includes="" /> -->
            <CardsPrestations :prestation="prestation1" />
            <CardsPrestations :prestation="prestation2" />
            <CardsPrestations :prestation="prestation3" />
        </div>
    </section>
</template>

<style lang="scss">
.content-prestations {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;

    .cards-prestations {
        width: 300px;
        box-sizing: border-box;
    }
}
</style>