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

        // trouve la position de la div center-active
        const centerActive = document.querySelector('.center-active');
        const center = document.querySelector('.center');

        // Hauteur de la div contenant la timeline
        const centerHeight = center.offsetHeight;

        // Position du haut de la div center par rapport au viewport
        const centerRect = center.getBoundingClientRect();
        const scrollTop = window.scrollY || window.pageYOffset;
        const topOffset = centerRect.top + scrollTop;

        // Position actuelle du "curseur" à placer
        const newPosition = window.scrollY + window.innerHeight / 2 - topOffset;

        const maxPosition = centerHeight - centerActive.offsetHeight;

        if (newPosition < 0) {
            centerActive.style.transform = 'translateY(0)';
        } else if (newPosition > maxPosition) {
            centerActive.style.transform = `translateY(${maxPosition}px)`;
        } else {
            centerActive.style.transform = `translateY(${newPosition}px)`;
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
                    <div class="center">
                        <div class="center-active"></div>
                    </div>
                    <li v-for="(item, index) in cv" :key="index" class="timeline-item">
                        <hr v-if="cv[index - 1]" :class="['mx-8']" />
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
                        <hr v-if="cv[index + 1]" :class="['mx-8']" />
                        <!-- faire une animation  -->
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
@media screen and (min-width: 769px) {


    .center {
        width: 3px;
        height: 80%;
        position: absolute;
        background: var(--color-base-300);
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-radius: 1rem;
    }

    .center-active {
        width: 100%;
        height: 10%;
        position: absolute;
        background: #91c4f2;
        top: 0;
        border-radius: 1rem;
    }
}

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

    // hr.active {
    //     background-color: #142238;
    // }

    hr {
        background-color: transparent;
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