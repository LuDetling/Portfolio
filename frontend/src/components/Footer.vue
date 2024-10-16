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
            © Lucas-Detling.com. All rights reserved
        </p>
    </footer>
</template>

<style lang="scss">
.darkmode {
    footer {
        .rs {
            a {
                color: white;
                border-color: white;
            }
        }
    }
}
footer {
    margin-top: auto;
    text-align: center;
    padding: 1rem;
    .rs {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-bottom: 1rem;
        a {
            color: #1f1f1f;
            font-size: 1.2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #1f1f1f;
            transition: .3s;
            width: 40px;
            height: 40px;
            &:hover {
                background-color: rgba(51, 93, 74, 0.8);
            }
        }
    }
}
</style>