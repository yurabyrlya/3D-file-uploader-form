
<template>
    <model-stl></model-stl>
</template>

<script>

import { ModelStl } from 'vue-3d-model'
export default {
    data() {
        return {
            enableRotate: false,
        }
    },
    components: {
        ModelStl
    }
}
</script>
