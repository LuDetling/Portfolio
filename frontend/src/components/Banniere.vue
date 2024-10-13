<template>
    <section id="banniere">
        <h1>Lucas Detling</h1>
        <p>
            Développeur fullstack Symfony - Vuejs
        </p>
        <a href="#contact" class="btn">Me contacter</a>
        <a href="#apropos" class="icone">
            <font-awesome-icon :icon="['fas', 'arrow-down-long']" />
        </a>
    </section>
</template>

<style scoped lang="scss">
section {
    text-align: center;

    h1 {
        margin-bottom: 1rem;
    }

    p {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .btn {
        padding: 1rem 1.5rem;
        background-color: rgba(51, 93, 74, 0.8);
        display: inline-block;
        border-radius: 30px;
        color: white;
        text-decoration: none;
        transition: .3s;

        &:hover {
            background-color: #59786a;
        }
    }

    .icone {
        color: white;
        display: block;
        width: fit-content;
        padding: 2rem;
        margin: 5rem auto 0;
        &:hover {
            svg{
                transform: translateY(20px);
            }
        }
        svg {
            transition: .3s;
            font-size: 2rem;
            display: block;
        }
    }
}
</style>