import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'products.index',
        component: () => import('./routes/Products/Index.vue')
    },
    {
        path: '/product/:slug',
        name: 'products.show',
        component: () => import('./routes/Products/Show.vue')
    },
    {
        path: '/checkout',
        name: 'order.checkout',
        component: () => import('./routes/Order/Checkout.vue')
    },
    {
        path: '/summary',
        name: 'order.summary',
        component: () => import('./routes/Order/Summary.vue')
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;