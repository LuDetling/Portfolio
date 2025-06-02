<template>
    <section id="banniere">
        <h1 class="glitch">Lucas Detling</h1>
        <p class="subtitle">
            Développeur Web Full-Stack
        </p>
        <!-- <a href="#contact" class="btn btn-secondary">Me contacter</a> -->
        <a href="#about" class="icone">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
            </svg>
        </a>
    </section>
</template>

<style lang="scss">
.icone {
    // color: #00ff41;
    color: #d4d4d4;

    svg {
        width: 40px;
    }
}

#banniere {
    text-align: center;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
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

.glitch {
    font-size: 4rem;
    font-weight: bold;
    text-transform: uppercase;
    position: relative;
    color: #d4d4d4;
    // color: #00ff41;
    letter-spacing: 5px;
    animation: glitch 2s infinite;
}

@keyframes glitch {

    0%,
    100% {
        transform: translate(0);
    }

    20% {
        transform: translate(-2px, 2px);
    }

    40% {
        transform: translate(-2px, -2px);
    }

    60% {
        transform: translate(2px, 2px);
    }

    80% {
        transform: translate(2px, -2px);
    }
}

.subtitle {
    font-size: 1.5rem;
    margin-top: 20px;
    opacity: 0.8;
    animation: typewriter 11s steps(110) 1s forwards;
    overflow: hidden;
    white-space: nowrap;
    border-right: 2px solid #d4d4d4;
    // border-right: 2px solid #00ff41;
    width: 0;
    max-width: fit-content;
    padding-inline: 1rem;
}

@keyframes typewriter {
    to {
        width: 100%;
    }
}
</style>