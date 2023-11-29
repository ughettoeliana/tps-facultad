// Importamos el plugin de Vue.
import vue from '@vitejs/plugin-vue';


// Exportamos la configuración de Vite.
export default {
    // Agregamos el plugin de Vue.
    plugins: [vue()],
}

// export default {
//     plugins: [vue({
//       template: {
//         compilerOptions: {
//           // i am ignorning my custom '<container>' tag
//           isCustomElement: (tag) => ['li'].includes(tag)
//         }
//       }
//     })]
//   }