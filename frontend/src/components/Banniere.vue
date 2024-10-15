<template>
    <section id="banniere">
        <h1>Lucas Detling</h1>
        <p>
            Développeur fullstack Symfony - Vue.js
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

    .icone {
        color: white;
        display: block;
        width: fit-content;
        padding: 2rem;
        margin: 5rem auto 0;

        &:hover {
            animation: none;
            svg {
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

@keyframes bounce {
    0% { transform: translateY(0)  }
    50% {transform: translateY(20px) }
    100% { transform: translateY(0) }
}

.icone {    
    animation: bounce 3s infinite ease-in-out;
}

</style>