<template>
  <Nav />
  <div class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Post</h2>

      <form @submit.prevent="submit">
        <div class="mb-4">
          <label class="block text-gray-700 font-medium">Title</label>
          <input v-model="form.title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-medium">Content</label>
          <textarea v-model="form.description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div class="mt-6 flex justify-between">
          <a href="/posts" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">Cancel</a>
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">Update</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { useForm } from "@inertiajs/vue3";
import Nav from "@/Shared/Nav.vue";

export default {
  components: { Nav },
  props: {
    post: Object,
  },
  setup(props) {
    const form = useForm({
      title: props.post.title,
      description: props.post.description,
    });

    const submit = () => {
      form.put(route("posts.update", props.post.id), {
        preserveScroll: true,
        onSuccess: () => console.log("Post updated successfully"),
        onError: (errors) => console.error("Validation Errors:", errors),
      });
    };

    return { form, submit };
  },
};
</script>
