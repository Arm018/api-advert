<template>
    <div class="ads-list">
        <h1>Advertisements</h1>
        <div v-for="ad in ads" :key="ad.id" class="ad-item">
            <h2>{{ ad.title }}</h2>
            <img :src="ad.main_image" alt="ad image" class="ad-image" />
            <p class="ad-price">{{ ad.price }}</p>
        </div>
        <button @click="loadMore" class="load-more-button">Load More</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ads: [],
            page: 1,
            sort: 'asc',
        };
    },
    methods: {
        async fetchAds() {
            const response = await fetch(`/api/ads?page=${this.page}&sort=${this.sort}`);
            const data = await response.json();
            this.ads = data.ads;
        },
        loadMore() {
            this.page += 1;
            this.fetchAds();
        },
    },
    mounted() {
        this.fetchAds();
    },
};
</script>

<style scoped>
.ads-list {
    padding: 1rem;
    max-width: 800px;
    margin: auto;
}

.ad-item {
    border: 1px solid #ddd;
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 0.25rem;
}

.ad-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 0.5rem;
}

.ad-price {
    font-size: 1rem;
    color: #333;
}

.load-more-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    border-radius: 0.25rem;
}

.load-more-button:hover {
    background-color: #0056b3;
}
</style>
