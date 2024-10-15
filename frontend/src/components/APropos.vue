<template>
    <section id="apropos">
        <img :src="'/src/assets/images/greengoodies.webp'" alt="Photo de moi, Lucas Detling">
        <div>
            <h2>A propos</h2>
            <p>Je suis développeur web fullstack, les technologies que j'utilise principalement pour coder un site sont
                Symfony et Vue.js.
            </p>
            <p>
                Je suis en alternance pour préparer un Master 1 chez OpenClassrooms dans l'entreprise Serval Agency.
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
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        object-fit: cover;
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