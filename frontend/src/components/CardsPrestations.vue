<script setup>
const props = defineProps({
    prestation: Object
})
</script>
<template>
    <div class="cards-prestations">
        <h3>{{ prestation.title }}</h3>
        <div class="prices">
            <ul>
                <li v-for="(price, index) in prestation.prices" :key="index">{{ price }}</li>
            </ul>
        </div>
        <p>{{ prestation.description }}</p>
        <h4>Inclus</h4>
        <ul class="list">
            <li v-for="(include, index) in prestation.includes" :key="index">
                {{ include }}
            </li>
        </ul>
    </div>
</template>

<style lang="scss" scoped>
.cards-prestations {
    border: 2px solid #557761;
    padding: 1rem;
    border-radius: 10px;
    background-color: #2f5041;
    color: white;

    h3 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    h4 {
        font-size: 1.1rem;
        display: inline-block;
        border-bottom: 1px solid white;
        margin-bottom: .5rem;
    }

    p {
        margin: 1rem 0;
        line-height: 1.5;
    }

    li {
        line-height: 1.5;
    }
    
    .list {
        list-style: inherit;
        margin-left: 1rem;

    }

    .prices {
        margin: 1rem 0;
        ul {
            display: inline-block;

            li {
                display: inline-block;

                &:not(:last-child) {
                    &::after {
                        content: '-';
                        margin: 0 .3rem;
                    }
                }
                &:last-child::after {
                    content: '€'
                }
            }
        }
    }
}
</style>