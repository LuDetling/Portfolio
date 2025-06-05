<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const cv = ref([
    {
        title: 'Développeur applications PHP / Symfony',
        date: '2025-2023',
        enterprise: 'Serval Agency',
        description: 'Création et maintenance de sites web avec le CMS drupal, développement de modules personnalisés et création de patchs',
        skills: ['Symfony', 'Drupal', 'Jquery', 'Twig', 'Bootstrap'],
    },
    {
        title: 'Diplôme développeur applications PHP / Symfony',
        date: '2025-2023',
        enterprise: 'Openclassrooms',
        description: 'Des projets pratiques, apprentissage des bonnes pratiques de développement, tests unitaires et intégration continue',
        skills: ['Symfony', 'PHP', 'MySQL', 'PostgreSQL', 'API REST', 'PHPUnit', 'PHPStan'],
        certification: 'Diplôme de niveau 6 (bac +3/4)',
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
        date: '2022-2021',
        enterprise: 'Serval Agency',
        description: 'Intégration et maintenance de sites web avec le CMS drupal',
        skills: ['Drupal', 'Twig', 'Sass', 'Bootstrap', 'Jquery'],
    },
    {
        title: 'Développeur web',
        date: '2022-2021',
        enterprise: 'Openclassrooms',
        description: 'Intégration et maintenance de sites web avec le CMS drupal',
        skills: ['HTML', 'CSS', 'JavaScript', 'Vue.js', 'Node.js', 'Git', 'MySQL', 'Prisma.io'],
        certification: 'Diplôme de niveau 5 (bac +2)',
    },
])

const animationCv = ref(false);
const handleScroll = () => {
    const cvSection = document.querySelector('#cv');
    if (cvSection) {
        const rect = cvSection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            animationCv.value = true;
        }
    }
};

onMounted(() => {
    handleScroll(); // Vérifie la position initiale lors du chargement
    window.addEventListener('scroll', handleScroll);
});
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

</script>
<template>
    <section id="cv" :class="[animationCv ? 'animation-cv' : null]">
        <div class="terminal-header terminal-header-cv">
            <h2>
                ~/CV.vue
            </h2>
        </div>
        <div class="terminal-window terminal-window-cv">
            <div class="terminal-body-cv terminal-body">
                <ul class="timeline timeline-vertical gap-8 md:gap-0">
                    <li v-for="(item, index) in cv" :key="index" class="timeline-item">
                        <hr v-if="cv[index - 1]" :class="['mx-8', index === 0 ? 'active' : null]" />
                        <div :class="[index % 2 ? 'timeline-end' : 'timeline-start', 'timeline-box']">
                            <p class="date">{{ item.date }}</p>
                            <h3 :class="['title', item.certification ? 'school' : null]">{{ item.title }}</h3>
                            <p class="enterprise">{{ item.enterprise }}</p>
                            <p class="certification">{{ item.certification }}</p>
                            <p class="description">{{ item.description }}</p>
                            <ul class="flex flex-wrap gap-2">
                                <li v-for="skill in item.skills" :key="skill" class="badge badge-soft badge-primary">{{
                                    skill }}</li>
                            </ul>
                        </div>
                        <div class="timeline-middle"></div>
                        <hr v-if="cv[index + 1]" :class="['mx-8', index === 0 ? 'active' : null]" />
                        <!-- faire une animation  -->
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
.terminal-header-cv {
    background: #ce9178;
    color: black;
    padding: 10px;
}

.terminal-window-cv {
    // box-shadow: 0 15px 35px rgba(156, 220, 254, .1);
    border-color: #ce9178;
}

.animation-cv {
    .timeline-item {
        animation: appear 1s ease-out forwards;
    }

    @for $i from 1 through 50 {
        .timeline-item:nth-child(#{$i}) {
            animation-delay: #{.5 * $i}s;
        }
    }

}

@keyframes appear {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.timeline-item {
    // width: 80%;
    margin: auto;
    opacity: 0;

    @media screen and (max-width: 768px) {
        display: block;

    }

    hr.active {
        background-color: #142238;
    }

    .timeline-box {
        font-size: 1rem;
        border-color: #142238;

        .date {
            font-size: 14px;
            color: #ce70b3;
        }

        .title {
            color: #ce9178;
            font-weight: bold;

            &.school {
                color: #71f79f;
            }
        }

        .enterprise {
            color: #91c4f2;
        }

        .certification {
            font-size: 14px;
            margin-top: .5rem;

            &::before {
                content: '';
                margin-block: .5rem;
                display: block;
                width: 100%;
                height: 1px;
                background-color: #142238;
            }
        }

        .description {
            font-size: 14px;
            margin-bottom: .5rem;
        }
    }
}
</style>