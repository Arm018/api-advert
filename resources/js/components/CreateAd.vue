<template>
    <div class="create-ad">
        <h1>Create Advertisement</h1>
        <form @submit.prevent="createAd">
            <div class="form-group">
                <label for="title">Title:</label>
                <input v-model="ad.title" id="title" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea v-model="ad.description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input v-model="ad.price" id="price" type="number" class="form-control" />
            </div>
            <div class="form-group">
                <label for="images">Image URLs:</label>
                <input v-model="ad.images" id="images" type="text" class="form-control" />
            </div>
            <button type="submit" class="submit-button">Create Ad</button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ad: {
                title: '',
                description: '',
                price: '',
                images: '',
            },
        };
    },
    methods: {
        async createAd() {
            await fetch('/api/ads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.ad),
            });

            // Optionally, you can reset the form or provide user feedback
        },
    },
};
</script>

<style scoped>
.create-ad {
    padding: 1rem;
    max-width: 600px;
    margin: auto;
}

.form-group {
    margin-bottom: 1rem;
}

.form-control {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 0.25rem;
}

.submit-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    border-radius: 0.25rem;
}

.submit-button:hover {
    background-color: #0056b3;
}
</style>
