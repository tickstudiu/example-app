<template>
  <div class="md:container md:mx-auto">
    {{message}}
    <form class="shadow sm:rounded-md sm:overflow-hidden" id="create-form">
      <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
        <label class="block">
          <span class="text-gray-700">Name</span>
          <input type="text" class="form-input mt-1 block w-full border" placeholder="Jane Doe" id="name">
          <span class="text-danger" id="name-error"></span>
        </label>

        <label class="block">
          <span class="text-gray-700">Email</span>
          <input type="email" class="form-input mt-1 block w-full border" placeholder="john@example.com" id="email">
          <span class="text-danger" id="email-error"></span>
        </label>

        <label class="block">
          <span class="text-gray-700">Mobile Number</span>
          <input type="number" class="form-input mt-1 block w-full border" placeholder="+668XXXXXX" id="mobile_number">
          <span class="text-danger" id="mobile-number-error"></span>
        </label>

        <label class="block">
          <span class="text-gray-700">Message</span>
          <textarea class="form-textarea mt-1 block w-full border" rows="3" placeholder="Enter some long form content." id="message"></textarea>
          <span class="text-danger" id="message-error"></span>
        </label>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Send</button>
      </div>
    </form>
  </div>
</template>
<script>
const default_layout = "default";

export default {
  computed: {},
  data() {
      return {
          message:'create page'
      }
  }
};
</script>