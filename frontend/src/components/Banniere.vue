<template>
    <section id="banniere">
        <h1>Lucas Detling</h1>
        <p>
            Développeur d'applications PHP/Symfony
        </p>
        <a href="#contact" class="btn btn-secondary">Me contacter</a>
        <a href="#apropos" class="icone">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
            </svg>
        </a>
    </section>
</template>

<style lang="scss">
.darkmode .icone {
    color: white;
}

.icone {
    color: #fbfbfb;

    svg {
        width: 40px;
    }
}

#banniere {
    text-align: center;

    h1 {
        margin-bottom: 1rem;
    }

    p {
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .icone {
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
    0% {
        transform: translateY(0)
    }

    50% {
        transform: translateY(20px)
    }

    100% {
        transform: translateY(0)
    }
}

.icone {
    animation: bounce 3s infinite ease-in-out;
}
</style>