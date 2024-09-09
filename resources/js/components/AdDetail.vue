<template>
    <div class="ad-detail">
        <h1>{{ ad.title }}</h1>
        <img :src="ad.main_image" alt="ad image" class="ad-image" />
        <p class="ad-price">{{ ad.price }}</p>
        <p v-if="showDescription" class="ad-description">{{ ad.description }}</p>
        <button @click="toggleDescription" class="toggle-description-button">
            {{ showDescription ? 'Hide Description' : 'Show Description' }}
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ad: {},
            showDescription: false,
        };
    },
    methods: {
        async fetchAd() {
            const response = await fetch(`/api/ads/${this.$route.params.id}`);
            const data = await response.json();
            this.ad = data;
        },
        toggleDescription() {
            this.showDescription = !this.showDescription;
        },
    },
    mounted() {
        this.fetchAd();
    },
};
</script>

<style scoped>
.ad-detail {
    padding: 1rem;
    max-width: 600px;
    margin: auto;
}

.ad-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 1rem;
}

.ad-price {
    font-size: 1.2rem;
    color: #333;
}

.ad-description {
    margin: 1rem 0;
}

.toggle-description-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    border-radius: 0.25rem;
}

.toggle-description-button:hover {
    background-color: #0056b3;
}
</style>
