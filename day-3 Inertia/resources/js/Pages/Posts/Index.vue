<template>
  <Nav />
  <div class="bg-gray-100 min-h-screen p-6">
    <div class="flex justify-between items-center my-6">
      <p class="text-gray-600 text-lg">Manage all your posts in one place.</p>
      <a href="/posts/create" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition">
        Create Post
      </a>
      <!-- <a href="/posts/archived" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
        View Archived Posts      </a> -->
      <!-- <Link :href="route('posts.archived')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
  View Archived Posts
</Link> -->
<button @click="goToArchivedPosts" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
  View Archived Posts
</button>

    </div>

    <div class="overflow-x-auto">
      <table class="w-full border-collapse bg-white text-sm shadow-md rounded-lg">
        <thead class="bg-gray-200 text-gray-700 text-left">
          <tr>
            <th class="px-6 py-3 font-semibold">#</th>
            <th class="px-6 py-3 font-semibold">Title</th>
            <th class="px-6 py-3 font-semibold">Posted By</th>
            <th class="px-6 py-3 font-semibold">Created At</th>
            <th class="px-6 py-3 font-semibold text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-300">
          <tr v-for="post in posts.data" :key="post.id" class="hover:bg-gray-50 transition">
            <td class="px-6 py-4 text-gray-900 font-semibold">{{ post.id }}</td>
            <td class="px-6 py-4 text-gray-700">{{ post.title }}</td>
            <td class="px-6 py-4 text-gray-700">{{ post.user?.name || 'Unknown' }}</td>
            <td class="px-6 py-4 text-gray-700">{{ post.formatted_created_at }}</td>
            <td class="px-6 py-4 flex justify-center space-x-2">
              <button @click="viewPost(post.id)" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">View</button>
              <button @click="editPost(post.id)" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded transition">Edit</button>
              <button @click="deletePost(post.id)" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition">
                Move to Archive
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-6 flex justify-center space-x-2">
      <button v-for="link in posts.links" :key="link.label"
        @click="fetchPage(link.url)"
        :disabled="!link.url"
        class="px-4 py-2 rounded"
        :class="{
          'bg-blue-500 text-white': link.active,
          'bg-gray-300 hover:bg-gray-400 transition': link.url && !link.active,
          'cursor-not-allowed opacity-50': !link.url
        }">
        <span v-html="link.label"></span>
      </button>
    </div>
  </div>
</template>

<script>
import { Link,router } from '@inertiajs/vue3';
import {route} from 'ziggy-js';
import Nav from '@/Shared/Nav.vue';
export default {
  components: { Nav },
  props: { posts: Object },
  methods: {
    viewPost(id) { router.get(`/posts/${id}`); },
    editPost(id) { router.get(`/posts/${id}/edit`); },
    goToArchivedPosts() {
  router.get('/posts/archived');
  },
    deletePost(id) {
  if (confirm('Are you sure you want to delete this post?')) {
    router.delete(route('posts.destroy', { post: id })
    , {
  preserveState: false,
  onSuccess: () => console.log('Post deleted successfully'),
  onError: (errors) => console.error('Delete failed', errors),
}
);

  }
}
,
    fetchPage(url) {
      if (url) { router.get(url); }
    },
  },
};
</script>