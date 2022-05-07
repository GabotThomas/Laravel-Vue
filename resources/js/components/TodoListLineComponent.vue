

<script setup>
import { ref, watch, defineProps } from "@vue/runtime-core";
import { DELETE, POST } from "../methods.js";
import useFetch from "../useFetch.js";
import useState from "../useState.js";

const props = defineProps({
  todoList: Object,
  index: Number,
  handleDeleteCallBack: Function,
});

const [todoList, setTodoList] = useState(props.todoList);
const [index] = useState(props.index);

const [resultDelete, loadDelete, loadingDelete] = useFetch();

const handleLoad = () => {
  load({
    url: "todolist",
  });
};

const handleDelete = (index) => {
  loadDelete({
    url: "todolist",
    method: DELETE,
    body: {
      id: todoList().id,
    },
  });
};

watch(resultDelete, (currentValue, oldValue) => {
  if (currentValue && currentValue.success) {
    props.handleDeleteCallBack(index);
  }
});
</script>


<template>
  <li>
    {{ todoList().value }}
    <span v-on:click="() => handleDelete(index)">Delete</span>
  </li>
</template>

