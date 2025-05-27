import { createRouter, createWebHistory } from 'vue-router'
import { useCookies } from 'vue3-cookies'
const { cookies } = useCookies()
import { jwtDecode } from "jwt-decode";


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
      component: () => import('../views/admin/AdminView.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/admin/tags/create',
      name: 'adminTagsCreate',
      component: () => import('../views/admin/tags/AdminTagsCreateView.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/admin/tags/:tagId',
      name: 'adminTagsUpdate',
      component: () => import('../views/admin/tags/AdminTagsUpdateView.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/admin/projets/:projetId',
      name: 'adminProjetsUpdate',
      component: () => import('../views/admin/projets/AdminProjetsUpdateView.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/admin/projets/create',
      name: 'adminProjetsCreate',
      component: () => import('../views/admin/projets/AdminProjetsCreateView.vue'),
      meta: {
        requiresAuth: true
      }
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

router.beforeEach((to, from) => {
  // instead of having to check every route record with
  // to.matched.some(record => record.meta.requiresAuth)
  if (to.meta.requiresAuth) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (!cookies.get('token')) {
      return {
        path: '/',
        // save the location we were at to come back later
        query: { redirect: to.fullPath },
      }
    } else {
      const decoded = jwtDecode(cookies.get('token'));
      // Check if the user has the right role for admin routes
      if (decoded.roles.find(role => role === 'ROLE_ADMIN')) {
        return true; // Allow access to admin routes
      } else {
        return {
          path: '/',
          // save the location we were at to come back later
          query: { redirect: to.fullPath },
        }
      }
    }
  }
})

export default router
