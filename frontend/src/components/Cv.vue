<script setup>
import { ref } from 'vue';

const cv = ref([
    {
        title: 'Développeur applications PHP / Symfony',
        date: '2023-2025',
        enterprise: 'Serval Agency',
        description: 'Création et maintenance de sites web avec le CMS drupal, développement de modules personnalisés et création de patchs',
        skills: ['Symfony', 'Drupal', 'Jquery', 'Twig', 'Bootstrap'],
        certifications: ['Diplôme de niveau 6 (bac +3/4)'],
    },
    {
        title: 'Freelance Développeur web Vue.js',
        date: '2022 (2 mois)',
        enterprise: 'midi agency',
        description: 'Création d\'un tableau de bord de streaming musical',
        skills: ['Vue.js', 'JavaScript', 'HTML', 'Sass', 'API'],
    },
    {
        title: 'Développeur web',
        date: '2021-2022',
        enterprise: 'Serval Agency',
        description: 'Intégration et maintenance de sites web avec le CMS drupal',
        skills: ['Drupal', 'Twig', 'Sass', 'Bootstrap', 'Jquery'],
        certifications: ['Diplôme de niveau 5 (bac +2)'],
    },
])
</script>
<template>
    <section id="cv">
        <div class="terminal-header terminal-header-cv">
            <h2>
                ~/CV.vue
            </h2>
        </div>
        <div class="terminal-window terminal-window-cv">
            <div class="terminal-body-cv">
                <ul class="timeline timeline-vertical my-8">
                    <li v-for="(item, index) in cv" :key="index" class="timeline-item">
                        <hr v-if="cv[index - 1]" class="mx-4" />
                        <div :class="[index % 2 ? 'timeline-end' : 'timeline-start', 'timeline-box']">
                            <p>{{ item.date }}</p>
                            <h3>{{ item.title }}</h3>
                            <p>{{ item.enterprise }}</p>
                            <p>{{ item.description }}</p>
                            <ul class="flex flex-wrap gap-2">
                                <li v-for="skill in item.skills" :key="skill" class="badge badge-soft badge-primary">{{
                                    skill }}</li>
                            </ul>
                            <ul>
                                <li v-for="certification in item.certifications" :key="certification">{{ certification
                                    }}
                                </li>
                            </ul>
                        </div>
                        <div class="timeline-middle"></div>
                        <hr v-if="cv[index + 1]" class="mx-4" />
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
.terminal-header-cv {
    background: #9CDCFE;
    color: black;
    padding: 10px;
}

.terminal-window-cv {
    box-shadow: 0 15px 35px rgba(156, 220, 254, .1);
    border-color: #9CDCFE;
}

.timeline-item {
    width: 80%;
    margin: auto;

    .timeline-box {
        font-size: 1rem;
    }
}
</style>