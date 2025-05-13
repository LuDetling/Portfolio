<template>
    <section id="apropos">
        <img :src="'/src/assets/images/greengoodies.webp'" alt="Photo de moi, Lucas Detling">
        <div>
            <h2>A propos</h2>
            <p>Je suis développeur web fullstack, les technologies que j'utilise principalement pour coder un site sont
                Symfony et Vue.js.
            </p>
            <p>
                Je suis diplômé d'un Master 1 de la formation Openclassrooms "Développeur d'application PHP/Symfony"
            </p>
            <p>
                Je suis passionné par le développement web et j'aime créer des applications qui répondent aux besoins
                des utilisateurs. J'ai une solide expérience dans la création d'applications web, de la conception à la
                mise en production.
            </p>
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
        border: 2px solid #557761;
    }

    h2 {
        font-size: 2rem;
        margin-bottom: 1.5rem;
    }

    div {
        width: 400px;

        p {
            line-height: 1.5;
        }
    }
}
</style>