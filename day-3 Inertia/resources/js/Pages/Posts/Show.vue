<template>
  <Nav />
  <div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Post Details</h2>

      <div class="border border-gray-300 rounded-lg p-6 mb-4">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Post Info</h3>
        <p class="text-gray-700"><strong>Title :-</strong> {{ post.title }}</p>
        <p class="text-gray-700"><strong>Description :-</strong> {{ post.description }}</p>
      </div>

      <div class="border border-gray-300 rounded-lg p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Post Creator Info</h3>
        <p class="text-gray-700"><strong>Name :-</strong> {{ post.user?.name || "Unknown" }}</p>
        <p class="text-gray-700"><strong>Email :-</strong> {{ post.user?.email || "Unknown" }}</p>
        <p class="text-gray-700">
          <strong>Created At :-</strong> {{ formatDate(post.user?.created_at) }}
        </p>
      </div>

      <div class="mt-6 flex justify-between">
        <a href="/posts" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">Back to Posts</a>
        <div class="flex space-x-2">
          <button @click="editPost(post.id)" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded transition">Edit</button>
          <button @click="deletePost(post.id)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">Delete</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { router } from "@inertiajs/vue3";
import Nav from "@/Shared/Nav.vue";

export default {
  components: { Nav },
  props: {
    post: Object,
  },
  methods: {
    formatDate(date) {
      return date ? new Date(date).toLocaleDateString("en-US", { month: "long", day: "numeric", year: "numeric" }) : "Unknown";
    },
    editPost(id) {
      router.get(`/posts/${id}/edit`);
    },
    deletePost(id) {
      if (confirm("Are you sure you want to delete this post?")) {
        router.delete(`/posts/${id}`);
      }
    },
  },
};
</script>
