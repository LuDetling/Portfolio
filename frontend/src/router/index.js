import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/projet/:projetId',
      name: 'projet',
      component: () => import('../views/ProjectView.vue')
    },
    {
      path: '/projets',
      name: 'projets',
      component: () => import('../views/ProjectsView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../views/ContactView.vue')
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/admin/AdminView.vue')
    },
    {
      path: '/admin/tags',
      name: 'adminTags',
      component: () => import('../views/admin/tags/AdminTagsView.vue')
    },
    {
      path: '/admin/tags/create',
      name: 'adminTagsCreate',
      component: () => import('../views/admin/tags/AdminTagsCreateView.vue')
    },
    {
      path: '/admin/tags/:tagId',
      name: 'adminTagsEdit',
      component: () => import('../views/admin/tags/AdminTagsUpdateView.vue')
    },
    {
      path: '/admin/projets',
      name: 'adminProjets',
      component: () => import('../views/admin/AdminProjectsView.vue')
    }
  ],

  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return {
        el: to.hash,
        behavior: 'smooth'
      }
    }
  },
})

export default router
