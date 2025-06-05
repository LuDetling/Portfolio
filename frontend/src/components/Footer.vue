<template>
    <footer>
        <div class="rs">
            <a href="https://github.com/LuDetling" target="_blank">
                <font-awesome-icon :icon="['fab', 'github']" />
            </a>
            <a href="https://www.linkedin.com/in/lucas-detling/" target="_blank">
                <font-awesome-icon :icon="['fab', 'linkedin']" />
            </a>
        </div>
        <p>
            © lucas-detling.com. All rights reserved.
        </p>
    </footer>
</template>

<style lang="scss">

footer {
    margin-top: auto;
    text-align: center;
    padding: 1rem;
    z-index: 1;

    .rs {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 1rem;

        a {
            color: white;
            border: 1px solid white;
            font-size: 1.2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s;
            width: 40px;
            height: 40px;
        }
    }
}
</style>