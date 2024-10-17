<script setup>
import CardsPrestations from './CardsPrestations.vue';
const prestation1 = {
    index: 1,
    title: "Développement Web Basique",
    price: 1000,
    description: "Création d'un site web vitrine ou d'une application simple avec une interface utilisateur intuitive.",
    includes: ["Conception et développement d'une interface utilisateur simple", "Intégration avec un backend léger pour les fonctionnalités basiques", "Design responsive pour tous les appareils ", "Livraison et mise en ligne"]
}
const prestation2 = {
    index: 2,
    title: "Application Web Avancée",
    price: 1500,
    description: "Développement d'une application web avec des fonctionnalités avancées telles qu'un tableau de bord, gestion d'utilisateurs, etc.",
    includes: ["Création d'une interface utilisateur dynamique avec gestion d'états complexes", "Développement de la partie backend avec gestion des données et sécurité", "Authentification et gestion des utilisateurs", "Tests et validation de l'application", "Déploiement et documentation technique"]
}
const prestation3 = {
    index: 3,
    title: "Développement Complet d'une Plateforme SaaS",
    price: 3000,
    description: "Création d'une plateforme SaaS complète avec gestion d'abonnements, paiement en ligne, et fonctionnalités sur mesure.",
    includes: ["Développement d'une interface utilisateur fluide et interactive", "Implémentation de fonctionnalités complexes comme la gestion d'abonnements et de paiements en ligne", "Sécurité renforcée et protection des données", "Optimisation des performances et tests rigoureux", "Maintenance initiale et support technique"]
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
#prestations {

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

}
</style>