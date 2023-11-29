<script>
import BaseButton from "../components/BaseButton.vue";
import BaseTextarea from "../components/BaseTextarea.vue";
import Loader from "../components/Loader.vue";
import { getUserProfileById } from "../services/user";
import {
  sendChatMessage,
  subscribeToChat,
} from "../services/chat";
import { subscribeToAuth } from "../services/auth";
import {} from "../services/chat";
import { dateToString } from "../helpers/date";

export default {
  name: "chat",
  components: { BaseTextarea, BaseButton, Loader },
  data() {
    return {
      userLoading: true,
      user: {
        id: null,
        email: null,
      },
      authUser: {
        id: null,
        email: null,
      },
      unsubscribeAuth: () => {},
      newMessage: {
        message: "",
      },
      messagesLoading: true,
      messages: [],
      unsubscribeMessages: () => {},
    };
  },
  methods: {
    handleSendMessage() {
      sendChatMessage({
        senderId: this.authUser.id,
        receiverId: this.user.id,
        message: this.newMessage.message,
      });
      this.newMessage.message = "";
    },
    formatDate(date) {
      return dateToString(date);
    },
  },
  async mounted() {
    this.userLoading = true;
    this.user = await getUserProfileById(this.$route.params.id);
    this.unsubscribeAuth = subscribeToAuth(
      (newUser) => (this.authUser = newUser)
    );
    this.userLoading = false;

    this.messagesLoading = true;
    this.unsubscribeMessages = await subscribeToChat(
      {
        senderId: this.authUser.id,
        receiverId: this.user.id,
      },
      (newMessages) => (this.messages = newMessages)
    );
    this.messagesLoading = false;
  },
  unmounted() {
    this.unsubscribeAuth();
    this.unsubscribeMessages();
  },
};
</script>

<template>
  <Loader v-if="userLoading" />
  <template v-else>
    <h1 class="h1">Chat con {{ user.email }}</h1>
    <div class="">
      <Loader v-if="messagesLoading" />
      <template v-else>
        <div
          class="chat-message-container"
        >
          <div
            v-for="message in messages"
            :key="message.id"
            class="chat-message"
            :class="{
              'bg-light-blue': message.senderId !== authUser.id,
              'bg-lighter-blue': message.senderId === authUser.id,
              'align-self-start': message.senderId !== authUser.id,
              'align-self-end': message.senderId === authUser.id,
            }"
          >
            <div class="">{{ message.message }}</div>
            <div class="time-message grey-text">
              {{ formatDate(message.created_at) || "Enviando..." }}
            </div>
          </div>
        </div>
      </template>
    </div>
    <form
      action="#"
      @submit.prevent="handleSendMessage"
    >
      <div class="send-message-form">
        <div class="form-group">
          <BaseTextarea
            id="message"
            v-model="newMessage.message"
          ></BaseTextarea>
        </div>
        <div class="">
          <BaseButton></BaseButton>
        </div>
      </div>
    </form>
  </template>
</template>
