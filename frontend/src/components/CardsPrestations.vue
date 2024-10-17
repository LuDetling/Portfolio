<script setup>
import { useFormuleStore } from '@/stores/formule';
const formule = useFormuleStore()

const props = defineProps({
    prestation: Object
})

const changeFormule = (index) => {
    formule.formule = index;    
}
</script>
<template>
    <div class="cards-prestations">
        <h3>{{ prestation.title }}</h3>
        <div class="price">A partir de <span>/ {{ prestation.price }}€</span></div>
        <p>{{ prestation.description }}</p>
        <h4>Inclus</h4>
        <ul class="list">
            <li v-for="(include, index) in prestation.includes" :key="index">
                {{ include }}
            </li>
        </ul>
        <a href="#contact" @click="changeFormule(prestation.index)" class="btn">Choisir cette formule</a>
    </div>
</template>

<style lang="scss" scoped>
.cards-prestations {
    border: 2px solid #557761;
    padding: 1rem;
    border-radius: 10px;
    background-color: #2f5041;
    color: white;
    display: flex;
    flex-direction: column;
    gap: 1rem;

    h3 {
        font-size: 1.2rem;
    }

    h4 {
        font-size: 1.1rem;
        display: inline-block;
        border-bottom: 1px solid white;
        width: fit-content;
    }

    p {
        line-height: 1.5;
        font-size: 14px;
    }

    ul {
        margin-bottom: 2rem;
        li {
            line-height: 1.5;
        }
    }

    .btn {
        margin: 0 auto;
        margin-top: auto;
        display: block;
        width: fit-content;
    }

    .list {
        /* list-style: inherit; */

        li {
            display: flex;
            margin-bottom: .5rem;
            font-size: 14px;

            &::before {
                content: "✓";
                margin-right: .3rem;
            }
        }
    }

    .price {
        margin: 1rem 0;

        span {
            font-size: 1.5rem;
        }
    }
}
</style>