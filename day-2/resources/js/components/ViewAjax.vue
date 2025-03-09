<template>
<div >
    <button @click="fetchPost" class="bg-blue-500 text-white px-4 py-2 rounded">
        View Post
    </button>
    <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-xl font-bold mb-2">{{ post.title }}</h2>
                <p class="text-gray-700 mb-2">{{ post.description }}</p>
                <p class="text-gray-600"><strong>By:</strong> {{ post.user?.name }} ({{ post.user?.email }})</p>
                <button @click="showModal = false" class="bg-red-500 text-white px-4 py-2 mt-4 rounded">
                    Close
                </button>
            </div>
        </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    props:{
        id:Number,
    },
    data(){
        return{
            showModal: false,
            post: {},
        }
    },
    methods:{
        fetchPost(){
            axios.get(`/posts/${this.id}/json`)
            .then(response=>{
                this.post = response.data;
                this.showModal = true;
            })
            .catch(error => console.error(error));
        }
    }
}
</script>

<style>

</style>